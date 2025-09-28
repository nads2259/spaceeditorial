<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\SubcategoryResource;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $categories = Category::query()
            ->active()
            ->with([
                'posts' => fn (Builder $query) => $this->scopeFrontFacingPosts($query)->limit(12),
                'subcategories' => fn (Builder $query) => $query
                    ->active()
                    ->with([
                        'posts' => fn (Builder $query) => $this->scopeFrontFacingPosts($query)->limit(12),
                        'category:id,slug',
                    ])
                    ->orderBy('sort_order'),
            ])
            ->orderBy('sort_order')
            ->get();

        return CategoryResource::collection($categories);
    }

    public function show(string $slug): CategoryResource
    {
        $category = Category::query()
            ->active()
            ->where('slug', $slug)
            ->with([
                'posts' => fn (Builder $query) => $this->scopeFrontFacingPosts($query),
                'subcategories' => fn (Builder $query) => $query
                    ->active()
                    ->with([
                        'posts' => fn (Builder $query) => $this->scopeFrontFacingPosts($query),
                        'category:id,slug',
                    ])
                    ->orderBy('sort_order'),
            ])
            ->firstOrFail();

        return new CategoryResource($category);
    }

    public function subcategory(string $categorySlug, string $subcategorySlug): SubcategoryResource
    {
        $subcategory = Subcategory::query()
            ->whereHas('category', fn (Builder $query) => $query->where('slug', $categorySlug))
            ->where('slug', $subcategorySlug)
            ->active()
            ->with([
                'category:id,slug',
                'posts' => fn (Builder $query) => $this->scopeFrontFacingPosts($query),
            ])
            ->firstOrFail();

        return new SubcategoryResource($subcategory);
    }

    protected function scopeFrontFacingPosts(Builder $query): Builder
    {
        return $query
            ->published()
            ->where('meta->has_full_content', true)
            ->with(['category:id,name,slug,image_path', 'subcategory:id,name,slug,image_path']);
    }
}
