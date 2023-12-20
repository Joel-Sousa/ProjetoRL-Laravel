<?php

 namespace App\Http\Services;

use App\Http\Repository\UserRepository;
use Illuminate\Http\Request;

 class UserService
{
    private $model;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(Request $request){
        return $this->userRepository->login($request);
    }
    
    public function logout(){
        return $this->userRepository->logout();
    }
    
    public function permission(){
        return $this->userRepository->permission();
    }
}
