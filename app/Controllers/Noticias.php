<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\NoticiasModel;

use App\Models\IngresoModel;

use App\Models\EditarModel;
use App\Models\EditarModel2;
use App\Models\CorregirModel;
class Noticias extends BaseController
{
   protected $helpers = ['form'];

    public function index() {
        $noticiasModel = new NoticiasModel();
        $noticias['noticias'] = $noticiasModel->mostrarIndex();

        $editarModel = new EditarModel();
        $noticias['editar']= $editarModel->mostrarIndex();
        
        return view('noticias/index',$noticias);
    }

//MOSTRAR -> NOTICIA DEL INDEX
    public function new(){
        return view('noticias/nuevo');
    }

    public function create(){
        $reglas = [
            'titulo'=> [
                'label' => 'titulo',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'El titulo es obligatorio y debe tener mas de 5 caracteres'
                ],
            ],
            'descripcion' => 'required',
            'estado'         => 'required',
            'categoria'     => 'required',
        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput();
        }

    #ARCHIVOS
       $imageName="";
       $file = $this->request->getFile('image');
       if($file->isValid() && ! $file->hasMoved()){
        $imageName = $file->getRandomName();
        $file->move('uploads/', $imageName);
       }
        
        $post = $this->request->getPost(['titulo', 'descripcion', 'estado', 'categoria','usuario']);
    
        $noticiasModel = new NoticiasModel();

        if($imageName==''){
        $noticiasModel->insert([
            'titulo'            => trim($post['titulo']),
            'descripcion'           => trim($post['descripcion']),
            'estado' => $post['estado'],
            'categoria'         => $post['categoria'], 
            'usuario'         => $post['usuario'], 
        ]);
        }else{
            $noticiasModel->insert([
                'titulo'            => trim($post['titulo']),
                'descripcion'           => trim($post['descripcion']),
                'estado' => $post['estado'],
                'categoria'         => $post['categoria'],
                'usuario'         => $post['usuario'],
                'img' => $imageName,  
            ]);
        }
        

        return redirect()->to('noticias');
    }

#ESTADO VALIDAR - PUBLICAR | DESCARTAR | CORRECION
    public function update($id = null){
        if (!$this->request->is('put') || $id == null) {
            return redirect()->route('noticias');
        }

        $post = $this->request->getPost(['estado_modificado','usuario_modificado','estadoEvento']);

        $noticiasModel = new NoticiasModel();
        $noticiasModel->update($id, [
            'estado_modificado'=> $post['estado_modificado'],
            'usuario_modificado' => $post['usuario_modificado'],
            'estadoEvento' => $post['estadoEvento'],
        ]);
        return redirect()->route('noticias/mostrar');
    }

#ESTADO - PUBLICAR
    public function publicar($id=null){
        if ($id == null) {
            return redirect()->route('noticias');
        }
        $noticiasModel = new NoticiasModel();
        $data['not']= $noticiasModel->find($id);
        return view('estado/publicar', $data);
    }

#ESTADO - DESCARTAR
    public function descartar($id=null){
        if ($id == null) {
            return redirect()->route('noticias');
        }
        $noticiasModel = new NoticiasModel();
        $data['not']= $noticiasModel->find($id);
        return view('estado/descartar_v', $data);
    }

#ESTADO - CORRECION
    public function correcion($id=null){
        if ($id == null) {
            return redirect()->route('noticias');
        }
        $noticiasModel = new NoticiasModel();
        $data['not']= $noticiasModel->find($id);
        return view('estado/corregir_v', $data);
    }

#ESTADO - DESHACER
    public function deshacer($id=null){
        if ($id == null) {
            return redirect()->route('noticias');
        }
        $noticiasModel = new NoticiasModel();
        $data['not']= $noticiasModel->find($id);
        return view('estado/deshacer_v', $data);
    }
#EDITOR - DESCARTAR BORRADOR
public function update2($id = null)
{
    if (!$this->request->is('put') || $id == null) {
        return redirect()->route('noticias');
    }

    $post = $this->request->getPost(['estado_borrador']);

    $noticiasModel = new NoticiasModel();
    $noticiasModel->update($id, [
        'estado_borrador'=> $post['estado_borrador'],
    ]);
    return redirect()->route('noticias/mostrar');
}

public function descartar2($id=null){
    if ($id == null) {
        return redirect()->route('noticias');
    }
    $noticiasModel = new NoticiasModel();
    $data['noticia']= $noticiasModel->find($id);

    return view('estado/descartarNoticia', $data);
}
#MOSTRAR INDEX - TARJETA
    public function mostrar(){
        $noticiasModel = new NoticiasModel();
        $resultado = $noticiasModel->findAll();

        $data = ['noticias' => $resultado];
        return view('noticias/mostrar',$data);
    }

    public function mostrar_noticia($id = null)
    {
        if ($id == null) {
            return redirect()->route('noticias');
        }
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

//MOSTRAR ESTADO -> EDITAR
    public function editar()
    {
      $noticiasModel = new NoticiasModel();
      $noticias['noticias'] = $noticiasModel->mostrarEditarNoticias();     

      $editarModel = new EditarModel();
      $noticias['editar'] = $editarModel->mostrarEditarNoticias(); 
      
      $editarModel2 = new EditarModel2();
      $noticias['editar2'] = $editarModel2->mostrarEditarNoticias();

      return view('estado/editar', $noticias );
    }

    public function edit($id = null ){
       if ($id == null) {
            return redirect()->route('noticias');
        }

        $noticiasModel = new NoticiasModel();
        $data['not'] = $noticiasModel->find($id);
        
        return view('estado/editar2', $data);
    }

//FORMULARIOS
    public function ingreso(){
        return view('noticias/ingreso');
    }
       
    public function recuperar(){
        return view('noticias/recuperar_contra');
    }

#CATEGORIAS
    public function economia(){
        $noticiasModel = new NoticiasModel();
        $noticias['noticias'] = $noticiasModel->mostrarIndex();

        $editarModel = new EditarModel();
        $noticias['editar']= $editarModel->mostrarIndex();

        return view('/categorias/economia',$noticias);
    }

    public function politica(){
        $noticiasModel = new NoticiasModel();
        $noticias['noticias'] = $noticiasModel->mostrarIndex();

        $editarModel = new EditarModel();
        $noticias['editar']= $editarModel->mostrarIndex();
        return view('/categorias/politica',$noticias);
    }

    public function turismo(){
        $noticiasModel = new NoticiasModel();
        $noticias['noticias'] = $noticiasModel->mostrarIndex();

        $editarModel = new EditarModel();
        $noticias['editar']= $editarModel->mostrarIndex();

        return view('/categorias/turismo',$noticias);
    }

    public function deporte(){
        $noticiasModel = new NoticiasModel();
        $noticias['noticias'] = $noticiasModel->mostrarIndex();

        $editarModel = new EditarModel();
        $noticias['editar']= $editarModel->mostrarIndex();

        return view('/categorias/deporte',$noticias);
    }

#HISTORIAL
    public function historial($id = null){
        if ($id == null) {
            return redirect()->route('noticias');
        }

       $noticiasModel = new NoticiasModel();
       $noticias['noticias'] = $noticiasModel->mostrarHistorial($id);     

       $editarModel = new EditarModel();
       $noticias['editar'] = $editarModel->mostrarHistorialEditada($id); 

       $editarModel2 = new EditarModel2();
       $noticias['editar2'] = $editarModel2->mostrarHistorialEditada2($id); 

       $corregirModel = new CorregirModel();
       $noticias['correccion'] = $corregirModel->mostrarHistorialCorregir($id); 
       
        return view('/mostrar/historial', $noticias);
    }
    

    public function validar(){
        $noticiasModel = new NoticiasModel();
        $noticias['noticias'] = $noticiasModel->mostrarValidar();     
  
        $editarModel = new EditarModel();
        $noticias['editar'] = $editarModel->mostrarValidar(); 
        
        $editarModel2 = new EditarModel2();
        $noticias['editar2'] = $editarModel2->mostrarValidar();
  
        return view('/estado/validar', $noticias);
    }

//CERRAR SESION
    public function salir() {
		$session = session();
        $session->destroy();
        return redirect()->to(base_url('noticias'));
	}    

#EVENTO SQL

public function activar($idEvento) {
    $noticiasModel = new NoticiasModel();
   $noticiasModel->activarEvento($idEvento); 
}

#DESHACER
public function deshacer_cambios() {
    // Iniciar una transacción
    $db = db_connect();
   $builer= $this->$db->trans_start();

    // Realizar las operaciones de deshacer (puede ser una o más consultas SQL)
    $algo_salio_mal = false;

    // Si ocurre algún error, revertir la transacción
    if ($algo_salio_mal) {
        $builer->trans_rollback(); // Deshace los cambios
        echo "Los cambios no se pudieron deshacer.";
    } else {
        $builer->trans_commit(); // Confirma los cambios
        echo "Los cambios se han deshecho correctamente.";
    }
}
    public function show($id = null){
    }

    public function delete($id = null){
    }
}
