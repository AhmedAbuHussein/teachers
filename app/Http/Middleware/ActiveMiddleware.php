<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ActiveMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->role == 'professor' && auth()->user()->status == "inactive"){
            
            return redirect()->route('profile.index')->with([
                "message"=> "الاكونت يحتاج الي تنشيط من ادارة الموقع",
                'icon'=> "info",
            ]);
        }
        return $next($request);
    }
}
