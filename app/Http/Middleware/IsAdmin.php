<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        // dd(\Auth::user()->role);
        foreach(\Auth::user()->role as $role){
            // dd($role->pivot->role_id);
            if(\Auth::check() && $role->pivot->role_id == 1)
            {
                return $next($request);
            }
        }
        return redirect()->route('trang-chu');
        // dd('ok');
        // if(\Auth::check() && \Auth::user()->role->firstWhere('id', '1') == 1)
        // {
        //     return $next($request);
        // }
        // return redirect()->route('home');
        
    }
}
