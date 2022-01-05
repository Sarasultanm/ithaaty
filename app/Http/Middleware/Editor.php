<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Editor
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

        if(\Auth::check()){
            if (\Auth::user()->roles == 'editor') {
                return $next($request);
            }
        }else{
            return redirect('/');
        }


        // if (\Auth::user()->roles == 'editor') {
        //   return $next($request);
        // }

        // return redirect('/');

        // return $next($request);
    }
}
