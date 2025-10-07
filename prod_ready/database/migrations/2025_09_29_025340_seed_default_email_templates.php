<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $now = now();

        $templates = [
            [
                'name' => 'Weekly Subscriber Digest',
                'slug' => 'weekly-subscriber-digest',
                'audience' => 'subscribers',
                'subject' => 'Your orbital briefing is ready 🚀',
                'description' => 'Summary email delivered to newsletter subscribers.',
                'html_body' => <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Space Editorial Digest</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #0f172a; color: #f8fafc; margin: 0; padding: 0; }
        .container { max-width: 640px; margin: 0 auto; padding: 32px; }
        .card { background-color: #111827; border-radius: 16px; padding: 32px; }
        .button { display: inline-block; margin-top: 16px; padding: 12px 24px; background-color: #ff6b35; color: #ffffff; border-radius: 9999px; text-decoration: none; font-weight: bold; }
        .footer { margin-top: 24px; font-size: 12px; color: #94a3b8; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Space Editorial Weekly Briefing</h1>
            <p>Hi {{ name }},</p>
            <p>Here is your curated digest of launch updates, mission briefings, and orbital intelligence. Manage the story lineup directly from the admin panel to personalise this note.</p>
            <p>Highlights this week:</p>
            <ul>
                <li>{{ highlight_one }}</li>
                <li>{{ highlight_two }}</li>
                <li>{{ highlight_three }}</li>
            </ul>
            <a href="{{ call_to_action_url }}" class="button">Read the full analysis</a>
            <p class="footer">You are receiving this email because you subscribed to the Space Editorial newsletter.</p>
        </div>
    </div>
</body>
</html>
HTML,
                'text_body' => "Hi {{ name }},\nYour Space Editorial briefing is ready. Highlights:\n- {{ highlight_one }}\n- {{ highlight_two }}\n- {{ highlight_three }}\nRead more: {{ call_to_action_url }}\n",
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Welcome Frontend User',
                'slug' => 'welcome-frontend-user',
                'audience' => 'frontend-users',
                'subject' => 'Welcome aboard Space Editorial',
                'description' => 'Automated welcome note triggered after registration.',
                'html_body' => <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Space Editorial</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #ffffff; color: #111827; margin: 0; padding: 0; }
        .container { max-width: 640px; margin: 0 auto; padding: 32px; }
        .card { border: 1px solid #e2e8f0; border-radius: 16px; padding: 32px; }
        .button { display: inline-block; margin-top: 16px; padding: 12px 24px; background-color: #0f172a; color: #ffffff; border-radius: 12px; text-decoration: none; font-weight: bold; }
        .note { margin-top: 24px; font-size: 13px; color: #475569; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Welcome, {{ name }}!</h1>
            <p>Thanks for creating your Space Editorial account. Use this message to highlight premium journeys, onboarding steps, or curated playlists.</p>
            <p class="note">Recent activity snapshot: {{ activity_summary }}</p>
            <a href="{{ explore_url }}" class="button">Start exploring</a>
        </div>
    </div>
</body>
</html>
HTML,
                'text_body' => "Welcome {{ name }}! Start exploring Space Editorial: {{ explore_url }}\nActivity summary: {{ activity_summary }}\n",
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('email_templates')->insert($templates);
    }

    public function down(): void
    {
        DB::table('email_templates')
            ->whereIn('slug', ['weekly-subscriber-digest', 'welcome-frontend-user'])
            ->delete();
    }
};
