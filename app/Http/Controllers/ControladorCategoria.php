<?php

namespace App\Http\Controllers;

class ControladorCategoria extends Controller{

    public function nuevo(){
        $titulo = "Nueva categoría";
        return view("sistema.categoria-nuevo", compact("titulo"));
    }
}
