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
    // Check if the user is an admin and if not redirect them to the home page with an error message
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->admin === 1) {
            return $next($request);
        }

        return redirect()->route('home')->with('error', 'You do not have permission to access this page');
    }
}
