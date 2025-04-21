<?php

namespace App\Http\Controllers;

class ControladorSucursal extends Controller{

    public function nuevo(){
        $titulo = "Nueva sucursal";
        return view("sistema.sucursal-nuevo", compact("titulo"));
    }

    public function index (){
        $titulo = "Listado de sucursales";
        return view("sistema.sucursal-listar", compact("titulo"));
    }
}
