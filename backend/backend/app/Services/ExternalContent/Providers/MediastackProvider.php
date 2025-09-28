<?php

namespace App\Services\ExternalContent\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class MediastackProvider extends BaseProvider
{
    protected function endpoint(): string
    {
        return rtrim($this->source->base_url, '/').'/news';
    }

    protected function queryParameters(): array
    {
        return array_merge([
            'access_key' => $this->source->api_key,
            'languages' => Arr::get($this->source->config, 'languages', 'en'),
            'limit' => Arr::get($this->source->config, 'limit', 50),
            'sort' => 'published_desc',
        ], Arr::get($this->source->config, 'query', []));
    }

    protected function normalizeResponse(array $payload): Collection
    {
        $items = Arr::get($payload, 'data', []);

        return collect($items)
            ->filter(fn ($item) => filled(Arr::get($item, 'title')))
            ->map(function (array $item) {
                return [
                    'title' => Arr::get($item, 'title'),
                    'slug' => Arr::get($item, 'url'),
                    'excerpt' => Arr::get($item, 'description'),
                    'body' => Arr::get($item, 'content'),
                    'image_url' => Arr::get($item, 'image'),
                    'category' => Arr::get($item, 'category'),
                    'subcategory' => null,
                    'published_at' => Arr::get($item, 'published_at'),
                    'original_url' => Arr::get($item, 'url'),
                    'meta' => [
                        'author' => Arr::get($item, 'author'),
                        'source' => Arr::get($item, 'source'),
                    ],
                ];
            });
    }
}
