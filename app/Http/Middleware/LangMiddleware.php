<?php

namespace App\Http\Middleware;

use App\Language;
use Closure;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::check() &&  $language = Language::where("lang_id",auth()->user()->lang_id)->first() ){

            session()->put('lang', $language["lang_code"]);

        }

        return $next($request);
    }
}
