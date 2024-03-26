<?php

// namespace Tests\Unit;
namespace Tests\Unit\app\Http\Repository;

use App\Http\Repository\UserDataRepository;
use Illuminate\Http\Request;
use Tests\TestCase;

class UserDataRepositoryTest extends TestCase
{
    public function testNewCreateUserData()
    {
        $data = [
            'email' => 'tst1@email.com',
            'password' => '123',
            'name' => 'tst1',
        ];

        $request = new Request($data);

        $userRepository = new UserDataRepository();
        $resp = $userRepository->createUserData($request);

        $this->assertTrue($resp->getData()->response);
    }
    
    public function testNewCreateUserDataFieldsEmpty()
    {
        // var_dump(env('DB_CONNECTION'));

        $data = [
            // 'email' => rand(0, 9999).'@email.com',
            'email' => '',
            'password' => '',
            'name' => '',
        ];

        $request = new Request($data);

        $userRepository = new UserDataRepository();
        $resp = $userRepository->createUserData($request);

        $this->assertTrue($resp->original['error']->erro);
    }

    public function testListAllUserData(){
        $userData = new UserDataRepository();
        $data = $userData->listUserData();
        
        $bool = $data->original['userData']->count() > 0;
        
        $this->assertTrue($bool);
    }
    
    public function testGetUserById()
    {
        $data = [
            'id' => 2
        ];

        $request = new Request($data);

        $userData = new UserDataRepository();
        $user = $userData->getUserDataById($request);
        
        $this->assertTrue(!!$user->original['userData']);
    }
    
    public function testUpdadeUserById(){
        
        $data = [
            'id' => 2,
            'email' => 'tstnew@email.com',
            'name' => 'tstNew',
            'password' => '123',
        ];
        
        $request = new Request($data);
        
        $userData  = new UserDataRepository();
        $user = $userData->updateUserData($request);
        
        $this->assertTrue($user->original['response']);
    }

    public function testUpdadeUserByIdFieldsEmpty(){
        
        $data = [
            'id' => 2,
            'email' => '',
            'name' => '',
            'password' => '',
        ];
        
        $request = new Request($data);
        
        $userData  = new UserDataRepository();
        $user = $userData->updateUserData($request);
        
        $this->assertTrue($user->original['error']->erro);
    }
    
    public function testDeleteUserById(){
        $data = [
            'id' => 2,
        ];
        
        $request = new Request($data);
        
        $userData  = new UserDataRepository();
        $user = $userData->deleteUserDataById($request);
        
        $this->assertTrue($user->original['response']);
    }
    
    public function testUsersPrint(){
        
        $userData  = new UserDataRepository();
        $user = $userData->usersPrint();
        
        $this->assertTrue(!!$user);
    }
}
