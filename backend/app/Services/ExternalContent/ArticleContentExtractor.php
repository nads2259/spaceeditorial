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
                return implode("\n", $filtered);
            }
        }

        return null;
    }
}
