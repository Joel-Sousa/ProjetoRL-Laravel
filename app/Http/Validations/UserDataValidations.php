<?php 

namespace App\Http\Validations;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserDataValidations{

    public static function createUserData(Request $request){

        $validation = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'name.required' => 'O campo de nome e obrigatorio!',
                'email.required' => 'O campo de email e obrigatorio!',
                'password.required' => 'O campo de senha e obrigatorio!',
            ]

        );
            if($validation->fails()){
                $error = UserDataValidations::validaCampos($validation->errors()->toArray());

                return (object) ['erro' => true, 'data' => $error];
            }else{
                return (object) ['erro' => false];
            }
    }

    public static function updateUserData(Request $request){

        $validation = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'name.required' => 'O campo de nome e obrigatorio!',
                'email.required' => 'O campo de email e obrigatorio!',
                'password.required' => 'O campo de senha e obrigatorio!',
            ]

        );
            if($validation->fails()){
                $error = UserDataValidations::validaCampos($validation->errors()->toArray());

                return (object) ['erro' => true, 'data' => $error];
            }else{
                return (object) ['erro' => false];
            }
    }

    public static function validaCampos($data){
        $error = [];

        foreach($data as $i => $e){
            $err = (object) [];
            $err->label = $i;
            $err->erro = $e[0];

            array_push($error, $err);
        }

        return $error;
    }
}