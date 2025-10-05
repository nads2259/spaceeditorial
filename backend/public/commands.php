<?php

declare(strict_types=1);

if (! function_exists('str_starts_with')) {
    function str_starts_with(string $haystack, string $needle): bool
    {
        return $needle === '' || strncmp($haystack, $needle, strlen($needle)) === 0;
    }
}

if (! function_exists('str_ends_with')) {
    function str_ends_with(string $haystack, string $needle): bool
    {
        return $needle === '' || substr($haystack, -strlen($needle)) === $needle;
    }
}

header('Content-Type: text/html; charset=UTF-8');

$token = $_GET['token'] ?? '';
$expectedToken = resolveDeployToken();

if ($expectedToken === null) {
    http_response_code(500);
    echo renderErrorPage('DEPLOY_WEB_TOKEN is not configured. Set it in the environment or .env file before using this checklist.');
    exit;
}

if ($expectedToken === '' || ! hash_equals($expectedToken, $token)) {
    http_response_code(403);
    echo renderErrorPage('Forbidden. Supply the correct token via ?token=YOUR_TOKEN.');
    exit;
}

$commandGroups = buildCommandGroups();

$format = strtolower($_GET['format'] ?? 'html');
if ($format === 'json') {
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($commandGroups, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    exit;
}

echo renderHtml($commandGroups);

function resolveDeployToken(): ?string
{
    $fromEnv = getenv('DEPLOY_WEB_TOKEN');
    if ($fromEnv !== false && $fromEnv !== '') {
        return $fromEnv;
    }

    if (function_exists('env')) {
        $laravelEnv = env('DEPLOY_WEB_TOKEN');
        if (is_string($laravelEnv) && $laravelEnv !== '') {
            return $laravelEnv;
        }
    }

    $envPath = realpath(__DIR__.'/../.env');
    if (! $envPath) {
        return null;
    }

    return parseEnvValue($envPath, 'DEPLOY_WEB_TOKEN');
}

function parseEnvValue(string $envFile, string $key): ?string
{
    $handle = fopen($envFile, 'r');
    if (! $handle) {
        return null;
    }

    $value = null;
    while (($line = fgets($handle)) !== false) {
        $line = trim($line);
        if ($line === '' || str_starts_with($line, '#')) {
            continue;
        }

        [$candidateKey, $candidateValue] = array_pad(explode('=', $line, 2), 2, null);
        if ($candidateKey === null || $candidateValue === null) {
            continue;
        }

        $candidateKey = trim($candidateKey);
        if ($candidateKey !== $key) {
            continue;
        }

        $candidateValue = trim($candidateValue);
        if ($candidateValue === '') {
            $value = '';
            break;
        }

        if ((str_starts_with($candidateValue, '"') && str_ends_with($candidateValue, '"')) ||
            (str_starts_with($candidateValue, "'") && str_ends_with($candidateValue, "'"))) {
            $candidateValue = substr($candidateValue, 1, -1);
        }

        $value = stripcslashes($candidateValue);
        break;
    }

    fclose($handle);

    return $value;
}

function buildCommandGroups(): array
{
    return [
        [
            'title' => 'Backend deployment (run inside backend/)',
            'description' => 'Execute these commands before packaging the Laravel backend for upload.',
            'commands' => [
                [
                    'label' => 'Install Composer dependencies',
                    'path' => 'backend',
                    'command' => 'composer install --no-dev --optimize-autoloader',
                    'notes' => 'Creates the vendor/ directory with optimized autoloading for production.',
                ],
                [
                    'label' => 'Generate application key',
                    'path' => 'backend',
                    'command' => 'php artisan key:generate --force',
                    'notes' => 'Safe to rerun; keeps APP_KEY present when deploying to a fresh environment.',
                ],
                [
                    'label' => 'Run database migrations',
                    'path' => 'backend',
                    'command' => 'php artisan migrate --force',
                    'notes' => 'Applies schema updates; --force allows running outside interactive shells.',
                ],
                [
                    'label' => 'Cache configuration',
                    'path' => 'backend',
                    'command' => 'php artisan config:cache',
                    'notes' => 'Speeds up config loading and ensures new env values are applied.',
                ],
                [
                    'label' => 'Cache routes',
                    'path' => 'backend',
                    'command' => 'php artisan route:cache',
                    'notes' => 'Improves route resolution performance.',
                ],
                [
                    'label' => 'Cache views',
                    'path' => 'backend',
                    'command' => 'php artisan view:cache',
                    'notes' => 'Pre-compiles Blade templates to reduce runtime latency.',
                ],
                [
                    'label' => 'Install backend Node dependencies',
                    'path' => 'backend',
                    'command' => 'npm ci',
                    'notes' => 'Ensures the admin panel build uses a clean, lockfile-driven dependency set.',
                ],
                [
                    'label' => 'Build backend assets',
                    'path' => 'backend',
                    'command' => 'npm run build',
                    'notes' => 'Produces public/build/ for the Laravel admin UI.',
                ],
                [
                    'label' => 'Trigger scheduled tasks (optional warmup)',
                    'path' => 'backend',
                    'command' => 'php artisan schedule:run',
                    'notes' => 'Optional; useful to run queued cleanups after deployment.',
                ],
            ],
        ],
        [
            'title' => 'Frontend build (run inside frontend/)',
            'description' => 'Build the React frontend bundle before uploading to static hosting.',
            'commands' => [
                [
                    'label' => 'Install frontend dependencies',
                    'path' => 'frontend',
                    'command' => 'npm ci',
                    'notes' => 'Uses package-lock.json for deterministic installs.',
                ],
                [
                    'label' => 'Create production build',
                    'path' => 'frontend',
                    'command' => 'npm run build',
                    'notes' => 'Outputs the optimized site into frontend/dist/.',
                ],
            ],
        ],
        [
            'title' => 'Production maintenance (after uploading)',
            'description' => 'Commands to hand to hosting support once the site is live and code changes are deployed.',
            'commands' => [
                [
                    'label' => 'Restart queue workers',
                    'path' => 'backend',
                    'command' => 'php artisan queue:restart',
                    'notes' => 'Reloads queue workers so they pick up new code after a release.',
                ],
                [
                    'label' => 'Validate environment & refresh caches',
                    'path' => 'project root',
                    'command' => 'php deployment/production_update.php',
                    'notes' => 'Runs environment checks, pending migrations, and cache refresh in one step.',
                ],
            ],
        ],
    ];
}

function renderErrorPage(string $message): string
{
    return renderLayout('<p class="error">'.htmlspecialchars($message, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8').'</p>');
}

function renderHtml(array $commandGroups): string
{
    $sections = '';
    foreach ($commandGroups as $group) {
        $rows = '';
        foreach ($group['commands'] as $command) {
            $rows .= sprintf(
                "<tr><td>%s</td><td><code>%s</code></td><td><code>%s</code></td><td>%s</td></tr>",
                htmlspecialchars($command['label'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'),
                htmlspecialchars($command['path'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'),
                htmlspecialchars($command['command'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'),
                htmlspecialchars($command['notes'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8')
            );
        }

        $sections .= sprintf(
            '<section><h2>%s</h2><p>%s</p><table><thead><tr><th>Step</th><th>Run From</th><th>Command</th><th>Notes</th></tr></thead><tbody>%s</tbody></table></section>',
            htmlspecialchars($group['title'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'),
            htmlspecialchars($group['description'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'),
            $rows
        );
    }

    $body = '<h1>Deployment Command Checklist</h1>'
        .'<p>Run these commands on a machine with shell access. Provide this list to hosting support if you cannot execute them yourself.</p>'
        .'<p>Append <code>&format=json</code> to this URL to retrieve the data as JSON.</p>'
        .$sections;

    return renderLayout($body);
}

function renderLayout(string $body): string
{
    $styles = 'body{font-family:system-ui, -apple-system, "Segoe UI", sans-serif;background:#0f172a;color:#e2e8f0;margin:0;padding:2rem;}'
        .'main{max-width:960px;margin:0 auto;background:#111c35;padding:2.5rem;border-radius:1.5rem;box-shadow:0 20px 60px rgba(15,23,42,0.35);border:1px solid rgba(59,130,246,0.3);}'
        .'h1{margin-top:0;color:#60a5fa;}'
        .'h2{color:#c7d2fe;margin-top:2rem;}'
        .'table{width:100%;border-collapse:collapse;margin-top:1rem;}'
        .'thead th{background:rgba(148,163,184,0.18);text-align:left;padding:0.75rem;border-bottom:1px solid rgba(148,163,184,0.25);}'
        .'tbody td{padding:0.75rem;border-bottom:1px solid rgba(148,163,184,0.15);vertical-align:top;}'
        .'code{background:rgba(148,163,184,0.18);padding:0.15rem 0.35rem;border-radius:0.35rem;}'
        .'section{margin-top:2.5rem;}'
        .'p{line-height:1.6;}'
        .'.error{color:#fecaca;font-weight:600;}';

    return '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Deployment Command Checklist</title><style>'
        .$styles
        .'</style></head><body><main>'
        .$body
        .'</main></body></html>';
}
