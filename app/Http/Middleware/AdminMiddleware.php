<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Allow all authenticated users to access the dashboard
        if (Auth::check()) {
            return $next($request);
        }

        return redirect('/');
    }
}
