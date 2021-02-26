<?php

namespace App\Http\Middleware;

use Closure;

class RegionLevel
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
        if($request->user()->officerLevel ==2){

           abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
