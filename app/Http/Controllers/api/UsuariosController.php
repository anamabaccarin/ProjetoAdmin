<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function pegarTodos(request $request){
        $todosUsuarios = User::all();
        return response()->json($todosUsuarios,200);
    }

    public function pegarUm(request $request, $id){
        $usuario = User::find($id);
        return response()->json($usuario,200);
    }

    public function criarUm(request $request){
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->nivel_user = 1;
        $usuario->img = null;

        $usuario->save();

        return response()->json(['usuario'=> "Cadastrado com sucesso"]);

    }

    public function deletarUm(Request $request, $id){
        $usuario = User::find($id);
        $resultado = $usuario->delete();

        return response()->json(['usuario'=>"Usuario deletado com sucesso"]);
    }

    public function alterarUm(Request $request, $id){
        $usuario = User::find($id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->nivel_usuario = 1;
        $usuario->img = null;

        $usuario->save();

        return response()->json(['usuario'=> "Cadastrado com sucesso"]);

    }



}
