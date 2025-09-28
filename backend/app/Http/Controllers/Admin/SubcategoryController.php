<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $subcategories = Subcategory::query()
            ->with('category:id,name,slug')
            ->orderBy('sort_order')
            ->paginate(15);

        return view('admin.subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.subcategories.create', [
            'subcategory' => new Subcategory(),
            'categories' => Category::query()->orderBy('name')->get(['id', 'name']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);
        $data['slug'] = Str::slug($data['slug'] ?? $data['name']);

        Subcategory::query()->create($data);

        return redirect()->route('admin.subcategories.index')->with('status', 'Subcategory created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory): View
    {
        $subcategory->load(['category', 'posts' => fn ($query) => $query->latest('published_at')]);

        return view('admin.subcategories.show', compact('subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory): View
    {
        return view('admin.subcategories.edit', [
            'subcategory' => $subcategory,
            'categories' => Category::query()->orderBy('name')->get(['id', 'name']),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subcategory $subcategory): RedirectResponse
    {
        $data = $this->validatedData($request, $subcategory);
        $data['slug'] = Str::slug($data['slug'] ?? $data['name']);

        $subcategory->update($data);

        return redirect()->route('admin.subcategories.edit', $subcategory)->with('status', 'Subcategory updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory): RedirectResponse
    {
        $subcategory->delete();

        return redirect()->route('admin.subcategories.index')->with('status', 'Subcategory deleted');
    }

    protected function validatedData(Request $request, ?Subcategory $subcategory = null): array
    {
        $subcategoryId = $subcategory?->id;

        $data = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:subcategories,slug,'.($subcategoryId ?? 'NULL').',id'],
            'description' => ['nullable', 'string'],
            'image_path' => ['nullable', 'string', 'max:255'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['required', 'integer', 'min:0'],
        ]);

        $data['is_active'] = (bool) ($data['is_active'] ?? false);

        return $data;
    }
}
