<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class SetLocale
{
    public function handle(Request $request, Closure $next): mixed
    {
        $lang = $request->segment(1);
        if (in_array($lang, config('app.available_locales')))
            app()->setLocale($lang);
        else {
            app()->setLocale(config('app.locale'));
            $lang = config('app.locale');
        }

        URL::defaults(['locale' => $lang]);
        $request->route()->forgetParameter('locale');
        return $next($request);
    }
}
