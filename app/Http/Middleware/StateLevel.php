<?php

namespace App\Http\Middleware;

use Closure;

class StateLevel
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
        if($request->user()->officerLevel ==1){

           abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
