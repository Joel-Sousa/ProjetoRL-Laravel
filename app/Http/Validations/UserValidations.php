<?php 

namespace App\Http\Validations;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserValidations{

    public static function login(Request $request){

        $validation = Validator::make(
            $request->all(),
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'O campo de email e obrigatorio!',
                'password.required' => 'O campo de senha e obrigatorio!',
            ]

        );
            if($validation->fails()){
                $error = UserValidations::validaCampos($validation->errors()->toArray());

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