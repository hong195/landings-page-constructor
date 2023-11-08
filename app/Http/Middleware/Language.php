<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next): mixed
    {
        $locale = session()->get('applocale');

        if ($locale && in_array($locale, array_keys(config('nova-language-switch.supported-languages')))) {
            App::setLocale($locale);
        }

        return $next($request);
    }
}
