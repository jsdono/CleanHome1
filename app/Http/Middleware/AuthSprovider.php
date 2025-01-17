<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facade\Auth;

class AuthSprovider
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next){ 
        if(Auth::user()->utype==='SVP')
        {
            return $next($request);
        }
        else{
            session()->flush();
            return redirect()->route('login');
        }
    }
}
