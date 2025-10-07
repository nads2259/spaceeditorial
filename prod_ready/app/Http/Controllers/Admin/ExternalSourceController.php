<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExternalSource;
use App\Services\ExternalContent\ExternalContentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Throwable;

class ExternalSourceController extends Controller
{
    public function __construct(private readonly ExternalContentService $contentService)
    {
    }

    public function index(): View
    {
        $sources = ExternalSource::query()
            ->orderBy('name')
            ->paginate(20);

        return view('admin.external-sources.index', compact('sources'));
    }

    public function create(): View
    {
        return view('admin.external-sources.create', [
            'source' => new ExternalSource([
                'is_active' => true,
            ]),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);

        ExternalSource::query()->create($data);

        return redirect()->route('admin.external-sources.index')->with('status', 'External source created');
    }

    public function show(ExternalSource $externalSource): View
    {
        return view('admin.external-sources.show', ['source' => $externalSource]);
    }

    public function edit(ExternalSource $externalSource): View
    {
        return view('admin.external-sources.edit', ['source' => $externalSource]);
    }

    public function update(Request $request, ExternalSource $externalSource): RedirectResponse
    {
        $data = $this->validatedData($request, $externalSource);

        $externalSource->update($data);

        return redirect()->route('admin.external-sources.edit', $externalSource)->with('status', 'External source updated');
    }

    public function destroy(ExternalSource $externalSource): RedirectResponse
    {
        $externalSource->delete();

        return redirect()->route('admin.external-sources.index')->with('status', 'External source deleted');
    }

    public function sync(Request $request, ExternalSource $externalSource): RedirectResponse
    {
        $force = $request->boolean('force');

        try {
            $imported = $this->contentService->sync($externalSource, $force);

            return redirect()
                ->route('admin.external-sources.index')
                ->with('status', trans_choice('Imported :count article|Imported :count articles', $imported, ['count' => $imported]));
        } catch (Throwable $exception) {
            report($exception);

            return redirect()
                ->route('admin.external-sources.index')
                ->with('error', __('Sync failed for :name: :message', [
                    'name' => $externalSource->name,
                    'message' => $exception->getMessage(),
                ]));
        }
    }

    public function syncAll(Request $request): RedirectResponse
    {
        $force = $request->boolean('force');

        $sources = ExternalSource::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        if ($sources->isEmpty()) {
            return redirect()
                ->route('admin.external-sources.index')
                ->with('error', __('No active external sources are configured.'));
        }

        $totalImported = 0;
        $failed = [];

        foreach ($sources as $source) {
            try {
                $imported = $this->contentService->sync($source, $force);
                $totalImported += $imported;
            } catch (Throwable $exception) {
                report($exception);
                $failed[] = __(':name (:message)', [
                    'name' => $source->name,
                    'message' => $exception->getMessage(),
                ]);
            }
        }

        if (count($failed) === 0) {
            return redirect()
                ->route('admin.external-sources.index')
                ->with('status', __('Sync completed. Imported :count articles from :sources sources.', [
                    'count' => $totalImported,
                    'sources' => $sources->count(),
                ]));
        }

        $errorMessage = __('Some sources failed to sync: :list', [
            'list' => implode('; ', $failed),
        ]);

        return redirect()
            ->route('admin.external-sources.index')
            ->with('error', $errorMessage)
            ->with('status', __('Imported :count articles from :success sources.', [
                'count' => $totalImported,
                'success' => $sources->count() - count($failed),
            ]));
    }

    protected function validatedData(Request $request, ?ExternalSource $externalSource = null): array
    {
        $sourceId = $externalSource?->id;

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:external_sources,slug,'.($sourceId ?? 'NULL').',id'],
            'driver' => ['required', 'string', 'max:255'],
            'base_url' => ['nullable', 'url', 'max:255'],
            'api_key' => ['nullable', 'string'],
            'config' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $config = [];
        if (filled($validated['config'] ?? null)) {
            $decoded = json_decode($validated['config'], true);
            if (json_last_error() !== JSON_ERROR_NONE || ! is_array($decoded)) {
                abort(422, 'Config must be valid JSON.');
            }
            $config = $decoded;
        }

        $slug = $validated['slug'] ?? null;
        $slug = $slug ? Str::slug($slug) : Str::slug($validated['name']);

        return [
            'name' => $validated['name'],
            'slug' => $slug,
            'driver' => Str::lower($validated['driver']),
            'base_url' => $validated['base_url'] ?? null,
            'api_key' => $validated['api_key'] ?? null,
            'config' => $config,
            'is_active' => (bool) ($validated['is_active'] ?? false),
        ];
    }
}
