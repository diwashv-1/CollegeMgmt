<?php

namespace College\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkTeacher
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

        if(Auth::user()->role_id !== 2 ){
            abort(403, 'Unauthorized Access');
        }

        return $next($request);
    }
}
