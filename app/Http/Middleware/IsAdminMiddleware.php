<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is not logged in and if not redirect them to the login page with an error message
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to access this page');
        }
        // Check if the user is an admin and if not redirect them to the home page with an error message
        if (auth()->user()->is_admin !== 1) {
            return redirect()->route('home')->with('error', 'You do not have permission to access this page');
        }
        return $next($request);
    }
}
