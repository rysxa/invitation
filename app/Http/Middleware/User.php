<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // if (Auth::user() && Auth::user()->role == 'user') {
        //     // dd(Auth::user()->role);
        //     return $next($request);
        // }
        // return redirect('login');
    }
}
