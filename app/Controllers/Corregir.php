<?php

namespace App\Controllers;

use App\Models\NoticiasModel;

use App\Models\CorregirModel;

class Corregir extends BaseController
{

    public function show($id = null){
        $noticiasModel = new NoticiasModel();
        $data['not'] = $noticiasModel->find($id);
        return view('mostrar/corregida', $data);
    }

    public function create() {
        
        $reglas = [
            'titulo'           => 'required|min_length[3]',
            'descripcion' => 'required',
            'categoria'     => 'required',
            'estado' => 'required',
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
        }*/

        $post = $this->request->getPost(['id','titulo', 'descripcion', 'categoria','estado','usuario','usuario_modificado']);

        $corregirModel = new CorregirModel();

        $corregirModel->insert([
            'id' => $post['id'],
            'titulo'     => trim($post['titulo']),
            'descripcion' => trim($post['descripcion']),
            'estado'  => $post['estado'],
            'categoria' => $post['categoria'],
            'usuario'  => $post['usuario'],
            'usuario_modificado' => $post['usuario_modificado'],
            #'img' => $imageName,
            
        ]);
       
        return redirect()->to('estado/correcion');
    }

    public function index() {

    }

    public function new(){
        
    }

    public function edit($id = null){
        
    }

    public function update($id = null)    {
    }

    public function delete($id = null) {
    
    }
}
