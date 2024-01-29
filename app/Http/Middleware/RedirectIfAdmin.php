<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAdmin
{

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {

        if (Auth::check()) {
             if (Auth::user()->isAdmin()) {
                if(!$request->is('admin/*'))
                    return redirect()->route('admin.dashboard');

             } else {
                 return redirect()->route('user.dashboard');
             }
        }
        return $next($request);
    }
}
