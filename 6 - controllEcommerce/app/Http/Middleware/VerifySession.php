<?php

namespace App\Http\Middleware;

use Closure;

class VerifySession
{
    public function handle($request, Closure $next)
    {
        if (
            !$request->session()->has('admin') &&  !$request->session()->has('client')) {
                return redirect()->route('login');
        }
    return $next($request);
       
    }
}
