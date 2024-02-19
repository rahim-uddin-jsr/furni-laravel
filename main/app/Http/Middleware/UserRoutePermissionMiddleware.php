<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserRoutePermissionMiddleware
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
        // dd(Auth::user());
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }
        if (Auth::check()) {
            return redirect('/');
        }
        return redirect('/login');
    }
}
