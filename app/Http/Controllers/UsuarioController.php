<?php

namespace App\Http\Controllers;

use App\Http\Services\UsuarioService;
use Exception;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function __construct(UsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    public function createUsuario(Request $request){
        return $this->usuarioService->createUsuario($request);
    }

    public function listUsuario(){
        return $this->usuarioService->listUsuario();
    }


    public function getUsuarioById(Request $request)
    {
        return $this->usuarioService->getUsuarioById($request);
    }

    public function updateUsuario(Request $request)
    {
        return $this->usuarioService->updateUsuario($request);
    }
    
    public function deleteUsuarioById(Request $request)
    {
        return $this->usuarioService->deleteUsuarioById($request);
    }
}
