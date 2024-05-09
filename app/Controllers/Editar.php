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
        return view('mostrar/editada', $data);
    }

    public function new()
    {
        //
    }


    public function create()
    {
        $reglas = [
            'titulo'           => 'required|min_length[3]',
            'descripcion' => 'required',
            'categoria'     => 'required',
        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
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
            #'img' => $file,
            
        ]);
       
        return redirect()->to('noticias');
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
}
