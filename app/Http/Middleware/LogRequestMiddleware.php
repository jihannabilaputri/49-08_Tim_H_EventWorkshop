<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

/**
 * Mencatat setiap request yang masuk ke storage/logs/laravel.log.
 */
class LogRequestMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('Request masuk', [
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'ip' => $request->ip(),
            'user_id' => $request->user()?->id,
        ]);

        return $next($request);
    }
}