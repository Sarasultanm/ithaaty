<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Administrator
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
        // if (\Auth::user()->roles == 'admin') {
        //   return $next($request);
        // }

        // return redirect('/');


        if(\Auth::check()){
            if (\Auth::user()->roles == 'admin') {
                return $next($request);
            }
        }else{
            return redirect('/');
        }
    }
}
