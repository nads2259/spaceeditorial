<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'excerpt' => $this->excerpt,
            'body' => $this->body,
            'image' => $this->image_path,
            'isPublished' => (bool) $this->is_published,
            'publishedAt' => optional($this->published_at)?->toISOString(),
            'readingTime' => $this->readingTime(),
            'originalUrl' => $this->original_url,
            'meta' => $this->meta,
            'category' => $this->when(
                $this->relationLoaded('category') && $this->category,
                fn () => [
                    'id' => $this->category->id,
                    'name' => $this->category->name,
                    'slug' => $this->category->slug,
                    'image' => $this->category->image_path,
                ]
            ),
            'subcategory' => $this->when(
                $this->relationLoaded('subcategory') && $this->subcategory,
                fn () => [
                    'id' => $this->subcategory->id,
                    'name' => $this->subcategory->name,
                    'slug' => $this->subcategory->slug,
                    'image' => $this->subcategory->image_path,
                ]
            ),
        ];
    }
}
