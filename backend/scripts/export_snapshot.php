<?php

declare(strict_types=1);

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\DB;

require __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/../bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

$tables = [
    'categories',
    'subcategories',
    'posts',
    'site_settings',
    'users',
];

$snapshot = [];

foreach ($tables as $table) {
    $rows = DB::table($table)->orderBy('id')->get()->map(static function ($row) {
        return collect((array) $row)
            ->map(static function ($value) {
                if ($value instanceof \DateTimeInterface) {
                    return $value->format('Y-m-d H:i:s');
                }

                return $value;
            })->all();
    })->all();

    $snapshot[$table] = $rows;
}

$export = exportArray($snapshot);

file_put_contents(
    database_path('seeders/data/database_snapshot.php'),
    "<?php\n\nreturn {$export};\n"
);

function exportArray(mixed $value, int $indentLevel = 0): string
{
    if ($value === null) {
        return 'null';
    }

    if ($value === true) {
        return 'true';
    }

    if ($value === false) {
        return 'false';
    }

    if (! is_array($value)) {
        return var_export($value, true);
    }

    $indent = str_repeat('    ', $indentLevel);
    $nextIndent = str_repeat('    ', $indentLevel + 1);

    if ($value === []) {
        return '[]';
    }

    $isAssoc = array_keys($value) !== range(0, count($value) - 1);

    $lines = [];

    foreach ($value as $key => $item) {
        $formatted = exportArray($item, $indentLevel + 1);
        $line = $nextIndent;

        if ($isAssoc) {
            $line .= var_export($key, true) . ' => ' . $formatted . ',';
        } else {
            $line .= $formatted . ',';
        }

        $lines[] = $line;
    }

    return "[\n" . implode("\n", $lines) . "\n{$indent}]";
}
