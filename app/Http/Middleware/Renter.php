<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Renter
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
        if(auth()->user()->user_role == 'renter'){
            return $next($request);
        }
        return redirect("/login")->with('error',"You don't have renter access.");
    }
}
