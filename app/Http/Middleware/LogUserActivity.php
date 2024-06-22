<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\UserActivityController;

class LogUserActivity
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
        $response = $next($request);

        // Contoh logika untuk mencatat aktivitas setelah request diproses
        $controller = new UserActivityController();
        $controller->logActivity('User mengakses URL: ' . $request->url(), 'A');

        return $response;
    }
}
