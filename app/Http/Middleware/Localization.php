<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1);
        if (isset($locale) && in_array($locale, config('app.locales')) ) {
            App::setLocale($locale);
            Carbon::setLocale($locale);
        }
        return $next($request);
    }
}
