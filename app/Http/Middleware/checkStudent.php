<?php

namespace College\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkStudent
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

        if(Auth::user()->role_id !== 3){

            abort(403, 'unauthorized Access');
        }


        return $next($request);
    }
}
