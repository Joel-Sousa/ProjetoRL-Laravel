<?php

namespace App\Http\Repository;

use App\Http\Validations\UsuarioValidations;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioRepository
{
    public function createUsuario(Request $request)
    {
        $error = UsuarioValidations::createRequest($request);

        if($error->erro)
            return response(compact('error'));

        $user = new User();
        $user->idRole = 2;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $cliente = new Usuario();
        $cliente->nome = $request->nome;
        $cliente->idUser = $user->id;
        $cliente->save();

        return response()->json(['response' => true], 201);
    }

    public function listUsuario()
    {
        $usuario = Usuario::with('user')->get();

        return response(compact('usuario'));
    }


    public function getUsuarioById(Request $request)
    {
        $usuario = Usuario::with('user')->where('idUser', $request->id)->first();
        return response(compact('usuario'));
    }

    public function updateUsuario(Request $request)
    {
        $error = UsuarioValidations::updateRequest($request);

        if($error->erro)
            return response(compact('error'));

        $user = User::where('id', $request->id)->first();
        $user->email = $request->email;
        if ($request->password != null)
            $user->password = Hash::make($request->password);
        $user->save();

        $usuario = Usuario::where('idUser', $request->id)->first();
        $usuario->nome = $request->nome;
        $usuario->save();

        return response()->json(['response' => true], 201);
    }

    public function deleteUsuarioById(Request $request)
    {
        
        $usuario = Usuario::where('idUser', $request->id);
        $usuario->delete();
        
        $user = User::where('id', $request->id);
        $user->delete();

        return response()->json(['response' => true], 200);
    }
}
