<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Home extends BaseController
{
    public function index()
    {
       
        $usuarioModel = new UsuarioModel();
        $resultado = $usuarioModel->findAll();

        $data = ['usuarios' => $resultado];
        return view('noticias', $data);
    }

    public function ingreso(){
        return view('ingreso');
    }
    
    public function login(){
        $usuario = $this->request->getPost('Email');
        $password = $this->request->getPost('Contra');
    }
}
