<?php

namespace App\Services\ExternalContent;

use App\DataTransferObjects\ExternalArticleData;
use App\Models\Category;
use App\Models\ExternalSource;
use App\Models\Post;
use App\Models\Subcategory;
use App\Services\ExternalContent\Providers\MediastackProvider;
use App\Services\ExternalContent\Providers\NewsApiProvider;
use App\Services\ExternalContent\Providers\Provider;
use App\Services\ExternalContent\Providers\TheNewsApiProvider;
use Carbon\CarbonImmutable;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use InvalidArgumentException;

class ExternalContentService
{
    public function __construct(
        protected ArticleContentExtractor $extractor,
        protected DatabaseManager $db,
    ) {
    }

    public function sync(ExternalSource $source, bool $force = false): int
    {
        $provider = $this->resolveProvider($source);

        $source->loadMissing(['categoryMappings']);
        $categoryMappings = $source->categoryMappings
            ->keyBy(fn ($mapping) => Str::lower($mapping->provider_category));

        $categoriesBySlug = Category::query()->get(['id', 'slug'])->keyBy('slug');
        $subcategoriesBySlug = Subcategory::query()->get(['id', 'slug', 'category_id'])->groupBy('category_id');

        $articles = $provider->fetch();

        $imported = 0;

        $this->db->connection()->transaction(function () use (
            $articles,
            $source,
            $categoryMappings,
            $categoriesBySlug,
            $subcategoriesBySlug,
            $force,
            &$imported
        ) {
            foreach ($articles as $article) {
                $imported += $this->storeArticle(
                    article: $article,
                    source: $source,
                    categoryMappings: $categoryMappings,
                    categoriesBySlug: $categoriesBySlug,
                    subcategoriesBySlug: $subcategoriesBySlug,
                    force: $force
                ) ? 1 : 0;
            }
        });

        $source->forceFill(['last_synced_at' => now()])->save();

        return $imported;
    }

    protected function resolveProvider(ExternalSource $source): Provider
    {
        return match ($source->driver) {
            'mediastack' => new MediastackProvider($source),
            'thenewsapi' => new TheNewsApiProvider($source),
            'newsapi' => new NewsApiProvider($source),
            default => throw new InvalidArgumentException("Unsupported external source driver: {$source->driver}"),
        };
    }

    protected function storeArticle(
        ExternalArticleData $article,
        ExternalSource $source,
        Collection $categoryMappings,
        Collection $categoriesBySlug,
        Collection $subcategoriesBySlug,
        bool $force
    ): bool {
        $externalId = sha1($article->originalUrl);
        $contentHash = hash('sha256', $article->originalUrl.$article->title);

        $existing = Post::query()
            ->where(function ($query) use ($source, $externalId) {
                $query->where('external_source_id', $source->id)
                    ->where('external_id', $externalId);
            })
            ->orWhere('content_hash', $contentHash)
            ->first();

        if ($existing && ! $force) {
            return false;
        }

        $body = $article->body;

        if (! filled($body)) {
            $body = $this->extractor->fetch($article->originalUrl);
        }

        if (! filled($body)) {
            if ($existing) {
                $existing->delete();
            }

            return false;
        }

        [$categoryId, $subcategoryId] = $this->resolveCategoryAssignments(
            $article,
            $source,
            $categoryMappings,
            $categoriesBySlug,
            $subcategoriesBySlug
        );

        if (! $categoryId) {
            return false;
        }

        $payload = [
            'category_id' => $categoryId,
            'subcategory_id' => $subcategoryId,
            'external_source_id' => $source->id,
            'external_id' => $externalId,
            'content_hash' => $contentHash,
            'title' => $article->title,
            'slug' => $article->slug,
            'excerpt' => Str::limit(strip_tags((string) $article->excerpt ?: strip_tags($body)), 280),
            'body' => $body,
            'image_path' => $article->imageUrl,
            'original_url' => $article->originalUrl,
            'is_published' => true,
            'published_at' => $article->publishedAt instanceof CarbonImmutable
                ? $article->publishedAt->toDateTimeString()
                : $article->publishedAt,
            'imported_at' => now(),
            'meta' => array_merge($article->meta, [
                'has_full_content' => true,
            ]),
        ];

        if ($existing) {
            $existing->fill($payload)->save();
        } else {
            Post::query()->create($payload);
        }

        return true;
    }

    protected function resolveCategoryAssignments(
        ExternalArticleData $article,
        ExternalSource $source,
        Collection $categoryMappings,
        Collection $categoriesBySlug,
        Collection $subcategoriesBySlug
    ): array {
        $categorySlug = Str::lower((string) $article->category);
        $mapping = $categoryMappings->get($categorySlug);

        $categoryId = $mapping?->category_id
            ?? $categoriesBySlug->get($categorySlug)?->id
            ?? null;

        $subcategoryId = $mapping?->subcategory_id;

        if (! $subcategoryId && $categoryId && $article->subcategory) {
            $subSlug = Str::lower($article->subcategory);
            $subcategoryId = optional($subcategoriesBySlug->get($categoryId))
                ?->firstWhere('slug', $subSlug)
                ?->id;
        }

        return [$categoryId, $subcategoryId];
    }
}
