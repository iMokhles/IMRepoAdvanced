<?php

namespace App\Http\Middleware;

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
    public function handle($request, Closure $next, $guard = null)
    {

        // MultiAuthGuards

        switch ($guard) {
            case 'user':
                if (Auth::guard($guard)->check()) {
                    return redirect(route('user.home'));
                }
            break;
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    return redirect(route('admin.home'));
                }
            break;
            case 'web':
                if (Auth::guard($guard)->check()) {
                    return redirect('/home');
                }
            break;
            default:
                if (Auth::guard($guard)->check()) {
                    return redirect('/home');
                }
            break;
        }
        return $next($request);
    }
}
