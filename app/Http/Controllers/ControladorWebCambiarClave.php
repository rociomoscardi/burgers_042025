<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Request;

class ControladorWebCambiarClave extends Controller
{
    public function index()
    {
        return view("web.cambiar-clave");
    }

    public function cambiar(Request $request){
        if("txtClave" == "txtClaveN" ){
            
        }
    }
}
