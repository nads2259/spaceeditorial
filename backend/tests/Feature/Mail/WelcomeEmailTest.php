<?php

namespace Tests\Feature\Mail;

use App\Mail\TemplateBroadcastMail;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Tests\TestCase;

class WelcomeEmailTest extends TestCase
{
    use RefreshDatabase;

    public function test_new_subscriber_receives_welcome_email_with_latest_articles(): void
    {
        Mail::fake();
        config(['app.site_url' => 'https://example.com']);

        $articles = $this->seedArticles();

        $response = $this->postJson(route('newsletter.subscribe'), [
            'email' => 'subscriber@example.com',
        ]);

        $response->assertCreated();

        Mail::assertSent(TemplateBroadcastMail::class, function (TemplateBroadcastMail $mail) use ($articles) {
            $titles = $articles->take(4)->pluck('title');
            $oldest = $articles->last()->title;

            return $mail->hasTo('subscriber@example.com')
                && $mail->subjectLine === 'Welcome to Space Editorial'
                && $titles->every(fn ($title) => str_contains($mail->htmlBody, $title))
                && ! str_contains($mail->htmlBody, $oldest)
                && str_contains($mail->htmlBody, 'https://example.com/blog/'.Str::slug($titles->first()));
        });
    }

    public function test_frontend_user_registration_sends_welcome_email(): void
    {
        Mail::fake();
        config(['app.site_url' => 'https://example.com']);

        $articles = $this->seedArticles();

        $response = $this->postJson('/api/frontend/register', [
            'name' => 'Nova Pilot',
            'email' => 'nova@example.com',
            'password' => 'secret123',
        ]);

        $response->assertCreated();

        Mail::assertSent(TemplateBroadcastMail::class, function (TemplateBroadcastMail $mail) use ($articles) {
            $titles = $articles->take(4)->pluck('title');

            return $mail->hasTo('nova@example.com')
                && $mail->subjectLine === 'Welcome aboard Space Editorial'
                && $titles->every(fn ($title) => str_contains($mail->htmlBody, $title))
                && str_contains($mail->htmlBody, '4 new stories waiting for you');
        });
    }

    protected function seedArticles(): \Illuminate\Support\Collection
    {
        $category = Category::query()->create([
            'name' => 'Orbital Updates',
            'slug' => 'orbital-updates',
            'description' => 'Latest mission intel',
            'is_active' => true,
        ]);

        return collect(range(1, 5))->map(function (int $index) use ($category) {
            $title = 'Article '.$index;

            return Post::query()->create([
                'category_id' => $category->id,
                'title' => $title,
                'slug' => Str::slug($title),
                'excerpt' => 'Snippet '.$index,
                'body' => '<p>Payload details '.$index.'</p>',
                'is_published' => true,
                'published_at' => now()->subHours($index),
                'content_hash' => hash('sha256', $title.microtime(true)),
                'meta' => ['has_full_content' => true],
            ]);
        })->sortByDesc('published_at')->values();
    }
}
