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

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */

class ExternalContentService
{
    /**
     * Phrases to strip from the end of imported articles.
     * Lower-case entries for comparison.
     *
     * @var string[]
     */
    protected array $footerPhrases = [
        'more about',
        'join our commenting forum',
        'join thought-provoking conversations, follow other independent readers and see their replies',
        'most popular',
        'popular videos',
        'bulletin',
        'read next',
        'advertisement',
    ];

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
        $urlSignature = $article->originalUrl
            ? Str::lower(trim($article->originalUrl))
            : ($article->slug ? Str::lower($article->slug) : null);

        if (! $urlSignature) {
            return false;
        }
        $externalId = sha1($urlSignature);
        $contentHash = hash('sha256', $urlSignature);

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

        $body = $this->sanitizeArticleBody($body);

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

        $excerptSource = $article->excerpt ?: strip_tags($body);

        $payload = [
            'category_id' => $categoryId,
            'subcategory_id' => $subcategoryId,
            'external_source_id' => $source->id,
            'external_id' => $externalId,
            'content_hash' => $contentHash,
            'title' => $article->title,
            'slug' => $article->slug,
            'excerpt' => Str::limit(strip_tags((string) $excerptSource), 280),
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

    protected function sanitizeArticleBody(?string $body): ?string
    {
        if (! filled($body)) {
            return $body;
        }

        $body = preg_replace('/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/i', '', (string) $body);
        $body = preg_replace('/<style\b[^<]*(?:(?!<\/style>)<[^<]*)*<\/style>/i', '', (string) $body);

        $body = trim((string) $body);

        if ($body === '') {
            return null;
        }

        $dom = new \DOMDocument('1.0', 'UTF-8');
        $html = '<?xml encoding="utf-8"?><div>'.$body.'</div>';

        $previous = libxml_use_internal_errors(true);
        $loaded = $dom->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        libxml_use_internal_errors($previous);

        if (! $loaded) {
            return trim($body);
        }

        $root = $dom->documentElement;

        if (! $root) {
            return trim($body);
        }

        $xpath = new \DOMXPath($dom);

        foreach ($xpath->query('//script | //style') as $node) {
            $node->parentNode?->removeChild($node);
        }

        foreach ($xpath->query('//code | //pre') as $node) {
            if (preg_match('/\b(function|var|let|const|window|document)\b/i', $node->textContent ?? '')) {
                $node->parentNode?->removeChild($node);
            }
        }

        $this->removeTrailingFooters($root);

        $cleaned = '';
        foreach (iterator_to_array($root->childNodes) as $child) {
            $cleaned .= $dom->saveHTML($child);
        }

        $cleaned = trim($cleaned);

        return $cleaned !== '' ? $cleaned : null;
    }

    protected function removeTrailingFooters(\DOMNode $node): void
    {
        while ($node->lastChild) {
            $last = $node->lastChild;

            if ($last instanceof \DOMText) {
                $text = trim($last->wholeText ?? '');

                if ($text === '') {
                    $node->removeChild($last);
                    continue;
                }

                if ($this->isFooterText($text)) {
                    $node->removeChild($last);
                    continue;
                }

                break;
            }

            if ($last instanceof \DOMElement) {
                $tag = strtolower($last->tagName);

                if (in_array($tag, ['br', 'hr'], true)) {
                    $node->removeChild($last);
                    continue;
                }

                $this->removeTrailingFooters($last);

                $text = trim($last->textContent ?? '');

                if ($text === '') {
                    $node->removeChild($last);
                    continue;
                }

                if ($this->isFooterText($text)) {
                    $node->removeChild($last);
                    continue;
                }

                break;
            }

            if (trim($last->textContent ?? '') === '') {
                $node->removeChild($last);
                continue;
            }

            break;
        }
    }

    protected function isFooterText(string $text): bool
    {
        $normalized = preg_replace('/\s+/u', ' ', mb_strtolower(trim($text)));

        if ($normalized === '' || $normalized === null) {
            return false;
        }

        foreach ($this->footerPhrases as $phrase) {
            if (str_starts_with($normalized, $phrase)) {
                return true;
            }
        }

        return false;
    }
}
