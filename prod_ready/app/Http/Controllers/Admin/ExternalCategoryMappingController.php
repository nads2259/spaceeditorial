<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ExternalCategoryMapping;
use App\Models\ExternalSource;
use App\Models\Subcategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ExternalCategoryMappingController extends Controller
{
    public function index(): View
    {
        $mappings = ExternalCategoryMapping::query()
            ->with(['externalSource:id,name', 'category:id,name', 'subcategory:id,name'])
            ->orderBy('external_source_id')
            ->orderBy('provider_category')
            ->paginate(25);

        return view('admin.category-mappings.index', compact('mappings'));
    }

    public function create(): View
    {
        return view('admin.category-mappings.create', $this->formData(new ExternalCategoryMapping()));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);

        ExternalCategoryMapping::query()->create($data);

        return redirect()->route('admin.category-mappings.index')->with('status', 'Mapping created');
    }

    public function edit(ExternalCategoryMapping $categoryMapping): View
    {
        return view('admin.category-mappings.edit', $this->formData($categoryMapping));
    }

    public function update(Request $request, ExternalCategoryMapping $categoryMapping): RedirectResponse
    {
        $data = $this->validatedData($request, $categoryMapping);

        $categoryMapping->update($data);

        return redirect()->route('admin.category-mappings.edit', $categoryMapping)->with('status', 'Mapping updated');
    }

    public function destroy(ExternalCategoryMapping $categoryMapping): RedirectResponse
    {
        $categoryMapping->delete();

        return redirect()->route('admin.category-mappings.index')->with('status', 'Mapping deleted');
    }

    protected function validatedData(Request $request, ?ExternalCategoryMapping $mapping = null): array
    {
        $mappingId = $mapping?->id;

        $validated = $request->validate([
            'external_source_id' => ['required', 'exists:external_sources,id'],
            'provider_category' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'subcategory_id' => ['nullable', 'exists:subcategories,id'],
        ]);

        if ($validated['subcategory_id'] ?? null) {
            $subcategory = Subcategory::query()->find($validated['subcategory_id']);
            if ($subcategory && $subcategory->category_id !== (int) $validated['category_id']) {
                abort(422, 'Subcategory must belong to the chosen category.');
            }
        }

        return [
            'external_source_id' => $validated['external_source_id'],
            'provider_category' => Str::lower($validated['provider_category']),
            'category_id' => $validated['category_id'],
            'subcategory_id' => $validated['subcategory_id'] ?? null,
        ];
    }

    protected function formData(ExternalCategoryMapping $mapping): array
    {
        return [
            'mapping' => $mapping,
            'sources' => ExternalSource::query()->orderBy('name')->get(['id', 'name']),
            'categories' => Category::query()->with('subcategories:id,name,category_id')->orderBy('name')->get(['id', 'name']),
            'subcategories' => Subcategory::query()->orderBy('name')->get(['id', 'name', 'category_id']),
        ];
    }
}
