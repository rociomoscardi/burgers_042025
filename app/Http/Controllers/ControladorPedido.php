<?php

namespace App\Http\Controllers;

use App\Entidades\Pedido;
use Illuminate\Http\Request;

class ControladorPedido extends Controller{

    public function nuevo(){
        $titulo = "Nuevo pedido";
        return view("sistema.pedido-nuevo", compact("titulo"));
    }

    public function index(){
        $titulo = "Listado de pedidos";
        return view("sistema.pedido-listar", compact("titulo"));
    }

    public function cargarGrilla(Request $request){
        $request = $_REQUEST;

        $entidad = new Pedido();
        $aPedidos = $entidad->obtenerFiltrado();

        $data = array();
        $cont = 0;

        $inicio = $request['start'];
        $registros_por_pagina = $request['length'];


        for ($i = $inicio; $i < count($aPedidos) && $cont < $registros_por_pagina; $i++) {
            $row = array();
            $row[] = "<a href='/admin/pedido" . $aPedidos[$i]->idpedido . "'>" . $aPedidos[$i]->idpedido . "</a>"; 
            $row[] = $aPedidos[$i]->sucursal;
            $row[] = $aPedidos[$i]->cliente;
            $row[] = $aPedidos[$i]->fecha;
            $row[] = $aPedidos[$i]->total;
            $cont++;
            $data[] = $row;
        }

        $json_data = array(
            "draw" => intval($request['draw']),
            "recordsTotal" => count($aPedidos), //cantidad total de registros sin paginar
            "recordsFiltered" => count($aPedidos), //cantidad total de registros en la paginacion
            "data" => $data,
        );
        return json_encode($json_data);
    }
}
