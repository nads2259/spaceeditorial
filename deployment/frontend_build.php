<?php

declare(strict_types=1);

/**
 * Build the React frontend with PHP orchestration.
 * Execute with: php deployment/frontend_build.php
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

$requirements = ['node', 'npm'];
foreach ($requirements as $binary) {
    ensureCommand($binary);
}

$expectedFiles = [
    'frontend/package.json',
    'frontend/vite.config.ts',
];

validateFiles($expectedFiles);

$env = [
    'VITE_API_BASE_URL' => getenv('VITE_API_BASE_URL') ?: 'https://api.example.com',
    'VITE_SITE_BASE_URL' => getenv('VITE_SITE_BASE_URL') ?: 'https://www.example.com',
    'VITE_TRACKING_BASE_URL' => getenv('VITE_TRACKING_BASE_URL') ?: 'https://admin.example.com',
];

echo "Using environment overrides:\n";
foreach ($env as $key => $value) {
    echo sprintf("  %s=%s\n", $key, $value);
}

runCommand('Installing frontend dependencies', ['npm', 'ci'], 'frontend');
runCommand('Building production bundle', ['npm', 'run', 'build'], 'frontend', $env);

echo "\nBuild complete. Upload the contents of frontend/dist/ to your static host.\n";

echo "If you need to preview locally, run \"npm run preview -- --host 0.0.0.0\" from the frontend directory.\n";

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

function runCommand(string $label, array $command, ?string $cwd = null, array $env = []): void
{
    echo "\n=== {$label} ===\n";
    $descriptorSpec = [
        0 => STDIN,
        1 => STDOUT,
        2 => STDERR,
    ];

    $processEnv = array_merge(getenv(), $env);

    $process = proc_open(
        $command,
        $descriptorSpec,
        $pipes,
        $cwd ? realpath($cwd) : null,
        $processEnv
    );

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
