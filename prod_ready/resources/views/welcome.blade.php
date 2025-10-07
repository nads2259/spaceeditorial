<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Space Editorial Platform</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <style>
            :root {
                color-scheme: light dark;
            }
            body {
                margin: 0;
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                font-family: 'Figtree', system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
                background: radial-gradient(circle at top, #f3f4f6, #e2e8f0);
                color: #1f2937;
            }
            .card {
                max-width: 460px;
                width: 100%;
                background: rgba(255, 255, 255, 0.92);
                border-radius: 24px;
                padding: 42px;
                box-shadow: 0 20px 45px rgba(15, 23, 42, 0.15);
                backdrop-filter: blur(8px);
                text-align: center;
            }
            h1 {
                margin: 0 0 12px;
                font-size: clamp(1.8rem, 2.8vw, 2.4rem);
                color: #0f172a;
                letter-spacing: -0.03em;
            }
            p {
                margin: 0 0 24px;
                font-size: 0.95rem;
                color: #475569;
                line-height: 1.6;
            }
            a {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 0.4rem;
                padding: 0.65rem 1.2rem;
                border-radius: 999px;
                font-weight: 600;
                font-size: 0.9rem;
                text-decoration: none;
                color: #fff;
                background: #4f46e5;
                box-shadow: 0 14px 30px rgba(79, 70, 229, 0.25);
                transition: transform 160ms ease, box-shadow 160ms ease;
            }
            a:hover {
                transform: translateY(-1px);
                box-shadow: 0 18px 35px rgba(79, 70, 229, 0.3);
            }
            .links {
                display: flex;
                flex-direction: column;
                gap: 0.75rem;
            }
            .links a.secondary {
                background: rgba(79, 70, 229, 0.08);
                color: #4338ca;
                box-shadow: none;
            }
            footer {
                margin-top: 24px;
                font-size: 0.75rem;
                color: #94a3b8;
            }
        </style>
    </head>
    <body>
        <main class="card">
            <h1>Space Editorial Platform</h1>
            <p>{{ __('This server provides the administrative console and APIs for Space Editorial. Access is restricted to authorized staff members.') }}</p>
            <div class="links">
                <a href="{{ route('login') }}">{{ __('Launch admin console') }}</a>
                <a class="secondary" href="{{ url('/docs/index.html') }}" target="_blank" rel="noreferrer noopener">{{ __('View internal handbook') }}</a>
            </div>
            <footer>&copy; {{ now()->year }} Space Editorial</footer>
        </main>
    </body>
</html>
