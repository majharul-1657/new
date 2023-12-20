<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle($request, Closure $next)
    // {
    //     if (auth()->user() && auth()->user()->role == 'user') {
    //         return $next($request);
    //     }

    //     return redirect('/home')->with('error', 'You do not have permission to access this page.');
    // }



    public function handle(Request $request, Closure $next): Response
    {

       if(Auth::check()){

        if(Auth::user()->role == '0'){

            return $next($request);
        }
        else{
           return redirect('/')->with('message', 'your na not admin');
        }

       }
       else{
        return redirect('/login')->with('message', 'pless login first');
     }
    }
}
