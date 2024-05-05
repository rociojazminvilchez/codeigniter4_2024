<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\NoticiasModel;

use App\Models\IngresoModel;

use App\Models\EditarModel;
use CodeIgniter\Exceptions\AlertError;

class Noticias extends BaseController
{
   

    public function index()
    {
        
        $noticiasModel = new NoticiasModel();
        $resultado = $noticiasModel->findAll();

        $data = ['noticias' => $resultado];

        return view('noticias/index',$data);
    }

    public function show($id = null)
    {
        //
    }

    public function new()
    {
        return view('noticias/nuevo');
    }

    public function create()
    {
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
        /*
        $file = $this->request->getFile('img');
        
        if(!$file->isValid()){
           echo $file->getErrorString();
           exit;

        }
       $validacion = [ 
        'img' => [ 
            'rules' => [ 
                'is_image[img]',
                'max_size[img,2048]',
                'max_dims[img,1080,1080]',
                'mime_in[img,image/png,image/jpeg]'
            ]     
        ]
       ];

        if(!$this->validate($validacion)){
           print_r($this->validator->getErrors());
           exit;
        }

        if(!$file->hasMoved()){
            $ruta = ROOTPATH. 'public/imagenes';
            $file->move($ruta);
        }
        */
     
        $post = $this->request->getPost(['titulo', 'descripcion', 'estado', 'categoria']);

        $noticiasModel = new NoticiasModel();

        $noticiasModel->insert([
            'titulo'            => trim($post['titulo']),
            'descripcion'           => trim($post['descripcion']),
            'estado' => $post['estado'],
            'categoria'         => $post['categoria'],
            #'img' => $file,
            
        ]);

        return redirect()->to('noticias');
    }

   
    public function mostrar()
    {
        $noticiasModel = new NoticiasModel();
        $resultado = $noticiasModel->findAll();

        $data = ['noticias' => $resultado];
        return view('noticias/mostrar' ,$data);
    }
     
    public function login()
    {
        $usuario = $this->request->getPost('usuario');    
        $contra = $this->request->getPost('contra');

       
        $ingresoModel = new IngresoModel();
        //$data = $ingresoModel->obtenerUsuario($usuario, $contra);  
        $data = $ingresoModel->obtenerUsuario(['correo' => $usuario,'contra' => $contra]);
         
        
        if(count($data) > 0){
           // MANEJO DE SESION
            $session = session();
            $session -> set('usuario',$usuario);

            return redirect()->to('noticias');
        }else{
            echo("Usuario o contraseña incorrecta");
            return view('noticias/ingreso');
        }
    }

 //EDITAR
    public function editar()
    {
        $noticiasModel = new NoticiasModel();
        $resultado = $noticiasModel->findAll();

        $data = ['noticias' => $resultado];
        return view('noticias/editar',$data);
    }

    public function edit($id = null )
    {
        if ($id == null) {
            return redirect()->route('noticias');
        }

        $noticiasModel = new NoticiasModel();
        $data['not'] = $noticiasModel->find($id);
        
        return view('noticias/editar2', $data);
        
    }

    public function update($id = null)
    { 
        if (!$this->request->is('put') || $id == null) {
            return redirect()->route('noticias');
        }
        $reglas = [
            'titulo'           => 'required|min_length[3]',
            'descripcion' => 'required',
            'categoria'     => 'required',

        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }


     
        $post = $this->request->getPost(['usuario','titulo', 'descripcion', 'estado', 'categoria']);

        $noticiasModel = new NoticiasModel();

        $noticiasModel->update($id,[
        #'id' => $post['id'],
            'titulo'            => trim($post['titulo']),
            'descripcion'           => trim($post['descripcion']),
            'estado' => $post['estado'],
            'categoria'         => $post['categoria'],
            #'img' => $file,
            
        ]);
       
        return redirect()->to('noticias');
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
    public function historial(){
        return view('/noticias/historial');
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

//Cerrar sesion
    public function salir() {
		$session = session();
        $session->destroy();
        return redirect()->to(base_url('noticias'));
	}

}
