<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Users
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
        if (Auth::check())
        {
            if(Auth::user()->isUser())
            {
                return $next($request);
            }
        }
        /*return redirect('/login')->with('alert_message', "You aren't logged in!");*/
        return abort(403, "Unauthorized access! You haven't right to access this");

    }
}
