<?php

namespace App\DataTransferObjects;

use Carbon\CarbonImmutable;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ExternalArticleData
{
    public function __construct(
        public readonly string $title,
        public readonly ?string $slug,
        public readonly ?string $excerpt,
        public readonly ?string $body,
        public readonly ?string $imageUrl,
        public readonly ?string $category,
        public readonly ?string $subcategory,
        public readonly CarbonImmutable $publishedAt,
        public readonly string $originalUrl,
        public readonly array $meta = [],
    ) {
    }

    public static function fromArray(array $attributes): self
    {
        $title = trim((string) Arr::get($attributes, 'title'));
        $slug = Arr::get($attributes, 'slug')
            ? Str::slug((string) Arr::get($attributes, 'slug'))
            : Str::slug(Str::limit($title, 60, ''));

        return new self(
            title: $title,
            slug: $slug ?: Str::random(12),
            excerpt: Arr::get($attributes, 'excerpt'),
            body: Arr::get($attributes, 'body'),
            imageUrl: Arr::get($attributes, 'image_url'),
            category: Arr::get($attributes, 'category'),
            subcategory: Arr::get($attributes, 'subcategory'),
            publishedAt: CarbonImmutable::parse(Arr::get($attributes, 'published_at', now()))->setTimezone('UTC'),
            originalUrl: (string) Arr::get($attributes, 'original_url'),
            meta: Arr::get($attributes, 'meta', []),
        );
    }
}
