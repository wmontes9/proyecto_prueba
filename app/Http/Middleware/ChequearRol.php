<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ChequearRol
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
        foreach(Auth::user()->grupos->all() as $rol){  
            if($rol->id_grupo == $request->session()->get('rolActual')){                
                return $next($request);
            }            
        }
        Auth::logout();
        return redirect()->route('login');
     
    }    
}
