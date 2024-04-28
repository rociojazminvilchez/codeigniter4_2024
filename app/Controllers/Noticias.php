<?php
namespace App\Controllers;

class Noticias extends BaseController{
    public function index(){
        echo ("hola"); 
        
        return view('plantilla/header')
        .view('plantilla/footer');
    }
/*
    public function show(){
        return "nueva funcion";
    }
    
    EJEMPLO CON PARAMETROS
    public function cat($categoria, $id){
        echo "Categoria:" . $categoria . "<br>";
        echo "ID:" . $id;
    }*/
}
?>