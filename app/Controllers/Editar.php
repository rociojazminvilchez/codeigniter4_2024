<?php

namespace App\Controllers;

use App\Models\NoticiasModel;

use App\Models\EditarModel;
use App\Models\EditarModel2;
class Editar extends BaseController{
    public function show($id = null) {
        if ($id == null) {
            return redirect()->route('noticias');
        }
        $noticiasModel = new NoticiasModel();
        $data['not'] = $noticiasModel->find($id);
        return view('mostrar/panel_editada', $data);
    }

#ESTADO -> EDITAR NOTICIA
    public function create(){
       
        $reglas = [
            'titulo'           => 'required|min_length[3]',
            'descripcion' => 'required',
            'categoria'     => 'required',
        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }
        
        #archivos
        /*
        $file = $this->request->getFile('image');
        if($file->isValid() && ! $file->hasMoved()){
            $imageName = $file->getRandomName();
            $file->move('uploads/', $imageName);
       }
        */
        $post = $this->request->getPost(['id','titulo', 'descripcion','estado', 'categoria','img','usuario','editor']);
  
         $id=$post['id'];
        $editarModel = new EditarModel();
        $editarModel2 = new EditarModel2();
        $data = $editarModel->consultarID(['id'=> $id]);
    if(count($data) == 0){
        $editarModel->insert([
            'id' => $post['id'],
            'titulo'            => trim($post['titulo']),
            'descripcion'           => trim($post['descripcion']),
            'estado'         => $post['estado'],
            'categoria' => $post['categoria'],
            'usuario'         => $post['usuario'],
            'editor' => $post['editor'],
            'estado_modificado' => '',
            #'img' => $imageName,
            
        ]);
        return view('mostrar/actualizar');
    }else{
        $editarModel2->insert([
            'id' => $post['id'],
            'titulo'            => trim($post['titulo']),
            'descripcion'           => trim($post['descripcion']),
            'estado'         => $post['estado'],
            'categoria' => $post['categoria'],
            'usuario'         => $post['usuario'],
            'editor' => $post['editor'],
            'estado_modificado' => '',
            #'img' => $imageName,
            
        ]);
        return view('mostrar/actualizar');
    }
}

#ESTADO -> BORRADOR - DESCARTAR     
    public function borrador($id=null){
       
        $editarModel = new EditarModel();
        $resultado = $editarModel->find($id);
        $data = ['editar' => $resultado];
        return view('estado/borrador', $data);
    }

    public function update($id = null)
    {
        if (!$this->request->is('put') || $id == null) {
            return redirect()->route('noticias');
        }

        $post = $this->request->getPost(['estado_modificado']);

        $editarModel = new EditarModel();
        $editarModel->update($id, [
            'estado_modificado'=> $post['estado_modificado'],
        ]);
        return redirect()->route('noticias/mostrar');
    }

    public function descartar($id=null){
        if ($id == null) {
            return redirect()->route('noticias');
        }
        $editarModel = new EditarModel();
        $data['edit']= $editarModel->find($id);
        return view('estado/descartar', $data);
    }

//ESTADO -> CORREGIR - EDITAR
    public function correcion($id=null)
    {
        $noticiasModel = new NoticiasModel();
        $noticias['noticias'] = $noticiasModel->mostrarCorreccion();     

        $editarModel = new EditarModel();
        $noticias['editar'] = $editarModel->mostrarCorreccion(); 
      
        $editarModel2 = new EditarModel2();
        $noticias['editar2'] = $editarModel2->mostrarCorreccion();

        return view('estado/correcion', $noticias);
    } 
    
    public function edit($id = null ){
        if ($id == null) {
            return redirect()->route('noticias');
        }
        $noticiasModel = new NoticiasModel();
        $data['not'] = $noticiasModel->find($id); 
        return view('estado/corregir_editar', $data);
    }

#ESTADO VALIDAR - PUBLICAR | DESCARTAR | CORRECION
    public function update2($id = null){
        if (!$this->request->is('put') || $id == null) {
            return redirect()->route('noticias');
        }

        $post = $this->request->getPost(['estado_modificado','usuario_modificado','estatus','estadoEvento']);
        
        $editarModel = new EditarModel();
        $editarModel->update($id, [
            'estado_modificado'=> $post['estado_modificado'],
            'usuario_modificado' => $post['usuario_modificado'],
            'estatus'=>$post['estatus'],
            'estadoEvento' => $post['estadoEvento'],
        ]);
        return redirect()->route('noticias/mostrar');
    }

#ESTADO - PUBLICAR
    public function publicar2($id=null){
        if ($id == null) {
            return redirect()->route('noticias');
        }
        $editarModel = new EditarModel();
        $data['not']= $editarModel->find($id);
        return view('estado/validarEDITAR/publicar', $data);
    }

#ESTADO - DESCARTAR
    public function descartar2($id=null){
        if ($id == null) {
            return redirect()->route('noticias');
        }
        $editarModel = new EditarModel();
        $data['not']= $editarModel->find($id);
        return view('estado/validarEDITAR/descartar_v', $data);
    }

#ESTADO - CORRECION
    public function correcion2($id=null){
        if ($id == null) {
            return redirect()->route('noticias');
        }
        $editarModel = new EditarModel();
        $data['not']= $editarModel->find($id);
        return view('estado/validarEDITAR/corregir_v', $data);
    }

#ESTADO - DESHACER
    public function deshacer2
    ($id=null){
        if ($id == null) {
            return redirect()->route('noticias');
        }
        $editarModel = new EditarModel();
        $data['not']= $editarModel->find($id);
        return view('estado/validarEDITAR/deshacer_v', $data);
    }
#EVENTO
    public function activar($idEvento) {
        $editarModel = new EditarModel();
       $editarModel->activarEvento($idEvento); 
    }

    public function new() {
    }

    public function index() {    
    }
    
    public function delete($id = null){
    }
}
