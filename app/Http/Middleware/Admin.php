<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if(!\Auth::guest() && \Auth::user()->role=='admin'){
            return $next($request);
        } else {
            return redirect(route('vpanel.Login'))->with('error','You are not authorized to access');
        }

        return redirect(route('vpanel.Login'));
    }
}
