<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class SQLI
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $payload = json_encode($request->all());

        $patterns = [
            "' OR '1'='1",
            "UNION SELECT",
            "--",
            "DROP TABLE"
        ];

        foreach ($patterns as $pattern) {

            if (stripos($payload, $pattern) !== false) {

                Log::alert(
                    'SQLI_PATTERN_DETECTED ip=' .
                    $request->ip() .
                    ' pattern=' . $pattern
                );
            }
        }

        return $next($request);
    }
}