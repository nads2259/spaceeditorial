<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $now = now();

        DB::table('email_templates')->upsert([
            [
                'name' => 'Welcome Subscriber',
                'slug' => 'welcome-subscriber',
                'audience' => 'subscribers',
                'subject' => 'Welcome to Space Editorial',
                'description' => 'Sent when a reader joins the newsletter.',
                'html_body' => <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Space Editorial</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #0f172a; color: #e2e8f0; margin: 0; padding: 0; }
        .container { max-width: 640px; margin: 0 auto; padding: 32px 24px; }
        .card { background: #111827; border-radius: 20px; padding: 32px; }
        .card h1 { margin-top: 0; font-size: 28px; }
        .articles { margin-top: 24px; }
        .footer { margin-top: 32px; font-size: 12px; color: #94a3b8; }
        a.button { display: inline-block; margin-top: 16px; padding: 12px 24px; background: #ff6b35; color: #ffffff; border-radius: 999px; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Welcome aboard, {{ name }}!</h1>
            <p>Thanks for signing up to receive Space Editorial alerts. Here are the latest mission briefings to get you started:</p>
            <div class="articles">
                {{ latest_articles_html }}
            </div>
            <a href="{{ onboarding_url }}" class="button">Explore more stories</a>
            <div class="footer">
                You're receiving this message because you subscribed to Space Editorial updates.
            </div>
        </div>
    </div>
</body>
</html>
HTML,
                'text_body' => <<<TEXT
Welcome aboard, {{ name }}!

Thanks for subscribing to Space Editorial. Here are the latest briefings:
{{ latest_articles_text }}

Dive into more stories: {{ onboarding_url }}
TEXT,
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
        body { font-family: Arial, sans-serif; background-color: #ffffff; color: #0f172a; margin: 0; padding: 0; }
        .container { max-width: 640px; margin: 0 auto; padding: 32px 24px; }
        .card { border: 1px solid #e2e8f0; border-radius: 20px; padding: 32px; }
        .card h1 { margin-top: 0; font-size: 28px; }
        .articles { margin-top: 24px; }
        a.button { display: inline-block; margin-top: 16px; padding: 12px 24px; background: #0f172a; color: #ffffff; border-radius: 14px; text-decoration: none; font-weight: bold; }
        .note { margin-top: 24px; font-size: 13px; color: #475569; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>We're glad you're here, {{ name }}!</h1>
            <p>Use this space to point new members toward the best launch pads. Here's what a few of our latest releases look like:</p>
            <div class="articles">
                {{ latest_articles_html }}
            </div>
            <a href="{{ explore_url }}" class="button">Start exploring</a>
            <p class="note">Recent activity snapshot: {{ activity_summary }}</p>
        </div>
    </div>
</body>
</html>
HTML,
                'text_body' => <<<TEXT
Welcome, {{ name }}!

Here are the latest articles to explore:
{{ latest_articles_text }}

Start exploring: {{ explore_url }}
Activity summary: {{ activity_summary }}
TEXT,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ], ['slug'], ['name', 'audience', 'subject', 'description', 'html_body', 'text_body', 'is_active', 'updated_at']);
    }

    public function down(): void
    {
        DB::table('email_templates')
            ->whereIn('slug', ['welcome-subscriber'])
            ->delete();

        DB::table('email_templates')
            ->where('slug', 'welcome-frontend-user')
            ->update([
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
            ]);
    }
};
