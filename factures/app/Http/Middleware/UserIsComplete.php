<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserIsComplete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($user->is_complete){
            return $next($request);
        }
        return redirect(route('users.register'));
    }
}
