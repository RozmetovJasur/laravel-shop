<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class SetLocale
{
    public function handle(Request $request, Closure $next): mixed
    {
        $lang = Session()->get('locale');
        if (Session()->has('locale') && array_key_exists($lang, config('app.locale_label'))) {
            App::setLocale($lang);
        } else {
            App::setLocale(config('app.locale'));
            Session::put('locale', config('app.locale'));
        }

        $lang = $request->segment(1);
        if (in_array($lang, Config::get('app.available_locales')))
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
