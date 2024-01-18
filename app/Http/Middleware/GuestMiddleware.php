<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class GuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            // If the user is a guest, proceed to the next request
            return $next($request);
        }

        if (Auth::user()->role === 'admin') {
            // If the user is authenticated and is an admin, proceed to the next request
            return redirect('/admin/dashboard');
        }else{
            return redirect('/');
        }
        
    }
}
