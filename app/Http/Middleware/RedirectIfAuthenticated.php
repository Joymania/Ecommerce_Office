<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

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
    // redirect login to dashboard if user is already logged in
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if($guard == 'admin'){
                return redirect(route('admin.dashboard'));
            }
            else return redirect(route('home'));
            // return redirect(RouteServiceProvider::HOME);
        }
        return $next($request);
    }
}
