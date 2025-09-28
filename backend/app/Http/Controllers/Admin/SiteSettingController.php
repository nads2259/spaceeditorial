<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteSettingController extends Controller
{
    public function index(): View
    {
        $settings = SiteSetting::query()->orderBy('key')->paginate(25);

        return view('admin.site-settings.index', compact('settings'));
    }

    public function create(): View
    {
        return view('admin.site-settings.create', [
            'setting' => new SiteSetting(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);

        SiteSetting::query()->create($data);

        return redirect()->route('admin.site-settings.index')->with('status', 'Setting created');
    }

    public function edit(SiteSetting $siteSetting): View
    {
        return view('admin.site-settings.edit', ['setting' => $siteSetting]);
    }

    public function update(Request $request, SiteSetting $siteSetting): RedirectResponse
    {
        $data = $this->validatedData($request, $siteSetting);

        $siteSetting->update($data);

        return redirect()->route('admin.site-settings.edit', $siteSetting)->with('status', 'Setting updated');
    }

    public function destroy(SiteSetting $siteSetting): RedirectResponse
    {
        $siteSetting->delete();

        return redirect()->route('admin.site-settings.index')->with('status', 'Setting deleted');
    }

    protected function validatedData(Request $request, ?SiteSetting $siteSetting = null): array
    {
        $settingId = $siteSetting?->id;

        $validated = $request->validate([
            'key' => ['required', 'string', 'max:255', 'unique:site_settings,key,'.($settingId ?? 'NULL').',id'],
            'value' => ['nullable', 'string'],
        ]);

        $value = [];
        if (filled($validated['value'] ?? null)) {
            $decoded = json_decode($validated['value'], true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                abort(422, 'Value must be valid JSON.');
            }
            $value = $decoded;
        }

        return [
            'key' => $validated['key'],
            'value' => $value,
        ];
    }
}
