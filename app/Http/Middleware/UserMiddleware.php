<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->role == 'user'){
            return $next($request);
        }

        // abort(404);
        // dd('You are not user acc. Change into a user account to continue.');
        return back(); // going back to your previous route // ERR_TOO_MANY_REDIRECTS (Now is error)
    }
}
