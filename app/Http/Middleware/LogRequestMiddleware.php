<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class LogRequestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $startTime = microtime(true);
        $response = $next($request);
        $endTime = microtime(true);
        if(env('REQUEST_LOGGING')){
            DB::table('request_logs')->insert([
                'method' => $request->method(),
                'url' => $request->fullUrl(),
                'ip_address' => $request->ip(),
                'response_time_ms' => round(($endTime - $startTime) * 1000, 2),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
                return $response;

    }
}
