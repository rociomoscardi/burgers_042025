<?php

namespace App\Http\Controllers;

use App\Entidades\Sucursal;
use Illuminate\Http\Request;

class ControladorSucursal extends Controller{

    public function nuevo(){
        $titulo = "Nueva sucursal";
        return view("sistema.sucursal-nuevo", compact("titulo"));
    }

    public function index (){
        $titulo = "Listado de sucursales";
        return view("sistema.sucursal-listar", compact("titulo"));
    }

    public function cargarGrilla(Request $request){
        $request = $_REQUEST;

        $entidad = new Sucursal();
        $aSucursales = $entidad->obtenerFiltrado();

        $data = array();
        $cont = 0;

        $inicio = $request['start'];
        $registros_por_pagina = $request['length'];


        for ($i = $inicio; $i < count($aSucursales) && $cont < $registros_por_pagina; $i++) {
            $row = array();
            $row[] = "<a href='/admin/sucursal" . $aSucursales[$i]->idsucursal . "'>" . $aSucursales[$i]->nombre . "</a>"; 
            $row[] = $aSucursales[$i]->direccion;
            $row[] = "<a target='_blank' href= '" . $aSucursales[$i]->link_mapa . "'>" . $aSucursales[$i]->link_mapa . "</a>";
            $row[] = $aSucursales[$i]->telefono;
            $row[] = $aSucursales[$i]->horarios;
            $cont++;
            $data[] = $row;
        }

        $json_data = array(
            "draw" => intval($request['draw']),
            "recordsTotal" => count($aSucursales), //cantidad total de registros sin paginar
            "recordsFiltered" => count($aSucursales), //cantidad total de registros en la paginacion
            "data" => $data,
        );
        return json_encode($json_data);
    }
}
