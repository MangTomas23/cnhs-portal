<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;
use Auth;

class StudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->type != 'student') {
            return Redirect::to('/');
        }
        return $next($request);
    }
}
