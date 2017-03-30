<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class DoctorMiddleware
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
        if(Sentinel::check() && $hasRole = Sentinel::getUser()->roles()->first()){
            if($hasRole->slug == 'doctor'){
                return $next($request);
            }else{
                return redirect('/');
            }
        }
        else
            return redirect('/');
    }
}
