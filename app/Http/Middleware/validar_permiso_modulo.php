<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class validar_permiso_modulo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $route_code)
    {
        // echo $route_code;k


        if(Auth::user()->rol == 1){
            return $next($request);
        }
        
        // echo (Auth::user()->modulos);

        foreach (Auth::user()->modulos as $item) {
        // echo $item->modulo;

            if($item->modulo->codigo == $route_code){
                return $next($request);
            }
        }
        return response(view('nopermiss'),403);


    }
}
