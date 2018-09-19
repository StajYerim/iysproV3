<?php

namespace App\Http\Middleware;

use App\Language;
use Closure;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;
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

        if(auth()->check() && !auth()->user()->isAdmin() && aid() != Request::segment(1)){
            return response()->view('errors.404', [], 404);
        }

       //Kullanıcı sayfa izin kontrolü

        //Kullanıcı sayfa izin kontrolü

        if (auth()->check() && !auth()->user()->isAdmin()) {

            session()->put("company_id",auth()->user()->id);
            session()->put("account_id",auth()->user()->memberOfAccount["id"]);
            $language = Language::where("lang_id",auth()->user()->lang_id)->first();
            App::setLocale($language["lang_code"]);
            return $next($request);
        }



        flash('Bu sayfayı ziyaret edebilmek için yetkiniz yoktur.')->error();
        return redirect()->route('login');
    }
}
