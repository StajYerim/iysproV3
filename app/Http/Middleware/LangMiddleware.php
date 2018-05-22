<?php

namespace App\Http\Middleware;

use App\Language;
use Closure;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;

class LangMiddleware
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
        // Eğer sessionda bir dil mevcut ise o dili sistem yapısına uygula.
        if ( $langi = Session::get('lang') ){

            app()->setLocale($langi);
        }

        return $next($request);
    }
}
