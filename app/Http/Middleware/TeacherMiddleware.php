<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Redirect;

class TeacherMiddleware
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
        if(Auth::user()->type != 'teacher') {
            if(Auth::user()->type != 'programhead') {
                return Redirect::to('/');
            }
        }
        return $next($request);
    }
}
