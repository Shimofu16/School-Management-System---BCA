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
    public function handle($request, Closure $next, $guards = null)
    {
        $guards = empty($guards) ? [null]: $guards;
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check() && Auth::user()->roles == "Admin") {
                return redirect()->route('admin.dashboard.index');
            }elseif (Auth::guard($guard)->check() && Auth::user()->roles == "Registrar") {
                return redirect()->route('registrar.dashboard.index');
            }elseif (Auth::guard($guard)->check() && Auth::user()->roles == "Teacher") {
                return redirect()->route('teacher.dashboard.index');
            }elseif (Auth::guard($guard)->check() && Auth::user()->roles == "Student") {
                return redirect()->route('student.dashboard.index');
            }
        }
        return $next($request);
    }
}
