<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDataController;
use App\Mail\CreateUserMail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [UserController::class, 'login']);
// Route::post('logout', [UserController::class, 'logout']);

Route::post('createUserData', [UserDataController::class, 'createUserData']);

Route::middleware('auth:api')->group(function(){
    Route::get('permission', [UserController::class, 'permission']);
    
    Route::get('listUserData', [UserDataController::class, 'listUserData']);
    Route::get('getUserDataById', [UserDataController::class, 'getUserDataById']);
    Route::put('updateUserData', [UserDataController::class, 'updateUserData']);
    Route::delete('deleteUserDataById', [UserDataController::class, 'deleteUserDataById']);
    
    Route::post('logout', [UserController::class, 'logout']);
});

// Route::get('tst', [UserController::class, 'tst']);

// Route::get('tst1', function(){
//     return view('mail.deleteUser');
// });