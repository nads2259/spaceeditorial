<?php

declare(strict_types=1);

/**
 * Production maintenance helper.
 *
 * - Validates the runtime (PHP version/extensions, writable paths).
 * - Runs pending database migrations and refreshes caches.
 *
 * Execute with: php deployment/production_update.php
 */

const MIN_PHP_VERSION = '8.2.0';
const REQUIRED_EXTENSIONS = ['bcmath', 'ctype', 'curl', 'dom', 'fileinfo', 'json', 'mbstring', 'openssl', 'pdo', 'tokenizer'];
const WRITABLE_PATHS = ['backend/storage', 'backend/bootstrap/cache'];

$issues = [];

if (version_compare(PHP_VERSION, MIN_PHP_VERSION, '<')) {
    $issues[] = sprintf('PHP %s or higher is required. Current version: %s', MIN_PHP_VERSION, PHP_VERSION);
}

foreach (REQUIRED_EXTENSIONS as $extension) {
    if (! extension_loaded($extension)) {
        $issues[] = sprintf('Missing required PHP extension: %s', $extension);
    }
}

foreach (WRITABLE_PATHS as $path) {
    $realPath = realpath($path);
    if (! $realPath || ! is_writable($realPath)) {
        $issues[] = sprintf('Path must be writable: %s', $path);
    }
}

if ($issues !== []) {
    fwrite(STDERR, "Environment check failed:\n");
    foreach ($issues as $issue) {
        fwrite(STDERR, "  - {$issue}\n");
    }
    exit(1);
}

echo "Environment checks passed.\n";

envWarning();

$commands = [
    ['Checking migration status', ['php', 'artisan', 'migrate', '--status'], 'backend'],
    ['Applying pending migrations', ['php', 'artisan', 'migrate', '--force'], 'backend'],
    ['Caching configuration', ['php', 'artisan', 'config:cache'], 'backend'],
    ['Caching routes', ['php', 'artisan', 'route:cache'], 'backend'],
    ['Caching views', ['php', 'artisan', 'view:cache'], 'backend'],
];

foreach ($commands as [$label, $command, $cwd]) {
    runCommand($label, $command, $cwd);
}

echo "\nProduction update complete.\n";

function runCommand(string $label, array $command, string $directory): void
{
    echo "\n=== {$label} ===\n";

    $descriptorSpec = [
        0 => STDIN,
        1 => STDOUT,
        2 => STDERR,
    ];

    $process = proc_open(
        $command,
        $descriptorSpec,
        $pipes,
        realpath($directory) ?: getcwd()
    );

    if (! is_resource($process)) {
        fwrite(STDERR, "Failed to run command for {$label}.\n");
        exit(1);
    }

    $status = proc_close($process);
    if ($status !== 0) {
        fwrite(STDERR, "Command for {$label} exited with status {$status}.\n");
        exit($status ?: 1);
    }
}

function envWarning(): void
{
    $appEnv = getenv('APP_ENV') ?: 'unknown';
    if ($appEnv !== 'production') {
        echo "[Warning] APP_ENV is set to '{$appEnv}'. Ensure this is intentional before running in production.\n";
    }
}
