<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $locale = $request->route()->parameter('lang') ?? 'ru';

        if ($locale && in_array($locale, array_keys(config('nova-language-switch.supported-languages')))) {
            App::setLocale($locale);
        }

        return $next($request);
    }
}
