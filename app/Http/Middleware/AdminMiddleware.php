<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $role)
    {
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        // If the user is not an admin, redirect them to a different page (for example, login page).
        return redirect('/login')->with('error', 'You do not have permission to access this page.');

        if (Auth::check() && Auth::user()->role == $role) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
