<?php

namespace App\Http\Middleware;

use Closure;

class Permission
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
            return $next($request);
        }



        flash('You do not have permission to visit this page.')->error();
        return redirect()->route('login');
    }
}
