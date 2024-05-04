<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Home extends BaseController
{
    /*
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

    public function recuperar_contra(){
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

#Noticia
   public function crear_noticia(){
        return view('/formularios/crear_noticia');
    }

    public function historial(){
        return view('/panel/historial');
    }

    public function panel(){
        return view('/panel/panel');
    }

    public function borrador(){
        return view('/panel/borrador');
    }

    public function correcion(){
        return view('/panel/correcion');
    }

    public function validar(){
        return view('/panel/validar');
    }
*/
}
