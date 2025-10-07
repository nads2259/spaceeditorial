<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;

class SettingsController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $branding = SiteSetting::query()
            ->where('key', 'branding')
            ->first();

        $data = [
            'logoText' => Arr::get($branding?->value ?? [], 'logo_text', 'Space Editorial'),
            'accentColor' => Arr::get($branding?->value ?? [], 'accent_color', '#ff6b35'),
            'backgroundColor' => Arr::get($branding?->value ?? [], 'background_color', '#0f172a'),
        ];

        return response()->json($data);
    }
}
