<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    public function show(string $slug): PostResource
    {
        $post = Post::query()
            ->published()
            ->where('slug', $slug)
            ->where('meta->has_full_content', true)
            ->with(['category:id,name,slug,image_path', 'subcategory:id,name,slug,image_path'])
            ->firstOrFail();

        return new PostResource($post);
    }
}
