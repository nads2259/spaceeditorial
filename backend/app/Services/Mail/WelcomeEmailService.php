<?php

namespace App\Services\Mail;

use App\Mail\TemplateBroadcastMail;
use App\Models\EmailTemplate;
use App\Models\FrontendUser;
use App\Models\Post;
use App\Models\Subscriber;
use App\Support\TemplateRenderer;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class WelcomeEmailService
{
    public function sendSubscriberWelcome(Subscriber $subscriber): void
    {
        $this->sendTemplate(
            slug: 'welcome-subscriber',
            recipientEmail: $subscriber->email,
            context: [
                'name' => data_get($subscriber, 'name'),
            ]
        );
    }

    public function sendFrontendUserWelcome(FrontendUser $user): void
    {
        $this->sendTemplate(
            slug: 'welcome-frontend-user',
            recipientEmail: $user->email,
            context: [
                'name' => $user->name,
            ]
        );
    }

    protected function sendTemplate(string $slug, string $recipientEmail, array $context = []): void
    {
        if (blank($recipientEmail)) {
            return;
        }

        $template = EmailTemplate::query()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->first();

        if (! $template) {
            return;
        }

        $articlesContext = $this->latestArticlesContext();
        $context = array_merge($articlesContext, $context);

        if (! array_key_exists('activity_summary', $context) && isset($context['latest_articles_count'])) {
            $count = (int) $context['latest_articles_count'];
            $context['activity_summary'] = __(':count new stories waiting for you.', ['count' => $count]);
        }

        $context['onboarding_url'] = $context['onboarding_url'] ?? $this->siteUrl('/subscribe');
        $context['explore_url'] = $context['explore_url'] ?? $this->siteUrl('/');

        try {
            $html = TemplateRenderer::render($template->html_body, $context);
            $text = $template->text_body
                ? TemplateRenderer::render($template->text_body, $context)
                : strip_tags($html);

            Mail::to($recipientEmail)->send(new TemplateBroadcastMail(
                $template->subject,
                $html,
                $text
            ));
        } catch (Throwable $exception) {
            Log::warning('Failed to send welcome email.', [
                'slug' => $slug,
                'email' => $recipientEmail,
                'exception' => $exception->getMessage(),
            ]);
        }
    }

    protected function latestArticlesContext(): array
    {
        $articles = Post::query()
            ->published()
            ->orderByDesc('published_at')
            ->limit(4)
            ->get(['title', 'slug', 'published_at']);

        $baseUrl = $this->siteUrl();

        if ($articles->isEmpty()) {
            $fallback = __('Fresh stories launch soon—stay tuned!');

            return [
                'latest_articles_html' => '<p>'.$fallback.'</p>',
                'latest_articles_text' => $fallback,
            ];
        }

        $htmlItems = $articles->map(function (Post $post) use ($baseUrl) {
            $url = rtrim($baseUrl, '/').'/blog/'.ltrim($post->slug, '/');
            $title = e($post->title);
            $date = optional($post->published_at)->format('M j, Y');

            return <<<HTML
<li style="margin-bottom: 12px;">
    <a href="{$url}" style="color: #4338ca; font-weight: 600; text-decoration: none;">{$title}</a>
    <div style="font-size: 12px; color: #64748b; margin-top: 4px;">{$date}</div>
</li>
HTML;
        })->implode('');

        $htmlList = '<ul style="list-style:none;padding:0;margin:0;">'.$htmlItems.'</ul>';

        $textList = $articles
            ->map(function (Post $post) use ($baseUrl) {
                $url = rtrim($baseUrl, '/').'/blog/'.ltrim($post->slug, '/');

                return '- '.$post->title.' ('.$url.')';
            })
            ->implode(PHP_EOL);

        return [
            'latest_articles_html' => $htmlList,
            'latest_articles_text' => $textList,
            'latest_articles_count' => (string) $articles->count(),
        ];
    }

    protected function siteUrl(?string $path = null): string
    {
        $base = (string) config('app.site_url', config('app.url'));
        $base = rtrim($base, '/');

        if (! $path) {
            return $base;
        }

        return $base.'/'.ltrim($path, '/');
    }
}
