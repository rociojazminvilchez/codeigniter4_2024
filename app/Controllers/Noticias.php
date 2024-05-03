<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\NoticiasModel;

class Noticias extends BaseController
{

    public function index()
    {
        $noticiasModel = new NoticiasModel();
        return view('noticias/index');
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
            'img'  => '',
            
        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }
       

        $post = $this->request->getPost(['titulo', 'descripcion', 'estado', 'categoria']);

        $noticiasModel = new NoticiasModel();
        $noticiasModel->insert([
            'titulo'            => trim($post['titulo']),
            'descripcion'           => trim($post['descripcion']),
            'estado' => $post['estado'],
            'categoria'         => $post['categoria'],
            
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
