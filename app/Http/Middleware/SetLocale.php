<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $lang = $request->segment(1);
        if (in_array($lang, config('app.available_locales')))
            app()->setLocale($lang);
        else {
            app()->setLocale(config('app.locale'));
            $lang = config('app.locale');
        }

        URL::defaults(['locale' => $lang]);

        return $next($request);
    }
}
