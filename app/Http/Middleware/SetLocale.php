<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get supported locales
        $supportedLocales = ['en', 'fr'];
        $defaultLocale = 'en';

        // Check for locale in URL segment
        $locale = $request->segment(1);

        // If locale is not in supported locales, check session or use default
        if (!in_array($locale, $supportedLocales)) {
            $locale = Session::get('locale', $defaultLocale);
        } else {
            // Store locale in session
            Session::put('locale', $locale);
        }

        // Set application locale
        App::setLocale($locale);

        return $next($request);
    }
}
