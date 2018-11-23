<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Articulo;

Route::get('/', function () {
	//return view('index');
    return view('welcome');
});

Route::get('/login', function () {
	return view('login');
    //return view('welcome');
})->name('login');

/*
Route::get('articulos',function(){
   $articulos = Articulo::orderby('nombre_art')->get()->toarray();
	return view('articulos',['articulos' => $articulos]);
})->name('articulo');
*/

Route::get('articulos/{id?}',function($id = -1){
    if ($id > 0){
        $edit_articulo = Articulo::where('id_art','=',$id)->get();
        $articulos = Articulo::orderby('nombre_art')->get()->toarray();
        return view('articulos',['articulos' => $articulos, 'edit_articulo' => $edit_articulo]);
    }else{
        $articulos = Articulo::orderby('nombre_art')->get()->toarray();
        return view('articulos',['articulos' => $articulos]);
    }
 })->name('articulo')->where('id','[0-9]+');

Route::post('/processart', 'ArticuloController@valArt')->middleware('checkart');


Route::post('/valuser','LoginController@valUser')->middleware('checklogin');
