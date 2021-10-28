<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;


class UserController extends Controller
{
    //Utilizar para formulario de usuarios
    public function userform(){
        return view('usuarios.userform');
    }

    //Para guardar los usuarios
    public function save(Request $request){

        $validdator = $this->validate($request,[
            'nombre'=> 'required|string|max:255',
            'email'=> 'required|string|max:255|email|unique:usuarios'
        ]);


        $userdata = request()->except('_token');
        Usuario::insert($userdata);

        return back()->with('usuarioGuardado','Usuario guardado');
    }
}
