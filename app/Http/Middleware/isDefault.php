<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isDefault
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
        
        if(!auth::check()){
            return redirect('/login');
        }

        if (Auth::user() &&  Auth::user()->isDefault() || Auth::user()->isAdmin()) {

            return $next($request);
        }
        return redirect('/login');
    }
}
