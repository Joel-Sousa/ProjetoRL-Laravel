<?php

namespace App\Http\Controllers;

use App\Http\Services\UserDataService;
use Exception;
use Illuminate\Http\Request;

class UserDataController extends Controller
{
    public function __construct(UserDataService $userDataService)
    {
        $this->userDataService = $userDataService;
    }

    public function createUserData(Request $request){
        return $this->userDataService->createUserData($request);
    }

    public function listUserData(){
        return $this->userDataService->listUserData();
    }

    public function getUserDataById(Request $request)
    {
        return $this->userDataService->getUserDataById($request);
    }

    public function updateUserData(Request $request)
    {
        return $this->userDataService->updateUserData($request);
    }
    
    public function deleteUserDataById(Request $request)
    {
        return $this->userDataService->deleteUserDataById($request);
    }
    
    public function usersPrint(){
        return $this->userDataService->usersPrint();
    }
}
