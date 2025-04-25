<?php

namespace App\Http\Controllers;

use App\Entidades\Tipo_producto;
use Illuminate\Http\Request;

class ControladorCategoria extends Controller{

    public function nuevo(){
        $titulo = "Nueva categoría";
        return view("sistema.categoria-nuevo", compact("titulo"));
    }

    public function index(){
        $titulo = "Listado de categorías";
        return view("sistema.categoria-listar", compact("titulo"));
    }

    public function cargarGrilla(Request $request){
        $request = $_REQUEST;

        $entidad = new Tipo_producto();
        $aTiposProductos = $entidad->obtenerFiltrado();

        $data = array();
        $cont = 0;

        $inicio = $request['start'];
        $registros_por_pagina = $request['length'];


        for ($i = $inicio; $i < count($aTiposProductos) && $cont < $registros_por_pagina; $i++) {
            $row = array();
            $row[] = "<a href='/admin/categoria" . $aTiposProductos[$i]->idtipoproducto . "'>" . $aTiposProductos[$i]->nombre . "</a>"; 
            $cont++;
            $data[] = $row;
        }

        $json_data = array(
            "draw" => intval($request['draw']),
            "recordsTotal" => count($aTiposProductos), //cantidad total de registros sin paginar
            "recordsFiltered" => count($aTiposProductos), //cantidad total de registros en la paginacion
            "data" => $data,
        );
        return json_encode($json_data);
    }
}
