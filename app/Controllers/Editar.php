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
        $file = $this->request->getFile('image');
        if($file->isValid() && ! $file->hasMoved()){
            $imageName = $file->getRandomName();
            $file->move('uploads/', $imageName);
     }
        
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
            'img' => $imageName,
            
        ]);
        
        return view('mostrar/actualizar');
    }


    public function edit($id = null)
    {
        //
    }


    public function update($id = null)
    {
        //
    }


    public function delete($id = null)
    {
        //
    }

    public function borrador($id=null){

        $editarModel = new EditarModel();
        $resultado = $editarModel->find($id);
        $data = ['editar' => $resultado];
        return view('estado/borrador', $data);
    }
}
