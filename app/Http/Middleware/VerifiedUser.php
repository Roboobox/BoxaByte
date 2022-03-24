<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifiedUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() && Auth::user()->user_verified)
        {
            return $next( $request );
        } else if (Auth::user()) {
            app('redirect')->setIntendedUrl($request->url());
            return redirect()->route('verify');
        }
        app('redirect')->setIntendedUrl($request->url());
        return redirect()->route('login');
    }
}
