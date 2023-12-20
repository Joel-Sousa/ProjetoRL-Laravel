<?php

 namespace App\Http\Services;

use App\Http\Repository\UserRepository;
use App\Http\Repository\UsuarioRepository;
use Illuminate\Http\Request;

 class UsuarioService
{

    public function __construct(UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function createUsuario(Request $request){
        return $this->usuarioRepository->createUsuario($request);
    }

    public function listUsuario(){
        return $this->usuarioRepository->listUsuario();
    }

    public function getUsuarioById(Request $request)
    {
        return $this->usuarioRepository->getUsuarioById($request);
    }

    public function updateUsuario(Request $request)
    {
        return $this->usuarioRepository->updateUsuario($request);
    }

    public function deleteUsuarioById(Request $request)
    {
        return $this->usuarioRepository->deleteUsuarioById($request);
    }

}
