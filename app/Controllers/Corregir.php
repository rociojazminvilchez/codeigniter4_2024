<?php

namespace App\Controllers;

use App\Models\NoticiasModel;

use App\Models\CorregirModel;

class Corregir extends BaseController
{

    public function index()
    {
        //
    }

    public function show($id = null)
    {
        $noticiasModel = new NoticiasModel();
        $data['not'] = $noticiasModel->find($id);
        return view('mostrar/corregida', $data);
    }

    public function new()
    {
        //
    }

    public function create()
    {
        //
    }

    public function edit($id = null)
    {
        $reglas = [
            'titulo'           => 'required|min_length[3]',
            'descripcion' => 'required',
            'categoria'     => 'required',
            'estado' => 'required',
        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }
     
        $post = $this->request->getPost(['id','titulo', 'descripcion', 'categoria','estado','usuario','correcion']);

        $corregirModel = new CorregirModel();

        $corregirModel->insert([
            'id' => $post['id'],
            'titulo'     => trim($post['titulo']),
            'descripcion' => trim($post['descripcion']),
            'categoria'  => $post['categoria'],
            'estado'  => $post['estado'],
            'usuario'  => $post['usuario'],
            'correcion' => $post['correcion'],
            #'img' => $file,
            
        ]);
       
        return redirect()->to('estado/validar');
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
