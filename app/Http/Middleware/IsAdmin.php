<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If user is not authenticated, redirect to log in
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // If authenticated but not admin, redirect to dashboard with error
        if (auth()->user()->role !== 'admin') {
            return redirect('/dashboard')->with('error', 'You do not have admin access.');
        }

        return $next($request);
    }
}
