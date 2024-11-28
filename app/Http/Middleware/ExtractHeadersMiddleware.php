<?php

namespace App\Http\Middleware;

use App\Exceptions\HeaderException;
use Closure;
use GuzzleHttp\Psr7\Header;
use Illuminate\Http\Request;

class ExtractHeadersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $fechaActua = $request->header('X-Current-Date');

        $request->merge([
            'fechaActua' => $fechaActua
        ]);

        return $next($request);
    }
}
