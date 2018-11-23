<?php

namespace App\Http\Middleware;

use Closure;

class ArticuloMiddleware
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


        if ($request->has('cancelar')){
            return redirect()->route('articulo');
        }

        $validar = $request->validate([
            'nombre' => 'required|max:100|regex:/[a-zA-Z0-9\/]$/|unique:articulo,nombre_art',
            'cantidad' => 'required|numeric',
            'existencia' => 'required|numeric',
            'descripcion' => 'required|max:255',
        ]);


        return $next($request);
    }
}
