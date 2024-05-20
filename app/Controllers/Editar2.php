<?php

namespace App\Controllers;

use App\Models\EditarModel2;

class Editar2 extends BaseController
{

    public function index()
    {
        //
    }

    public function show($id = null)
    {
        //
    }


    public function new()
    {
        //
    }

    public function create()
    {
    }


    public function edit($id = null)
    {
        //
    }
#EDITOR -> DESCARTAR BORRADOR
    public function update($id = null)
    {
        if (!$this->request->is('put') || $id == null) {
            return redirect()->route('noticias');
        }

        $post = $this->request->getPost(['estado_borrador']);

        $editarModel2 = new EditarModel2();
        $editarModel2->update($id, [
            'estado_borrador'=> $post['estado_borrador'],
        ]);
        return redirect()->route('noticias/mostrar');
    }
  
    public function descartar($id=null){
        if ($id == null) {
            return redirect()->route('noticias');
        }
        $editarModel2 = new EditarModel2();
        $data['edit']= $editarModel2->find($id);
        return view('estado/descartarEdit2', $data);
    }

    public function delete($id = null)
    {
        //
    }

    
#ESTADO VALIDAR - PUBLICAR | DESCARTAR | CORRECION
public function update2($id = null){
    if (!$this->request->is('put') || $id == null) {
        return redirect()->route('noticias');
    }

    $post = $this->request->getPost(['estado_modificado','usuario_modificado','estadoEvento']);

    $editarModel2 = new EditarModel2();
    $editarModel2->update($id, [
        'estado_modificado'=> $post['estado_modificado'],
        'usuario_modificado' => $post['usuario_modificado'],
        'estadoEvento' => $post['estadoEvento'],
    ]);
    return redirect()->route('noticias/mostrar');
}

#ESTADO - PUBLICAR
public function publicar2($id=null){
    if ($id == null) {
        return redirect()->route('noticias');
    }
    $editarModel2 = new EditarModel2();
    $data['not']= $editarModel2->find($id);
    return view('estado/validarEDITAR2/publicar', $data);
}

#ESTADO - DESCARTAR
public function descartar2($id=null){
    if ($id == null) {
        return redirect()->route('noticias');
    }
    $editarModel2 = new EditarModel2();
    $data['not']= $editarModel2->find($id);
    return view('estado/validarEDITAR2/descartar_v', $data);
}

#ESTADO - CORRECION
public function correcion2($id=null){
    if ($id == null) {
        return redirect()->route('noticias');
    }
    $editarModel2 = new EditarModel2();
    $data['not']= $editarModel2->find($id);
    return view('estado/validarEDITAR2/corregir_v', $data);
}

#ESTADO - DESHACER
public function deshacer2
($id=null){
    if ($id == null) {
        return redirect()->route('noticias');
    }
    $editarModel2 = new EditarModel2();
    $data['not']= $editarModel2->find($id);
    return view('estado/validarEDITAR2/deshacer_v', $data);
}
}
