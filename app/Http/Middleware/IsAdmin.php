<?php

namespace App\Http\Middleware;

use Closure, Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   //Verificamos si el usuario es administrador
        if (Auth::user()->role == "1"):
            return $next($request);
        else:
            return redirect('/');
        endif;
    }
}
