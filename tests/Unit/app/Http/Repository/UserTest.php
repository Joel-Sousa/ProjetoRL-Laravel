<?php

namespace Tests\Unit\app\Http\Repository;

use App\Http\Repository\UserDataRepository;
use App\Http\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;
use Laravel\Passport\Passport;
use Mockery\Undefined;
use Tests\TestCase;

class UserTest extends TestCase
{
    use HasApiTokens;
    
    public function testLogin(){
        $data = [
            'email' => 'tst@email.com',
            'password' => '123',
        ];

        $request = new Request($data);
        $user = new UserRepository();
        $usr = $user->login($request);

        $this->assertTrue(!!$usr->original['token']);
    }

    public function testLoginFieldsEmpty(){
        $data = [
            'email' => '',
            'password' => '',
        ];

        $request = new Request($data);
        $user = new UserRepository();
        $usr = $user->login($request);

        $this->assertTrue($usr->original['error']->erro);
    }

    public function testLoginFieldsWrong(){
        $data = [
            'email' => 'tst12@email.com',
            'password' => 'tst',
        ];

        $request = new Request($data);
        $user = new UserRepository();
        $usr = $user->login($request);

        $this->assertTrue($usr->original['error']);
    }

    public function testLogout(){
       
        $user = new UserRepository();
        $usr = $user->logout();

        $this->assertTrue($usr->original['response']);
    }

    public function testPermission(){
       
        if(Auth::attempt(['email' => 'tst@email.com', 'password' => '123'])){
            $token_time = now()->addHours(8);
            
            Passport::personalAccessTokensExpireIn($token_time);
            
            /** @var \App\Models\User $authUser **/
            $authUser = Auth::user();
            $token = $authUser->createToken('MyApp')->accessToken;
        }


        $user = new UserRepository();
        $usr = $user->permission();

        $this->assertTrue(!!$usr->original['roles_id']);
    }
}
