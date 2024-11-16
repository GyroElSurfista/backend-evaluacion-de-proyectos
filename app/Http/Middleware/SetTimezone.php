<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SetTimezone
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Establecer la zona horaria configurada en config/app.php
        Carbon::setLocale(config('app.locale'));
        date_default_timezone_set(config('app.timezone'));

        return $next($request);
    }
}