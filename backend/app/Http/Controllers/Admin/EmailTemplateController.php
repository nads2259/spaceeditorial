<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\TemplateBroadcastMail;
use App\Models\EmailBroadcast;
use App\Models\EmailBroadcastRecipient;
use App\Models\EmailTemplate;
use App\Models\FrontendUser;
use App\Models\Subscriber;
use App\Support\TemplateRenderer;
use DOMDocument;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Throwable;

class EmailTemplateController extends Controller
{
    protected array $audiences = [
        'subscribers',
        'frontend-users',
        'all',
    ];

    public function index(): View
    {
        $templates = EmailTemplate::query()
            ->orderBy('name')
            ->paginate(20);

        return view('admin.email-templates.index', [
            'templates' => $templates,
        ]);
    }

    public function create(): View
    {
        return view('admin.email-templates.create', [
            'template' => new EmailTemplate(),
            'audiences' => $this->audiences,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);

        EmailTemplate::query()->create($data);

        return redirect()
            ->route('admin.email-templates.index')
            ->with('status', __('Email template created.'));
    }

    public function edit(EmailTemplate $emailTemplate): View
    {
        $broadcasts = $emailTemplate
            ->broadcasts()
            ->latest()
            ->withCount('recipients')
            ->limit(10)
            ->get();

        return view('admin.email-templates.edit', [
            'template' => $emailTemplate,
            'audiences' => $this->audiences,
            'broadcasts' => $broadcasts,
        ]);
    }

    public function update(Request $request, EmailTemplate $emailTemplate): RedirectResponse
    {
        $data = $this->validatedData($request, $emailTemplate);

        $emailTemplate->update($data);

        return redirect()
            ->route('admin.email-templates.edit', $emailTemplate)
            ->with('status', __('Email template updated.'));
    }

    public function preview(EmailTemplate $emailTemplate): View
    {
        return view('admin.email-templates.preview', [
            'template' => $emailTemplate,
        ]);
    }

    public function send(Request $request, EmailTemplate $emailTemplate): RedirectResponse
    {
        $payload = $request->validate([
            'audience' => ['required', 'string', 'in:'.implode(',', $this->audiences)],
        ]);

        $recipients = $this->resolveRecipients($payload['audience']);

        if ($recipients->isEmpty()) {
            return redirect()
                ->route('admin.email-templates.edit', $emailTemplate)
                ->withErrors(['audience' => __('No recipients found for the selected audience.')]);
        }

        $broadcast = EmailBroadcast::query()->create([
            'email_template_id' => $emailTemplate->id,
            'audience' => $payload['audience'],
            'subject' => $emailTemplate->subject,
            'html_body' => $emailTemplate->html_body,
            'text_body' => $emailTemplate->text_body,
            'status' => 'queued',
            'total_recipients' => $recipients->count(),
        ]);

        $sentCount = 0;

        foreach ($recipients as $recipient) {
            $token = Str::random(40);

            $recipientRecord = EmailBroadcastRecipient::query()->create([
                'email_broadcast_id' => $broadcast->id,
                'recipient_type' => $recipient['type'],
                'recipient_id' => $recipient['id'],
                'email' => $recipient['email'],
                'token' => $token,
                'status' => 'pending',
            ]);

            try {
                $html = $this->personalizeHtml(
                    $emailTemplate->html_body,
                    $broadcast,
                    $recipientRecord,
                    $recipient
                );

                $textBody = $emailTemplate->text_body
                    ? $this->personalizeText($emailTemplate->text_body, $broadcast, $recipientRecord, $recipient)
                    : $this->personalizeText(strip_tags($emailTemplate->html_body), $broadcast, $recipientRecord, $recipient);

                Mail::to($recipient['email'])->send(new TemplateBroadcastMail(
                    $emailTemplate->subject,
                    $html,
                    $textBody
                ));

                $recipientRecord->forceFill([
                    'status' => 'sent',
                    'sent_at' => now(),
                ])->save();
                $sentCount++;
            } catch (Throwable $exception) {
                report($exception);

                $recipientRecord->forceFill([
                    'status' => 'failed',
                ])->save();
            }
        }

        $broadcast->forceFill([
            'status' => 'sent',
            'sent_count' => $sentCount,
            'sent_at' => now(),
        ])->save();

        return redirect()
            ->route('admin.email-templates.edit', $emailTemplate)
            ->with('status', __('Broadcast queued to :count recipients.', ['count' => $broadcast->total_recipients]));
    }

    protected function resolveRecipients(string $audience): Collection
    {
        $collect = collect();

        if (in_array($audience, ['subscribers', 'all'], true)) {
            $collect = $collect->merge(
                Subscriber::query()
                    ->where('status', 'subscribed')
                    ->get()
                    ->map(fn ($subscriber) => [
                        'type' => 'subscriber',
                        'id' => $subscriber->id,
                        'email' => $subscriber->email,
                        'name' => null,
                    ])
            );
        }

        if (in_array($audience, ['frontend-users', 'all'], true)) {
            $collect = $collect->merge(
                FrontendUser::query()
                    ->where('status', 'active')
                    ->get()
                    ->map(fn ($user) => [
                        'type' => 'frontend',
                        'id' => $user->id,
                        'email' => $user->email,
                        'name' => $user->name,
                    ])
            );
        }

        return $collect
            ->filter(fn ($recipient) => filter_var($recipient['email'], FILTER_VALIDATE_EMAIL))
            ->unique('email')
            ->values();
    }

    protected function personalizeHtml(string $html, EmailBroadcast $broadcast, EmailBroadcastRecipient $recipient, array $context): string
    {
        $html = $this->personalizeTokens($html, $context);

        if (trim($html) === '') {
            return $html;
        }

        $libxmlState = libxml_use_internal_errors(true);

        $document = new DOMDocument('1.0', 'UTF-8');
        try {
            $document->loadHTML('<?xml encoding="UTF-8">'.$html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        } catch (Throwable $exception) {
            libxml_clear_errors();
            libxml_use_internal_errors($libxmlState);
            report($exception);

            return $html;
        }

        foreach ($document->getElementsByTagName('a') as $anchor) {
            $href = $anchor->getAttribute('href');
            if (! $href || str_starts_with($href, '#') || str_starts_with(trim($href), 'mailto:')) {
                continue;
            }

            $tracked = $this->buildTrackedUrl($broadcast, $recipient, $href);
            $anchor->setAttribute('href', $tracked);
        }

        $processed = $document->saveHTML();
        libxml_clear_errors();
        libxml_use_internal_errors($libxmlState);

        return str_replace('<?xml encoding="UTF-8">', '', $processed);
    }

    protected function personalizeText(string $text, EmailBroadcast $broadcast, EmailBroadcastRecipient $recipient, array $context): string
    {
        $text = $this->personalizeTokens($text, $context);

        return preg_replace_callback(
            '/https?:\/\/[\S]+/i',
            fn ($matches) => $this->buildTrackedUrl($broadcast, $recipient, $matches[0]),
            $text
        );
    }

    protected function personalizeTokens(string $content, array $context): string
    {
        return TemplateRenderer::render($content, $context);
    }

    protected function buildTrackedUrl(EmailBroadcast $broadcast, EmailBroadcastRecipient $recipient, string $original): string
    {
        $tracked = route('email.click', [
            'broadcast' => $broadcast,
            'token' => $recipient->token,
        ]);

        $tracked .= '?url='.urlencode($original);

        return $tracked;
    }

    protected function validatedData(Request $request, ?EmailTemplate $template = null): array
    {
        $templateId = $template?->id ?? 0;

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:email_templates,slug,'.$templateId],
            'audience' => ['required', 'string', 'in:'.implode(',', $this->audiences)],
            'subject' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'html_body' => ['required', 'string'],
            'text_body' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ], [
            'audience.in' => __('Select a valid audience.'),
        ]);

        $validated['is_active'] = $request->boolean('is_active', $template?->is_active ?? true);

        return $validated;
    }
}
