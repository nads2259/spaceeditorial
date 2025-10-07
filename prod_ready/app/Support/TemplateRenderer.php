<?php

namespace App\Support;

use Illuminate\Support\Arr;
use Stringable;

class TemplateRenderer
{
    public static function render(string $content, array $context): string
    {
        $replacements = [];

        $name = $context['name'] ?? null;
        $replacements['name'] = $name ? (string) $name : __('Reader');

        foreach ($context as $key => $value) {
            if ($key === 'name') {
                $replacements['name'] = $value ? (string) $value : $replacements['name'];
                continue;
            }

            $replacements[$key] = self::stringify($value);
        }

        foreach ($replacements as $key => $value) {
            $content = str_replace(
                ['{{'.$key.'}}', '{{ '.$key.' }}'],
                $value,
                $content
            );
        }

        return $content;
    }

    protected static function stringify(mixed $value): string
    {
        if ($value === null) {
            return '';
        }

        if (is_scalar($value) || $value instanceof Stringable) {
            return (string) $value;
        }

        if (is_array($value)) {
            return collect(Arr::flatten($value))->map(fn ($item) => self::stringify($item))->implode(', ');
        }

        $encoded = json_encode($value);

        if ($encoded !== false) {
            return (string) $encoded;
        }

        return is_object($value) ? get_class($value) : '';
    }
}
