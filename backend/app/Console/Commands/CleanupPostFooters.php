<?php

namespace App\Console\Commands;

use App\Models\Post;
use DOMDocument;
use DOMNode;
use DOMXPath;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CleanupPostFooters extends Command
{
    protected $signature = 'content:cleanup-footers {--dry-run : Show changes without updating the database}';

    protected $description = 'Remove boilerplate footer snippets and stray scripts from imported posts';

    /**
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

    public function handle(): int
    {
        $dryRun = (bool) $this->option('dry-run');
        $updated = 0;
        $checked = 0;

        Post::query()
            ->select(['id', 'body'])
            ->chunk(100, function ($posts) use (&$updated, &$checked, $dryRun) {
                foreach ($posts as $post) {
                    $checked++;

                    $cleaned = $this->sanitizeBody($post->body);

                    if ($cleaned === null || $cleaned === $post->body) {
                        continue;
                    }

                    $updated++;

                    if (! $dryRun) {
                        $post->update(['body' => $cleaned]);
                    }
                }
            });

        $this->info("Processed {$checked} posts. " . ($dryRun ? 'Would update' : 'Updated') . " {$updated} record(s).");

        return self::SUCCESS;
    }

    protected function sanitizeBody(?string $body): ?string
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

        $dom = new DOMDocument('1.0', 'UTF-8');
        $html = '<?xml encoding="utf-8"?><div>'.$body.'</div>';

        $previous = libxml_use_internal_errors(true);
        $loaded = $dom->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        libxml_use_internal_errors($previous);

        if (! $loaded || ! $dom->documentElement) {
            return trim($body);
        }

        $root = $dom->documentElement;
        $xpath = new DOMXPath($dom);

        foreach ($xpath->query('//script | //style') as $node) {
            $node->parentNode?->removeChild($node);
        }

        foreach ($xpath->query('//code | //pre') as $node) {
            if (preg_match('/\b(function|var|let|const|window|document)\b/i', $node->textContent ?? '')) {
                $node->parentNode?->removeChild($node);
            }
        }

        $this->stripTrailingFooters($root);

        $cleaned = '';
        foreach (iterator_to_array($root->childNodes) as $child) {
            $cleaned .= $dom->saveHTML($child);
        }

        $cleaned = trim($cleaned);

        return $cleaned !== '' ? $cleaned : null;
    }

    protected function stripTrailingFooters(DOMNode $node): void
    {
        while ($node->lastChild) {
            $last = $node->lastChild;

            if ($last instanceof DOMNode && $last->nodeType === XML_TEXT_NODE) {
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

            if ($last instanceof \DOMElement) {
                $tag = strtolower($last->tagName);

                if (in_array($tag, ['br', 'hr'], true)) {
                    $node->removeChild($last);
                    continue;
                }

                $this->stripTrailingFooters($last);

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
        $normalised = preg_replace('/\s+/u', ' ', Str::lower(trim($text)));

        foreach ($this->footerPhrases as $phrase) {
            if ($normalised === $phrase || Str::startsWith($normalised, $phrase)) {
                return true;
            }
        }

        return false;
    }
}
