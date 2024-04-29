<?php

namespace App\Controllers;


class Noticias extends BaseController{
    public function index(){
        echo("veamos");

        return view('noticias');

    }
    public function show(){
        echo("showshow");
        return view('economia');
    }
/*
    
    
    EJEMPLO CON PARAMETROS
    public function cat($categoria, $id){
        echo "Categoria:" . $categoria . "<br>";
        echo "ID:" . $id;
    }*/
}
?>