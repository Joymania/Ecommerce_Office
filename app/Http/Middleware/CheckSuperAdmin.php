<?php

namespace App\Http\Middleware;

use App\Model\Admin;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckSuperAdmin
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
        $admin = Admin::find(Auth::id());
    
        if($admin->role == 1){
            return $next($request);
        }
        else return redirect('admin/dashboard')->with('status','Unauthorized action!');
    }
}