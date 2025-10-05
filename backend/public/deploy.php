<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Artisan;

set_time_limit(0);

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$app->make(Illuminate\Contracts\Http\Kernel::class);

$token = $_GET['token'] ?? '';
$configToken = env('DEPLOY_WEB_TOKEN');

if (! $configToken || ! hash_equals($configToken, $token)) {
    http_response_code(403);
    echo json_encode(['status' => 'error', 'message' => 'Forbidden']);
    exit;
}

$requirements = checkRequirements();
if ($requirements['status'] === 'error') {
    sendJson($requirements, 422);
}

$steps = [
    ['migrate:status', ['--ansi' => true]],
    ['migrate', ['--force' => true, '--ansi' => true]],
    ['config:cache', ['--ansi' => true]],
    ['route:cache', ['--ansi' => true]],
    ['view:cache', ['--ansi' => true]],
];

$results = [];

try {
    foreach ($steps as [$command, $parameters]) {
        $exitCode = Artisan::call($command, $parameters);
        $results[] = [
            'command' => $command,
            'exit_code' => $exitCode,
            'output' => Artisan::output(),
        ];

        if ($exitCode !== 0) {
            sendJson([
                'status' => 'error',
                'message' => sprintf('Command "%s" exited with status %d', $command, $exitCode),
                'results' => $results,
            ], 500);
        }
    }
} catch (Throwable $exception) {
    sendJson([
        'status' => 'error',
        'message' => $exception->getMessage(),
        'trace' => $exception->getTraceAsString(),
        'results' => $results,
    ], 500);
}

sendJson([
    'status' => 'ok',
    'requirements' => $requirements,
    'results' => $results,
]);

function checkRequirements(): array
{
    $issues = [];

    if (version_compare(PHP_VERSION, '8.2.0', '<')) {
        $issues[] = sprintf('PHP 8.2+ required, current %s', PHP_VERSION);
    }

    $requiredExtensions = ['bcmath', 'ctype', 'curl', 'dom', 'fileinfo', 'json', 'mbstring', 'openssl', 'pdo', 'tokenizer'];
    foreach ($requiredExtensions as $extension) {
        if (! extension_loaded($extension)) {
            $issues[] = 'Missing PHP extension: '.$extension;
        }
    }

    $writablePaths = [
        realpath(__DIR__.'/../storage'),
        realpath(__DIR__.'/../bootstrap/cache'),
    ];

    foreach ($writablePaths as $path) {
        if (! $path || ! is_writable($path)) {
            $issues[] = 'Path not writable: '.$path;
        }
    }

    if ($issues !== []) {
        return [
            'status' => 'error',
            'issues' => $issues,
        ];
    }

    return [
        'status' => 'ok',
        'php_version' => PHP_VERSION,
    ];
}

function sendJson(array $payload, int $status = 200): void
{
    http_response_code($status);
    header('Content-Type: application/json');
    echo json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    exit;
}
