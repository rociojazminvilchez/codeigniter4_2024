<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('noticias');
    }

    public function economia(){
        echo("showshow");
        return view('economia');
    }
    
}
