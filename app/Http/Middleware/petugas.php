<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class petugas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
      if( Auth::guard($guard)->check() && Auth::user()->role == 'petugas' ){
        return $next($request);
      } else {
        return redirect()->guest('/');
      }
      return $next($request);
    }
}
