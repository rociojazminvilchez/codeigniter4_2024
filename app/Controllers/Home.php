<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Home extends BaseController
{
    public function index()
    {
       $mensaje = session('mensaje');

        $usuarioModel = new UsuarioModel();
        $resultado = $usuarioModel->findAll();

        $data = ['usuarios' => $resultado];
        return view('noticias', $data);
    }

    public function ingreso(){
        return view('formularios/ingreso');
    }
    
    public function login(){
        $usuario = $this->request->getPost('Email');
        $password = $this->request->getPost('Contra');
        
        $Usuario = new UsuarioModel();

        $datosUsuario = $Usuario->obtenerUsuario(['usuario'=> $usuario]);
         
        if(count($datosUsuario) > 0){
          $data = [ 
            "usuario" => $datosUsuario[0]['correo'],
            "contra" => $datosUsuario[0]['contra']
          ];
          $session = session ();
          $session->set($data);

          return redirect()->to(base_url('/'))->with('mensaje','1');
        }else{
            return redirect()->to(base_url('/'))->with('mensaje','1');
        }
    }    

    public function recuperar(){
        return view('formularios/recuperar_contra');
    }

#Categorias
    public function economia(){
        return view('/categorias/economia');
    }

    public function politica(){
        return view('/categorias/politica');
    }

    public function turismo(){
        return view('/categorias/turismo');
    }
    public function deporte(){
        return view('/categorias/deporte');
    }

    
}
