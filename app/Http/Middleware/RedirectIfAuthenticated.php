<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        // Check if .env file exists
        if (File::exists(base_path('.env'))) {
            return $next($request);
        }

        // Already in the wizard
        if (starts_with($request->getPathInfo(), '/install')) {
            return $next($request);
        }




        if (Auth::guard($guard)->check()) {
            // get user
            $user = auth()->user();

            // if user is admin, redirect to admin dashboard
            // if not, user dashboard
            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect($user->getDashboardRoute());
            }
        }

        return $next($request);
    }
}
