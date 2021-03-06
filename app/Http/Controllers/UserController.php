<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;


class UserController extends Controller
{

    //Listado para los usuarios
    public function list(){
        $data['users'] = Usuario::paginate(3);

        return view('usuarios.list', $data);
        
    }

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

    //Para que podamos eliminar los usuarios
    public function delete($id){
        Usuario::destroy($id);

        return back()->with('usuarioEliminado','Usuario eliminado');

    }

    //Formulario para poder editar los usuarios
    public function editform($id){
        $usuario = Usuario::findOrFail($id);

        return view('usuarios.editform', compact('usuario'));
    }
    

}
