<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; 
class Permissions
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

    // Manejo de permisos por url
    if(Auth::user()->role=="1" && kvfj(Auth::user()->permissions, Route::currentRouteName())==true):
        return $next($request);
    else:
        return redirect('/');

    endif;
    }
}
