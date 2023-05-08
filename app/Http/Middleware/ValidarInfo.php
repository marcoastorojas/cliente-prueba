<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ValidarInfo
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
        if (auth()->user()->estado == 0) {
            // cerramos su sesión
            Auth::guard()->logout();
            // // invalidamos su sesión
            $request->session()->invalidate();
            // redireccionamos a donde queremos
            return redirect('/datos-invalidos');
        } else {
            return $next($request);
        }
    }
}
