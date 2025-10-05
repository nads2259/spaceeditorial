<?php

namespace Tests\Feature\Admin;

use App\Mail\TemplateBroadcastMail;
use App\Models\EmailBroadcast;
use App\Models\EmailTemplate;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class EmailBroadcastTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_send_broadcast_email_to_subscribers(): void
    {
        Mail::fake();

        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $subscriber = Subscriber::query()->create([
            'email' => 'subscriber@example.test',
            'status' => 'subscribed',
            'subscribed_at' => now(),
        ]);

        $template = EmailTemplate::query()->create([
            'name' => 'Launch Update',
            'slug' => 'launch-update',
            'audience' => 'subscribers',
            'subject' => 'Space Editorial Launch',
            'description' => 'Product launch announcement',
            'html_body' => '<p>Hello {{ name ?? "friend" }}, welcome aboard.</p>',
            'text_body' => 'Hello friend, welcome aboard.',
            'is_active' => true,
        ]);

        $response = $this->actingAs($admin)
            ->post(route('admin.email-templates.send', $template), [
                'audience' => 'subscribers',
            ]);

        $response->assertRedirect(route('admin.email-templates.edit', $template));
        $response->assertSessionHas('status');

        $broadcast = EmailBroadcast::query()->first();
        $this->assertNotNull($broadcast);
        $this->assertSame('sent', $broadcast->status);
        $this->assertSame(1, $broadcast->sent_count);
        $this->assertSame(1, $broadcast->total_recipients);
        $this->assertNotNull($broadcast->sent_at);

        $this->assertDatabaseHas('email_broadcast_recipients', [
            'email_broadcast_id' => $broadcast->id,
            'email' => $subscriber->email,
            'status' => 'sent',
        ]);

        Mail::assertSent(TemplateBroadcastMail::class, function (TemplateBroadcastMail $mail) use ($subscriber, $template) {
            return $mail->hasTo($subscriber->email)
                && $mail->subjectLine === $template->subject;
        });
    }
}
