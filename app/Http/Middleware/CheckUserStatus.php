<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // In the middleware file
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->is_disabled) {
            auth()->logout();
            return redirect('/login')->with('error', 'Your account has been disabled. Contact the administrator.');
        }

        return $next($request);
    }
}
