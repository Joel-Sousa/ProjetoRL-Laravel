<?php

namespace App\Http\Repository;

use App\Http\Validations\UserValidations;
use App\Models\User;
use App\Models\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use Laravel\Passport\Passport;

class UserRepository
{
    use HasApiTokens;
    
    public function login(Request $request)
    {
        $error = UserValidations::login($request);

        if($error->erro)
            return response(compact('error'));

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $token_time = now()->addHours(8);
            
            Passport::personalAccessTokensExpireIn($token_time);
            
            /** @var \App\Models\User $authUser **/
            $authUser = Auth::user();
            $token = $authUser->createToken('MyApp')->accessToken;

            $user = User::with('userData')->where('id', $authUser->id)->first();

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
            $roles_id = $user->roles_id;

            return response(compact('roles_id'));
        }

    }

}
