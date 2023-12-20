<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle($request, Closure $next)
    // {
    //     if (auth()->user() && auth()->user()->role == 'admin') {
    //         return $next($request);
    //     }

    //     return redirect('/home')->with('error', 'You do not have permission to access this page.');
    // }
    public function handle(Request $request, Closure $next): Response
    {

       if(Auth::check()){

        if(Auth::user()->role == '1'){

            return $next($request);
        }
        else{
           return redirect('/home')->with('message', 'your na not admin');
        }

       }
       else{
        return redirect('/login')->with('message', 'pless login first');
     }
    }


}
