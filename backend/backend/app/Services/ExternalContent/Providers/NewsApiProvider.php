<?php

namespace App\Services\ExternalContent\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class NewsApiProvider extends BaseProvider
{
    protected function endpoint(): string
    {
        return rtrim($this->source->base_url, '/').'/top-headlines';
    }

    protected function queryParameters(): array
    {
        return array_merge([
            'apiKey' => $this->source->api_key,
            'language' => Arr::get($this->source->config, 'language', 'en'),
            'pageSize' => Arr::get($this->source->config, 'page_size', 50),
            'category' => Arr::get($this->source->config, 'category'),
        ], Arr::get($this->source->config, 'query', []));
    }

    protected function normalizeResponse(array $payload): Collection
    {
        $items = Arr::get($payload, 'articles', []);

        return collect($items)
            ->filter(fn ($item) => filled(Arr::get($item, 'title')))
            ->map(function (array $item) {
                return [
                    'title' => Arr::get($item, 'title'),
                    'slug' => Arr::get($item, 'url'),
                    'excerpt' => Arr::get($item, 'description'),
                    'body' => Arr::get($item, 'content'),
                    'image_url' => Arr::get($item, 'urlToImage'),
                    'category' => Arr::get($item, 'category'),
                    'subcategory' => null,
                    'published_at' => Arr::get($item, 'publishedAt'),
                    'original_url' => Arr::get($item, 'url'),
                    'meta' => [
                        'source' => Arr::get($item, 'source.name'),
                        'author' => Arr::get($item, 'author'),
                    ],
                ];
            });
    }
}
