<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkLandlord
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
      
        if ($request->user()->account_type=='Landlord') 
        {
            return $next($request);
        }
        else
        {
            return back();
        } 
    }
}
