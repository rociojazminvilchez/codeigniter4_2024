<?php

namespace App\Controllers;

use App\Models\NoticiasModel;

use App\Models\IngresoModel;

use App\Models\EditarModel;

class Editar extends BaseController
{
    public function index() {
        //
    }


    public function show($id = null) {
        $noticiasModel = new NoticiasModel();
        $data['not'] = $noticiasModel->find($id);
        return view('mostrar/panel_editada', $data);
    }

    public function new() {
        //
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

        $editarModel = new EditarModel();
   
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
        return redirect()->route('noticias');
    }

    public function descartar($id=null){
        $editarModel = new EditarModel();
        $data['edit']= $editarModel->find($id);
        return view('estado/descartar', $data);
    }

//ESTADO -> CORREGIR - EDITAR
    public function correcion($id=null){
        $db = \Config\Database::connect();
        $noticiasModel = new NoticiasModel();
        $builder = $db->table('noticias');
        $builder->select('noticias.*');
        $builder->join('correcion', 'correcion.id = noticias.id', 'left');
        $builder->where('correcion.id IS NULL OR noticias.id IS NULL');
        
       $noticias['noticias'] = $builder->get()->getResultArray();
       
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
    /*
    public function corregir_editar($id=null){
        $editarModel = new EditarModel();
        $data['edit'] = $editarModel->find($id);
        print_r($data);
        exit;
        return view('estado/corregir_editar', $data);
    }
*/
    public function delete($id = null)
    {
        //
    }

}
