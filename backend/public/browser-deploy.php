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

if (! function_exists('str_contains')) {
    function str_contains(string $haystack, string $needle): bool
    {
        return $needle === '' || strpos($haystack, $needle) !== false;
    }
}

set_time_limit(0);
header('Expires: Thu, 01 Jan 1970 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');

$baseDir = realpath(__DIR__.'/../..') ?: (__DIR__.'/../..');
$backendDir = realpath(__DIR__.'/..') ?: (__DIR__.'/..');
$frontendDir = realpath($baseDir.'/frontend') ?: ($baseDir.'/frontend');

$manualInput = [
    'composer' => gatherBinaryInput('composer_binary'),
    'npm' => gatherBinaryInput('npm_binary'),
];

$manualOverrides = array_filter($manualInput, static fn ($value) => $value !== null && $value !== '');

[$binaryOverrides, $binaryMeta] = resolveBinaryOverrides($manualOverrides);

$commandSets = getCommandSets($backendDir, $frontendDir, $baseDir);

$result = null;
$error = null;
$target = $_POST['target'] ?? ($_GET['target'] ?? null);

if ($target !== null) {
    $target = strtolower(trim((string) $target));
    if (! isset($commandSets[$target])) {
        $error = sprintf('Unknown target "%s".', htmlspecialchars($target, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'));
    } else {
        $result = runCommandSet($commandSets[$target], $binaryOverrides);
    }
}

renderPage($commandSets, $result, $error, $manualInput, $binaryMeta);

function getCommandSets(string $backendDir, string $frontendDir, string $baseDir): array
{
    return [
        'backend' => [
            'title' => 'Run backend deployment commands',
            'description' => 'Executes composer, artisan, and npm steps inside the backend directory.',
            'commands' => [
                [
                    'label' => 'Install Composer dependencies',
                    'cwd' => $backendDir,
                    'command' => ['composer', 'install', '--no-dev', '--optimize-autoloader'],
                ],
                [
                    'label' => 'Generate application key',
                    'cwd' => $backendDir,
                    'command' => ['php', 'artisan', 'key:generate', '--force'],
                ],
                [
                    'label' => 'Run database migrations',
                    'cwd' => $backendDir,
                    'command' => ['php', 'artisan', 'migrate', '--force'],
                ],
                [
                    'label' => 'Cache configuration',
                    'cwd' => $backendDir,
                    'command' => ['php', 'artisan', 'config:cache'],
                ],
                [
                    'label' => 'Cache routes',
                    'cwd' => $backendDir,
                    'command' => ['php', 'artisan', 'route:cache'],
                ],
                [
                    'label' => 'Cache views',
                    'cwd' => $backendDir,
                    'command' => ['php', 'artisan', 'view:cache'],
                ],
                [
                    'label' => 'Install backend Node dependencies',
                    'cwd' => $backendDir,
                    'command' => ['npm', 'ci'],
                ],
                [
                    'label' => 'Build backend assets',
                    'cwd' => $backendDir,
                    'command' => ['npm', 'run', 'build'],
                ],
                [
                    'label' => 'Trigger scheduled tasks (optional)',
                    'cwd' => $backendDir,
                    'command' => ['php', 'artisan', 'schedule:run'],
                ],
            ],
        ],
        'frontend' => [
            'title' => 'Run frontend build commands',
            'description' => 'Installs dependencies and builds the React frontend bundle.',
            'commands' => [
                [
                    'label' => 'Install frontend dependencies',
                    'cwd' => $frontendDir,
                    'command' => ['npm', 'ci'],
                ],
                [
                    'label' => 'Create production build',
                    'cwd' => $frontendDir,
                    'command' => ['npm', 'run', 'build'],
                ],
            ],
        ],
        'maintenance' => [
            'title' => 'Run post-deployment maintenance tasks',
            'description' => 'Helpful once code is uploaded and you need to refresh caches or restart workers.',
            'commands' => [
                [
                    'label' => 'Restart queue workers',
                    'cwd' => $backendDir,
                    'command' => ['php', 'artisan', 'queue:restart'],
                ],
                [
                    'label' => 'Validate environment & refresh caches',
                    'cwd' => $baseDir,
                    'command' => ['php', 'deployment/production_update.php'],
                ],
            ],
        ],
    ];
}

function runCommandSet(array $set, array $binaryOverrides): array
{
    $results = [];
    foreach ($set['commands'] as $entry) {
        [$preparedCommand, $prepareError] = prepareCommand($entry['command'], $binaryOverrides);

        if ($prepareError !== null) {
            $results[] = [
                'label' => $entry['label'],
                'command' => implode(' ', array_map('escapeForDisplay', $entry['command'])),
                'cwd' => $entry['cwd'] ?? null,
                'exit_code' => 127,
                'stdout' => '',
                'stderr' => $prepareError,
            ];
            break;
        }

        $results[] = runCommand(
            $entry['label'],
            $preparedCommand,
            $entry['cwd'] ?? null
        );

        $last = end($results);
        if ($last['exit_code'] !== 0) {
            break;
        }
    }

    return [
        'set' => $set,
        'results' => $results,
    ];
}

function runCommand(string $label, array $command, ?string $cwd = null): array
{
    $descriptorSpec = [
        0 => ['pipe', 'r'],
        1 => ['pipe', 'w'],
        2 => ['pipe', 'w'],
    ];

    $commandString = implode(' ', array_map('escapeForDisplay', $command));

    $process = @proc_open($command, $descriptorSpec, $pipes, $cwd ?: null);
    if (! is_resource($process)) {
        return [
            'label' => $label,
            'command' => $commandString,
            'cwd' => $cwd,
            'exit_code' => -1,
            'stdout' => '',
            'stderr' => 'Failed to start process. Check PHP proc_* permissions.',
        ];
    }

    fclose($pipes[0]);
    $stdout = stream_get_contents($pipes[1]) ?: '';
    fclose($pipes[1]);
    $stderr = stream_get_contents($pipes[2]) ?: '';
    fclose($pipes[2]);

    $status = proc_close($process);

    return [
        'label' => $label,
        'command' => $commandString,
        'cwd' => $cwd,
        'exit_code' => $status,
        'stdout' => $stdout,
        'stderr' => $stderr,
    ];
}

function escapeForDisplay(string $value): string
{
    if (preg_match('/\s/', $value) || $value === '') {
        return escapeshellarg($value);
    }

    return $value;
}

function prepareCommand(array $command, array $overrides): array
{
    if ($command === []) {
        return [$command, null];
    }

    $exe = $command[0];
    if (isset($overrides[$exe]) && $overrides[$exe] !== '') {
        $command[0] = $overrides[$exe];
        if (! executableExists($command[0])) {
            return [null, sprintf('Configured path "%s" for "%s" is not executable. Check the path or permissions.', $command[0], $exe)];
        }
        return [$command, null];
    }

    if (executableExists($exe)) {
        return [$command, null];
    }

    $hint = sprintf(
        'Executable "%s" was not found in PATH. Install it on the server or set an override by defining the %s environment variable.',
        $exe,
        strtoupper($exe)."_BINARY"
    );

    return [null, $hint];
}

function executableExists(string $binary): bool
{
    if ($binary === '') {
        return false;
    }

    if (str_contains($binary, DIRECTORY_SEPARATOR) && @is_file($binary) && @is_executable($binary)) {
        return true;
    }

    $paths = explode(PATH_SEPARATOR, getenv('PATH') ?: '');
    $extensions = [''];

    if (PHP_OS_FAMILY === 'Windows') {
        $pathExt = getenv('PATHEXT') ?: '.EXE;.BAT;.CMD';
        $extensions = array_merge($extensions, array_map('strtolower', explode(';', $pathExt)));
    }

    foreach ($paths as $path) {
        $path = rtrim($path, DIRECTORY_SEPARATOR);
        if ($path === '') {
            continue;
        }

        foreach ($extensions as $extension) {
            $candidate = $path.DIRECTORY_SEPARATOR.$binary.$extension;
            if (@is_file($candidate) && @is_executable($candidate)) {
                return true;
            }
        }
    }

    return false;
}

function resolveBinaryOverrides(array $manualOverrides): array
{
    $overrides = ['php' => PHP_BINARY];
    $meta = [
        'php' => [
            'value' => PHP_BINARY,
            'source' => 'auto',
            'candidates' => [],
        ],
    ];

    foreach (['composer', 'npm'] as $binary) {
        [$guessed, $candidates] = guessBinaryPath($binary);

        $value = $manualOverrides[$binary] ?? null;
        $source = $value !== null ? 'manual' : null;

        if ($value === null) {
            $envValue = getenv(strtoupper($binary).'_BINARY') ?: null;
            if ($envValue !== null && trim((string) $envValue) !== '') {
                $value = trim((string) $envValue);
                $source = 'environment';
            }
        }

        if ($value === null && $guessed !== null) {
            $value = $guessed;
            $source = 'guessed';
        }

        if ($value !== null && $value !== '') {
            $overrides[$binary] = $value;
        }

        $meta[$binary] = [
            'value' => $value !== '' ? $value : null,
            'source' => $source,
            'candidates' => $candidates,
        ];
    }

    return [$overrides, $meta];
}

function guessBinaryPath(string $binary): array
{
    $candidates = [];

    if ($binary === 'composer') {
        $candidates = [
            '/opt/cpanel/composer/bin/composer',
            '/opt/cpanel/ea-php82/root/usr/bin/composer',
            '/opt/cpanel/ea-php83/root/usr/bin/composer',
            '/opt/cpanel/ea-php81/root/usr/bin/composer',
            '/usr/local/bin/composer',
            '/usr/bin/composer',
        ];
    } elseif ($binary === 'npm') {
        $candidates = [
            '/opt/cpanel/ea-nodejs18/bin/npm',
            '/opt/cpanel/ea-nodejs20/bin/npm',
            '/opt/cpanel/ea-nodejs16/bin/npm',
            '/usr/local/bin/npm',
            '/usr/bin/npm',
        ];
    }

    foreach ($candidates as $path) {
        if (@is_file($path) && @is_executable($path)) {
            return [$path, $candidates];
        }
    }

    return [null, $candidates];
}

function renderPage(array $commandSets, ?array $result, ?string $error, array $manualInput, array $binaryMeta): void
{
    $title = 'Browser Deployment Runner';
    $styles = getStyles();

    echo '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8">'
        .'<meta name="viewport" content="width=device-width, initial-scale=1.0">'
        .'<title>'.htmlspecialchars($title, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8').'</title>'
        .'<style>'.$styles.'</style>'
        .'</head><body><main>';    

    echo '<h1>'.htmlspecialchars($title, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8').'</h1>';
    echo '<p>This script executes deployment commands from the browser. Use with caution in production environments. '
        .'If a binary is missing, set an override like <code>COMPOSER_BINARY=/opt/cpanel/ea-php82/root/usr/bin/composer</code> in the PHP environment.</p>';

    if ($error !== null) {
        echo '<div class="alert alert-error">'.$error.'</div>';
    }

    renderForms($commandSets, $manualInput, $binaryMeta);

    if ($result !== null) {
        renderResults($result);
    }

    echo '</main></body></html>';
}

function getStyles(): string
{
    return 'body{font-family:system-ui,-apple-system,"Segoe UI",sans-serif;background:#0f172a;color:#e2e8f0;margin:0;padding:2rem;}'
        .'main{max-width:960px;margin:0 auto;background:#111c35;padding:2.5rem;border-radius:1.5rem;box-shadow:0 20px 60px rgba(15,23,42,0.35);border:1px solid rgba(59,130,246,0.3);}'
        .'h1{margin-top:0;color:#60a5fa;}'
        .'.group{margin-top:2rem;padding:1.5rem;border-radius:1rem;background:rgba(59,130,246,0.12);border:1px solid rgba(59,130,246,0.25);}'
        .'.group h2{margin-top:0;color:#c7d2fe;}'
        .'.group p{margin-bottom:1rem;}'
        .'.command-form{display:flex;flex-direction:column;gap:0.75rem;margin-bottom:1.25rem;}'
        .'.binary-label{font-size:0.85rem;color:#cbd5f5;}'
        .'.binary-input{padding:0.55rem 0.75rem;border-radius:0.6rem;border:1px solid rgba(148,163,184,0.3);background:rgba(30,41,59,0.6);color:#e2e8f0;}'
        .'.binary-input:focus{outline:none;border-color:rgba(59,130,246,0.7);box-shadow:0 0 0 1px rgba(59,130,246,0.3);}'
        .'.binary-meta{margin:0;font-size:0.85rem;color:#94a3b8;}'
        .'.actions{margin-top:0.5rem;}'
        .'button{background:#38bdf8;color:#0f172a;font-weight:600;padding:0.65rem 1.25rem;border:none;border-radius:0.6rem;cursor:pointer;}'
        .'button:hover{background:#0ea5e9;color:#012a44;}'
        .'.alert{margin-top:1rem;padding:1rem;border-radius:0.75rem;}'
        .'.alert-error{background:rgba(251,113,133,0.1);border:1px solid rgba(251,113,133,0.35);color:#fecaca;}'
        .'.results{margin-top:2.5rem;}'
        .'.result{margin-top:1.5rem;padding:1.25rem;border-radius:1rem;background:rgba(148,163,184,0.12);border:1px solid rgba(148,163,184,0.25);}'
        .'.result h3{margin-top:0;color:#e2e8f0;}'
        .'.meta{font-size:0.95rem;margin-bottom:0.75rem;color:#94a3b8;}'
        .'pre{background:#0b1220;padding:1rem;border-radius:0.75rem;overflow:auto;font-size:0.9rem;line-height:1.5;}'
        .'.error-exit{color:#fecaca;}'
        .'.success-exit{color:#86efac;}'
        .'.warning{color:#fcd34d;}'
        .'details{margin-top:1rem;}'
        .'summary{cursor:pointer;}'
        .'code{background:rgba(148,163,184,0.2);padding:0.15rem 0.3rem;border-radius:0.35rem;}';
}

function renderForms(array $commandSets, array $manualInput, array $binaryMeta): void
{
    foreach ($commandSets as $key => $set) {
        echo '<div class="group">';
        echo '<h2>'.htmlspecialchars($set['title'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8').'</h2>';
        echo '<p>'.htmlspecialchars($set['description'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8').'</p>';

        echo '<form method="post" class="command-form">';

        $composerValue = $manualInput['composer'] ?? ($binaryMeta['composer']['value'] ?? '');
        $composerSource = $manualInput['composer'] !== null ? 'manual' : ($binaryMeta['composer']['source'] ?? null);
        echo '<label class="binary-label" for="composer-'.$key.'">Composer binary</label>';
        echo '<input class="binary-input" type="text" name="composer_binary" id="composer-'.$key.'" value="'
            .htmlspecialchars($composerValue ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8').'" placeholder="/path/to/composer">';
        echo renderBinaryMeta('composer', $binaryMeta, $composerSource);

        $npmValue = $manualInput['npm'] ?? ($binaryMeta['npm']['value'] ?? '');
        $npmSource = $manualInput['npm'] !== null ? 'manual' : ($binaryMeta['npm']['source'] ?? null);
        echo '<label class="binary-label" for="npm-'.$key.'">NPM binary</label>';
        echo '<input class="binary-input" type="text" name="npm_binary" id="npm-'.$key.'" value="'
            .htmlspecialchars($npmValue ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8').'" placeholder="/path/to/npm">';
        echo renderBinaryMeta('npm', $binaryMeta, $npmSource);

        echo '<div class="actions">'
            .'<button type="submit" name="target" value="'.htmlspecialchars($key, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8').'">Run '
            .htmlspecialchars($key, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8').' commands</button>'
            .'</div>';

        echo '</form>';

        echo '<details><summary>Show command list</summary><ul>';
        foreach ($set['commands'] as $entry) {
            $commandString = implode(' ', array_map('escapeForDisplay', $entry['command']));
            $cwd = $entry['cwd'] ?? null;
            $pathLabel = $cwd ? ('Run from: '.htmlspecialchars($cwd, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8')) : 'Run from current directory';
            echo '<li><strong>'.htmlspecialchars($entry['label'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8').'</strong><br>'
                .'<code>'.$commandString.'</code><br>'
                .'<span class="meta">'.$pathLabel.'</span></li>';
        }
        echo '</ul></details>';
        echo '</div>';
    }
}

function renderBinaryMeta(string $binary, array $meta, ?string $overrideSource): string
{
    $info = $meta[$binary] ?? ['value' => null, 'source' => null, 'candidates' => []];
    $value = $info['value'] ?? null;
    $source = $overrideSource ?? ($info['source'] ?? null);
    $candidates = $info['candidates'] ?? [];

    if (! $value) {
        $suggestions = '';
        if ($candidates !== []) {
            $formatted = [];
            foreach ($candidates as $candidate) {
                $formatted[] = '<code>'.htmlspecialchars($candidate, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8').'</code>';
            }
            $suggestions = ' Common locations: '.implode(', ', $formatted).'.';
        }

        return '<p class="meta warning">No '.htmlspecialchars($binary, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8')
            .' binary detected. Provide a full path above.'. $suggestions .'</p>';
    }

    $label = match ($source) {
        'manual' => 'manual override',
        'environment' => 'environment variable',
        'guessed' => 'auto-detected',
        default => 'default',
    };

    return '<p class="meta binary-meta">Using <code>'.htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8')
        .'</code> ('.$label.')</p>';
}

function gatherBinaryInput(string $key): ?string
{
    $value = $_POST[$key] ?? $_GET[$key] ?? null;
    if ($value === null) {
        return null;
    }

    $value = trim((string) $value);

    return $value === '' ? null : $value;
}

function renderResults(array $result): void
{
    $set = $result['set'];
    $outputs = $result['results'];

    echo '<section class="results">';
    echo '<h2>Execution results &mdash; '.htmlspecialchars($set['title'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8').'</h2>';

    foreach ($outputs as $index => $entry) {
        $exitClass = $entry['exit_code'] === 0 ? 'success-exit' : 'error-exit';
        $cwdDisplay = $entry['cwd'] ? $entry['cwd'] : 'current directory';

        echo '<article class="result">';
        echo '<h3>'.htmlspecialchars($entry['label'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8').'</h3>';
        echo '<div class="meta">Command: <code>'.htmlspecialchars($entry['command'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8').'</code><br>';
        echo 'Working directory: '.htmlspecialchars($cwdDisplay, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8').'<br>';
        echo 'Exit code: <span class="'.$exitClass.'">'.htmlspecialchars((string) $entry['exit_code'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8').'</span></div>';

        if ($entry['stdout'] !== '') {
            echo '<h4>stdout</h4><pre>'.htmlspecialchars($entry['stdout'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8').'</pre>';
        }
        if ($entry['stderr'] !== '') {
            echo '<h4>stderr</h4><pre>'.htmlspecialchars($entry['stderr'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8').'</pre>';
        }

        echo '</article>';

        if ($entry['exit_code'] !== 0) {
            echo '<div class="alert alert-error">Execution halted because this command returned a non-zero exit code. Fix the issue above and rerun.</div>';
            break;
        }
    }

    echo '</section>';
}
