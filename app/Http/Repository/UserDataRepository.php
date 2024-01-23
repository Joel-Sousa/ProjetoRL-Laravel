<?php

namespace App\Http\Repository;

use App\Http\Validations\UserDataValidations;
use App\Models\User;
use App\Models\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserDataRepository
{
    public function createUserData(Request $request)
    {
        $error = UserDataValidations::createUserData($request);

        if($error->erro)
            return response(compact('error'));

        $user = new User();
        $user->idRole = 2;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $cliente = new UserData();
        $cliente->name = $request->name;
        $cliente->idUser = $user->id;
        $cliente->save();

        return response()->json(['response' => true], 201);
    }

    public function listUserData()
    {
        $userData = UserData::with('user')->get();

        return response(compact('userData'));
    }


    public function getUserDataById(Request $request)
    {
        $userData = UserData::with('user')->where('idUser', $request->id)->first();
        return response(compact('userData'));
    }

    public function updateUserData(Request $request)
    {
        $error = UserDataValidations::updateUserData($request);

        if($error->erro)
            return response(compact('error'));

        $user = User::where('id', $request->id)->first();
        $user->email = $request->email;
        if ($request->password != null)
            $user->password = Hash::make($request->password);
        $user->save();

        $userData = UserData::where('idUser', $request->id)->first();
        $userData->name = $request->name;
        $userData->save();

        return response()->json(['response' => true], 201);
    }

    public function deleteUserDataById(Request $request)
    {
        
        $userData = UserData::where('idUser', $request->id);
        $userData->delete();
        
        $user = User::where('id', $request->id);
        $user->delete();

        return response()->json(['response' => true], 200);
    }
}
