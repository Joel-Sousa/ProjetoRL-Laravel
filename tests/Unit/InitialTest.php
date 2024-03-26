<?php

namespace Tests\Unit;

use App\Http\Repository\UserDataRepository;
use App\Models\User;
use App\Models\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class InitialTest extends TestCase
{
    public function testDeleteAll(){

        // var_dump(env('DB_CONNECTION'));

        // UserData::truncate();
        // User::truncate();

        DB::table('usersData')->truncate();
        DB::table('users')->truncate();
        
        $data = [
            'email' => 'tst@email.com',
            'password' => '123',
            'name' => 'tst',
        ];

        $request = new Request($data);

        $userRepository = new UserDataRepository();
        $resp = $userRepository->createUserData($request);

        $tst = Auth::attempt(['email' => 'tst@email.com', 'password' => '123']);


        $this->assertTrue($resp->getData()->response);
    }
}
