<?php

namespace App\Services\ExternalContent;

use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;

class ArticleContentExtractor
{
    /**
     * Attempt to fetch and extract readable HTML content from a remote article.
     */
    public function fetch(string $url): ?string
    {
        try {
            $response = Http::timeout(15)->get($url);
        } catch (\Throwable $e) {
            return null;
        }

        if ($response->failed() || blank($response->body())) {
            return null;
        }

        return $this->extractBody($response->body());
    }

    protected function extractBody(string $html): ?string
    {
        $crawler = new Crawler($html);

        $candidateSelectors = [
            'article',
            'main',
            '.article-content',
            '.post-content',
            '.entry-content',
            '.story-body',
            '#article-body',
        ];

        foreach ($candidateSelectors as $selector) {
            $nodes = $crawler->filter($selector);

            if (! $nodes->count()) {
                continue;
            }

            $content = $nodes->first()->filter('p, h2, h3, ul, ol, blockquote')
                ->each(fn (Crawler $node) => trim($node->outerHtml()))
                ;

            $filtered = array_filter($content, fn ($value) => filled($value));

            if ($filtered) {
                return $this->sanitizeBody(implode("\n", $filtered));
            }
        }

        return null;
    }

    protected function sanitizeBody(string $html): string
    {
        $allowedTags = '<p><h2><h3><ul><ol><li><blockquote><strong><em><b><i><a><br>'; // keep basic formatting

        $stripped = strip_tags($html, $allowedTags);

        // Remove inline scripts/styles and unwanted attributes
        $stripped = preg_replace('/\s+(on[a-z]+|style|class|id|data-[^=]+)=("[^"]*"|\'[^\']*\'|[^\s>]+)/i', '', $stripped) ?? $stripped;

        // Normalise whitespace and decode entities
        $stripped = html_entity_decode($stripped, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $stripped = preg_replace("/\xc2\xa0/", ' ', $stripped) ?? $stripped; // replace non-breaking spaces

        // Collapse multiple spaces but preserve paragraph separation
        $stripped = preg_replace('/[ \t]+/', ' ', $stripped) ?? $stripped;
        $stripped = preg_replace("/\n{2,}/", "\n\n", $stripped) ?? $stripped;

        return trim($stripped);
    }
}
