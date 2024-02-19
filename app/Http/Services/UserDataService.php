<?php

 namespace App\Http\Services;

use App\Http\Repository\UserDataRepository;
use Illuminate\Http\Request;

 class UserDataService
{

    public function __construct(UserDataRepository $userDataRepository)
    {
        $this->userDataRepository = $userDataRepository;
    }

    public function createUserData(Request $request){
        return $this->userDataRepository->createUserData($request);
    }

    public function listUserData(){
        return $this->userDataRepository->listUserData();
    }

    public function getUserDataById(Request $request)
    {
        return $this->userDataRepository->getUserDataById($request);
    }

    public function updateUserData(Request $request)
    {
        return $this->userDataRepository->updateUserData($request);
    }

    public function deleteUserDataById(Request $request)
    {
        return $this->userDataRepository->deleteUserDataById($request);
    }
    
    public function usersPrint()
    {
        return $this->userDataRepository->usersPrint();
    }
}
