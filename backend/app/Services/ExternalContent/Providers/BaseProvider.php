<?php

namespace App\Services\ExternalContent\Providers;

use App\DataTransferObjects\ExternalArticleData;
use App\Models\ExternalSource;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

abstract class BaseProvider implements Provider
{
    public function __construct(protected ExternalSource $source)
    {
    }

    abstract protected function endpoint(): string;

    abstract protected function queryParameters(): array;

    /**
     * @return Collection<int, array>
     */
    abstract protected function normalizeResponse(array $payload): Collection;

    public function fetch(): Collection
    {
        $response = Http::withHeaders($this->requestHeaders())
            ->timeout(15)
            ->get($this->endpoint(), $this->queryParameters())
            ->throw()
            ->json();

        return $this->normalizeResponse($response)
            ->map(fn (array $attributes) => ExternalArticleData::fromArray(array_merge($attributes, [
                'meta' => array_merge(Arr::get($attributes, 'meta', []), [
                    'provider_slug' => $this->source->slug,
                ]),
            ])));
    }

    protected function requestHeaders(): array
    {
        return [];
    }

    protected function resolveCategory(array $article): array
    {
        $category = Arr::get($article, 'category');
        $subcategory = Arr::get($article, 'subcategory');

        return [$category ? Str::slug($category) : null, $subcategory ? Str::slug($subcategory) : null];
    }
}
