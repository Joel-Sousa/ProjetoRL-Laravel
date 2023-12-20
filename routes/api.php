<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioController;
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

Route::post('createUsuario', [UsuarioController::class, 'createUsuario']);

Route::middleware('auth:api')->group(function(){
    Route::get('permission', [UsuarioController::class, 'permission']);
    
    Route::get('listUsuario', [UsuarioController::class, 'listUsuario']);
    Route::get('getUsuarioById', [UsuarioController::class, 'getUsuarioById']);
    Route::put('updateUsuario', [UsuarioController::class, 'updateUsuario']);
    Route::delete('deleteUsuarioById', [UsuarioController::class, 'deleteUsuarioById']);

    Route::get('permission', [UserController::class, 'permission']);
    Route::post('logout', [UserController::class, 'logout']);
});
