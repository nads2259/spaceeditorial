<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubcategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $posts = $this->whenLoaded('posts', function () use ($request) {
            $data = PostResource::collection($this->posts)->toArray($request);

            return $data['data'] ?? $data;
        }, []);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'image' => $this->image_path,
            'categorySlug' => optional($this->category)->slug,
            'posts' => $posts,
        ];
    }
}
