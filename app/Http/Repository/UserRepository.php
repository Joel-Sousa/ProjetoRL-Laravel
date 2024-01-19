<?php

namespace App\Http\Repository;

use App\Http\Validations\UserValidations;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;
use Laravel\Passport\Passport;

class UserRepository
{
    use HasApiTokens;
    
    public function login(Request $request)
    {
        $error = UserValidations::createRequest($request);

        if($error->erro)
            return response(compact('error'));

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $token_time = now()->addHours(8);
            
            Passport::personalAccessTokensExpireIn($token_time);
            
            /** @var \App\Models\User $authUser **/
            $authUser = Auth::user();
            $token = $authUser->createToken('MyApp')->accessToken;

            $user = User::with('usuario')->where('id', $authUser->id)->first();

            return response()->json(compact('token', 'user'));
        } else {
            return response()->json([
                "error" => true,
                "messagem" => "Usuário ou senha inválido",
            ]);
        }
    }

    public function logout()
    {
        // Auth::user();
        if (Auth::check())
            Auth::guard('api')->user()->token()->revoke();

            return response()->json(['response' => true, 'message' => 'Successfully logged out'], 200);
    }

    public function permission(){
        if (Auth::check()){
            $user = Auth::user();
            $usuario = User::with('usuario')->where('id', $user->id)->first();
            // $data = $usuario->all();

            $user = (object)[
                'idRole' => $usuario->role->idRole,
                'role' => $usuario->role->nome,
                'email' => $usuario->email,
                'nome' => $usuario->usuario->nome
            ];
        }

        return response(compact('user'));
    }
}
