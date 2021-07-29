<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsBanned
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
        if(Auth::user()->isBanned == 1){
            Auth::logout();
            return redirect()->route('login')->with('alert',['icon'=>'error','title'=>'You are banned by Admin!','message'=>'contact to Admin!']);
        }
        return $next($request);
    }
}
