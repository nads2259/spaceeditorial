<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): Response  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowedOrigins = $this->allowedOrigins();
        $origin = $request->headers->get('Origin');

        if ($request->isMethod('OPTIONS')) {
            return $this->preflightResponse($origin, $allowedOrigins);
        }

        /** @var Response $response */
        $response = $next($request);

        $this->attachCorsHeaders($response, $origin, $allowedOrigins);

        return $response;
    }

    protected function allowedOrigins(): array
    {
        $origins = config('app.frontend_origins');

        if (is_string($origins)) {
            $origins = array_map('trim', explode(',', $origins));
        }

        if (is_array($origins)) {
            return array_filter($origins, fn ($value) => filled($value));
        }

        return [
            'http://127.0.0.1:5173',
            'http://localhost:5173',
        ];
    }

    protected function preflightResponse(?string $origin, array $allowedOrigins): Response
    {
        $response = response()->noContent(204);
        $this->attachCorsHeaders($response, $origin, $allowedOrigins);
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With');

        return $response;
    }

    protected function attachCorsHeaders(Response $response, ?string $origin, array $allowedOrigins): void
    {
        if ($origin && ($allowedOrigins === ['*'] || in_array($origin, $allowedOrigins, true))) {
            $response->headers->set('Access-Control-Allow-Origin', $origin);
            $response->headers->set('Access-Control-Allow-Credentials', 'true');
            $response->headers->set('Vary', 'Origin');
        }
    }
}
