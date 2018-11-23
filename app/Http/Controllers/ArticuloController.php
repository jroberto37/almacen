<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
class ArticuloController extends Controller
{
    //
	public function valArt(Request $request){
        //return "Hola mundo";

        if($request->has('nuevoarticulo')){
            //echo $request->nombre;
            //return "Agregando nuevo articulo";
            $art = new Articulo;
            $art->nombre_art = $request->nombre;
            $art->cant_art = $request->cantidad;
            $art->exis_art = $request->existencia;
            $art->desc_art = $request->descripcion;
            $art->save();
            //return redirect()->route('articulo',["add" => "ok"]);
            return redirect()->route('articulo')->with('status','¡Se registró con éxito el artículo!');
        }


        return "error al procesar la petición";

	}

}
