<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    // protected function redirectTo(Request $request): ?string
    // {
    //     return $request->expectsJson() ? null : route('login');
    // }
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) { return $next($request); }
        else if (Auth::guard('doctors')->check()) { return $next($request); }
        else if (Auth::guard('admins')->check()) { return $next($request); }
        return redirect('login')->withErrors('Please login first!');
    }
}
