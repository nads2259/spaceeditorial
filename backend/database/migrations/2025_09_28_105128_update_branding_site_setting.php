<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('site_settings')) {
            return;
        }

        DB::table('site_settings')->updateOrInsert(
            ['key' => 'branding'],
            [
                'value' => json_encode([
                    'logo_text' => 'Space Editorial',
                    'accent_color' => '#4f46e5',
                    'background_color' => '#0f172a',
                ], JSON_THROW_ON_ERROR),
            ]
        );
    }

    public function down(): void
    {
        if (! Schema::hasTable('site_settings')) {
            return;
        }

        DB::table('site_settings')->where('key', 'branding')->update([
            'value' => json_encode([
                'logo_text' => 'Highway Sniper',
                'accent_color' => '#ff6b35',
                'background_color' => '#0f172a',
            ], JSON_THROW_ON_ERROR),
        ]);
    }
};
