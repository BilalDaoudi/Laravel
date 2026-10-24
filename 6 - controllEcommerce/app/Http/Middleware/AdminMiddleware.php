<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {  // Check if the authenticated user is an admin
        if ($request->session()->get('admin'))  {
            return $next($request);
        }

        // If not an admin, redirect to unauthorized page or login page
       echo"you don't have the access to this page";
    }
}
