<?php


namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
	public function valUser(Request $request){

		//$request->session()->reflash();
		//session_start();

    	$validar = $request->validate([

    		'email' => 'required|min:5|max:50|email',
    		'pass' => 'required|min:4|max:20|alpha_num'

    	]);
		
		/*
    	$usuario = Usuario::all();


    	foreach ($usuario as $key => $value) {
    		# code...
    		print("Clave..:" . $key ."<br/>");
    		print("Valor..:" . $value ."<br/>");
    	}
		*/
		

    	$usuario = Usuario::
    	select("id_usu")->
    	where('email_usu','=',$validar['email'])->
    	where('pass_usu', '=', $validar['pass'])->exists();

    	
    	if ($usuario){    		
    		session_start();
            session('auth',session_id());
            session('user',$usuario);
    	}else{
    		return redirect()->route('login')->withErrors("Los datos son incorrectos");
    	}

		return "<br>Validando usuario";
	}

}
