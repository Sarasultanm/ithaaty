<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;


class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
 


    protected function redirectTo($request)
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
        
    }
}
