<?php

namespace App\Controllers;

use App\Models\NoticiasModel;

use App\Models\IngresoModel;

use App\Models\EditarModel;

class Editar extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        //
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
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


     
        $post = $this->request->getPost(['id','titulo', 'descripcion', 'categoria','usuario','editor']);

        $editarModel = new EditarModel();

        $editarModel->insert([
            'id' => $post['id'],
            'titulo'            => trim($post['titulo']),
            'descripcion'           => trim($post['descripcion']),
            'categoria'         => $post['categoria'],
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
