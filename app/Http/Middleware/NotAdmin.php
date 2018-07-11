<?php

namespace App\Http\Middleware;

use App\Language;
use Closure;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class NotAdmin
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
        if (auth()->check() && !auth()->user()->isAdmin()) {

            session()->put("company_id",auth()->user()->id);
            session()->put("account_id",auth()->user()->memberOfAccount["id"]);
            $language = Language::where("lang_id",auth()->user()->lang_id)->first();
            App::setLocale($language["lang_code"]);
            return $next($request);
        }



        flash('You do not have permission to visit this page.')->error();
        return redirect()->route('login');
    }
}
