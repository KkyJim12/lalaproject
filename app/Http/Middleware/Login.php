<?php

namespace App\Http\Middleware;

use Closure;

class Login
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

        if (session('uesr_log') == null) {
          return redirect()->route('login')->with('error','กรุณาล๊อกอินก่อน');
        }

        return $next($request);
    }
}
