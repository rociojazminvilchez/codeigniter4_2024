<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\NoticiasModel;

use App\Models\IngresoModel;

use App\Models\EditarModel;

use App\Models\HistorialModel;

class Noticias extends BaseController
{

    public function index() {
        $noticiasModel = new NoticiasModel();
        $resultado = $noticiasModel->findAll();

        $data = ['noticias' => $resultado];

        return view('noticias/index',$data);
    }

    //MOSTRAR -> NOTICIA DEL INDEX
    
   

    public function new(){
        return view('noticias/nuevo');
    }

    public function create(){
        $reglas = [
            'titulo'           => 'required|min_length[3]',
            'descripcion' => 'required',
            'estado'         => 'required',
            'categoria'     => 'required',
            
        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

  
        #archivos
       $file = $this->request->getFile('image');
       if($file->isValid() && ! $file->hasMoved()){
        $imageName = $file->getRandomName();
        $file->move('uploads/', $imageName);
       }
        
        $post = $this->request->getPost(['titulo', 'descripcion', 'estado', 'categoria']);
    
        $noticiasModel = new NoticiasModel();

        $noticiasModel->insert([
            'titulo'            => trim($post['titulo']),
            'descripcion'           => trim($post['descripcion']),
            'estado' => $post['estado'],
            'categoria'         => $post['categoria'],
            'img' => $imageName,
        ]);

        return redirect()->to('noticias');
    }

    public function update($id = null){
        //
    }

    public function mostrar()    {
        $noticiasModel = new NoticiasModel();
        $resultado = $noticiasModel->findAll();

        $data = ['noticias' => $resultado];
        return view('noticias/mostrar',$data);
    }

    public function show($id = null){

    }
     
    public function mostrar_noticia($id = null){
        
        $noticiasModel = new NoticiasModel();
        $data['not'] = $noticiasModel->find($id);
        return view('mostrar/noticia_id', $data);
    } 

#INGRESAR SESION
    public function login(){
        $usuario = $this->request->getPost('usuario');    
        $contra = $this->request->getPost('contra');
        $tipo = $this->request->getPost('tipo');

       
        $ingresoModel = new IngresoModel();

        $data = $ingresoModel->obtenerUsuario(['correo' => $usuario,'contra' => $contra,'rol' => $tipo]);
    
        if(count($data) > 0){
           // MANEJO DE SESION
           $data = [
                'usuario' => $usuario,
                'rol' => $tipo,
           ];
            $session = session();
            $session -> set($data);

            return redirect()->to('noticias');
        }else{
            ?>
            <h4 style="text-decoration: solid; text-align:center; color:red;"> Datos incorrectos. Ingrese nuevamente </h4>
            <?php
            return view('noticias/ingreso');
        }
    }

 //EDITAR
    public function editar()
    {
        $noticiasModel = new NoticiasModel();
        $resultado = $noticiasModel->findAll();

        $data = ['noticias' => $resultado];

        return view('estado/editar',$data);
    }

    public function edit($id = null ){
       if ($id == null) {
            return redirect()->route('noticias');
        }

        $noticiasModel = new NoticiasModel();
        $data['not'] = $noticiasModel->find($id);
        
        return view('estado/editar2', $data);
        
    }


    public function delete($id = null)
    {
        //
    }

//Formularios
    public function ingreso(){
        return view('noticias/ingreso');
    }
       
    public function recuperar(){
        return view('noticias/recuperar_contra');
    }

#Categorias
    public function economia(){
        $noticiasModel = new NoticiasModel();
        $resultado = $noticiasModel->findAll();

        $data = ['noticias' => $resultado];
        return view('/categorias/economia',$data);
    }

    public function politica(){
        $noticiasModel = new NoticiasModel();
        $resultado = $noticiasModel->findAll();

        $data = ['noticias' => $resultado];
        return view('/categorias/politica',$data);
    }

    public function turismo(){
        $noticiasModel = new NoticiasModel();
        $resultado = $noticiasModel->findAll();

        $data = ['noticias' => $resultado];
        return view('/categorias/turismo' ,$data);
    }
    public function deporte(){
        $noticiasModel = new NoticiasModel();
        $resultado = $noticiasModel->findAll();

        $data = ['noticias' => $resultado];
        return view('/categorias/deporte' ,$data);
    }

#HISTORIAL
    public function historial($id = null){

        $noticiasModel = new NoticiasModel();

        $data['not'] = $noticiasModel->find($id);
        return view('/mostrar/historial', $data);
    }
    
    /*
    public function original( ){
        return view('mostrar/original');
    }*/

    public function validar(){
        $noticiasModel = new NoticiasModel();
        $resultado = $noticiasModel->findAll();

        $data = ['noticias' => $resultado];
        return view('/estado/validar', $data);
    }

//Cerrar sesion
    public function salir() {
		$session = session();
        $session->destroy();
        return redirect()->to(base_url('noticias'));
	}

}
