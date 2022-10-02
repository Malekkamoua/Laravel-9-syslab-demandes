<?php

namespace App\Http\Middleware;

use Closure;

class MustHaveRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {

        if((auth()->user()->hasRole($role) || auth()->user()->hasRole('admin')) ){

            return $next($request);

        } else {
            abort(403);
        }
    }
}