<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $search = (string) $request->string('q')->trim();
        $perPage = max(1, min(50, (int) $request->integer('per_page', 12)));

        if ($search === '') {
            return response()->json([
                'data' => [],
                'meta' => [
                    'current_page' => 1,
                    'per_page' => $perPage,
                    'total' => 0,
                    'last_page' => 1,
                ],
                'links' => [],
                'search' => [
                    'query' => $search,
                    'total' => 0,
                ],
            ]);
        }

        $posts = Post::query()
            ->published()
            ->where('meta->has_full_content', true)
            ->where(function ($query) use ($search) {
                $query
                    ->where('title', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%")
                    ->orWhere('body', 'like', "%{$search}%");
            })
            ->with(['category:id,name,slug,image_path', 'subcategory:id,name,slug,image_path'])
            ->orderByDesc('published_at')
            ->paginate($perPage)
            ->appends(['q' => $search]);

        return response()->json([
            'data' => PostResource::collection($posts->items())->resolve(),
            'meta' => [
                'current_page' => $posts->currentPage(),
                'per_page' => $posts->perPage(),
                'total' => $posts->total(),
                'last_page' => $posts->lastPage(),
            ],
            'links' => $posts->linkCollection()->toArray(),
            'search' => [
                'query' => $search,
                'total' => $posts->total(),
            ],
        ]);
    }
}
