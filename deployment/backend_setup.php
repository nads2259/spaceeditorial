<?php

declare(strict_types=1);

/**
 * Run backend deployment tasks when only PHP CLI access is available.
 * Execute with: php deployment/backend_setup.php
 */

if (! defined('STDIN')) {
    define('STDIN', fopen('php://temp', 'r'));
}

if (! defined('STDOUT')) {
    define('STDOUT', fopen('php://output', 'w'));
}

if (! defined('STDERR')) {
    $stderr = @fopen('php://stderr', 'w');
    if (! $stderr) {
        $stderr = fopen('php://output', 'w');
    }
    define('STDERR', $stderr);
}

$requirements = ['composer', 'npm'];
foreach ($requirements as $binary) {
    ensureCommand($binary);
}

$expectedFiles = [
    'backend/composer.json',
    'backend/artisan',
    'backend/package.json',
    'backend/vite.config.js',
];

validateFiles($expectedFiles);

$steps = [
    ['Installing Composer dependencies', ['composer', 'install', '--no-dev', '--optimize-autoloader'], 'backend'],
    ['Generating app key (safe if it already exists)', ['php', 'artisan', 'key:generate', '--force'], 'backend'],
    ['Running database migrations', ['php', 'artisan', 'migrate', '--force'], 'backend'],
    ['Caching configuration', ['php', 'artisan', 'config:cache'], 'backend'],
    ['Caching routes', ['php', 'artisan', 'route:cache'], 'backend'],
    ['Caching views', ['php', 'artisan', 'view:cache'], 'backend'],
    ['Installing backend NPM dependencies', ['npm', 'ci'], 'backend'],
    ['Building backend assets', ['npm', 'run', 'build'], 'backend'],
    ['Triggering scheduled tasks (optional warmup)', ['php', 'artisan', 'schedule:run'], 'backend'],
];

foreach ($steps as [$label, $command, $cwd]) {
    runCommand($label, $command, $cwd);
}

echo "\nAll backend tasks completed. Upload the backend directory (including vendor/ and public/build/) to the host.\n";

function ensureCommand(string $command): void
{
    if (! commandExists($command)) {
        fwrite(STDERR, "[ERROR] Required command '{$command}' is not available. Install it or adjust PATH.\n");
        exit(1);
    }
}

function validateFiles(array $paths): void
{
    $missing = [];
    foreach ($paths as $path) {
        if (! file_exists($path)) {
            $missing[] = $path;
        }
    }

    if ($missing !== []) {
        fwrite(STDERR, "[ERROR] The following required files are missing:\n");
        foreach ($missing as $path) {
            fwrite(STDERR, "  - {$path}\n");
        }
        exit(1);
    }
}

function commandExists(string $command): bool
{
    $paths = explode(PATH_SEPARATOR, getenv('PATH') ?: '');
    $extensions = [''];
    if (str_starts_with(PHP_OS_FAMILY, 'Windows')) {
        $pathExt = getenv('PATHEXT') ?: '.EXE;.BAT;.CMD';
        $extensions = array_merge($extensions, array_map('strtolower', explode(';', $pathExt)));
    }

    foreach ($paths as $path) {
        $path = rtrim($path, DIRECTORY_SEPARATOR);
        if ($path === '') {
            continue;
        }
        foreach ($extensions as $ext) {
            $full = $path.DIRECTORY_SEPARATOR.$command.$ext;
            if (is_file($full) && is_executable($full)) {
                return true;
            }
        }
    }

    return false;
}

function runCommand(string $label, array $command, ?string $cwd = null): void
{
    echo "\n=== {$label} ===\n";
    $descriptorSpec = [
        0 => STDIN,
        1 => STDOUT,
        2 => STDERR,
    ];

    $process = proc_open($command, $descriptorSpec, $pipes, $cwd ? realpath($cwd) : null);

    if (! is_resource($process)) {
        fwrite(STDERR, "Failed to start process for \"{$label}\".\n");
        exit(1);
    }

    $status = proc_close($process);
    if ($status !== 0) {
        fwrite(STDERR, "Command for \"{$label}\" exited with status {$status}.\n");
        exit($status ?: 1);
    }
}
