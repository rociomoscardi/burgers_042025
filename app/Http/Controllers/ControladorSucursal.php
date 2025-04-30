<?php

namespace App\Http\Controllers;

use App\Entidades\Sucursal;
use App\Entidades\Pedido;
use Illuminate\Http\Request;
use Exception;
require app_path() . '/start/constants.php';

class ControladorSucursal extends Controller{

    public function nuevo(){
        $titulo = "Nueva sucursal";
        return view("sistema.sucursal-nuevo", compact("titulo"));
    }

    public function index (){
        $titulo = "Listado de sucursales";
        return view("sistema.sucursal-listar", compact("titulo"));
    }

    public function guardar(Request $request) {
        try {
            //Define la entidad servicio
            $titulo = "Modificar sucursal";
            $entidad = new Sucursal();
            $entidad->cargarDesdeRequest($request);

            //validaciones
            if ($entidad->nombre == "" || $entidad->direccion == "" || $entidad->telefono == "" || $entidad->link_mapa == "" || $entidad->horarios == "") {
                $msg["ESTADO"] = MSG_ERROR;
                $msg["MSG"] = "Complete todos los datos";
            } else {
                if ($_POST["id"] > 0) {
                    //Es actualizacion
                    $entidad->guardar();

                    $msg["ESTADO"] = MSG_SUCCESS;
                    $msg["MSG"] = OKINSERT;
                } else {
                    //Es nuevo
                    $entidad->insertar();

                    $msg["ESTADO"] = MSG_SUCCESS;
                    $msg["MSG"] = OKINSERT;
                }

                $_POST["id"] = $entidad->idsucursal;
                return view('sistema.sucursal-listar', compact('titulo', 'msg'));
            }
        } catch (Exception $e) {
            $msg["ESTADO"] = MSG_ERROR;
            $msg["MSG"] = ERRORINSERT;
        }
        
        $id = $entidad->idsucursal; //si da algun error al menos le deja los datos que tenía previamente
        $sucursal = new Sucursal();
        $sucursal->obtenerPorId($id);

        return view('sistema.sucursal-nuevo', compact('msg', 'sucursal', 'titulo')) . '?id=' . $sucursal->idsucursal;
    }

    public function editar($id){
        $titulo = "Editar sucursal";
        $sucursal = new Sucursal();
        $sucursal->obtenerPorId($id);
        return view("sistema.sucursal-nuevo", compact("titulo", "sucursal"));
    }

    public function eliminar(Request $request)
    {
        $idSucursal = $request->input("id");
        $pedido = new Pedido();
        //si la sucursal tiene un pedido asociado no se tiene que poder borrar
        if ($pedido->existePedidosPorSucursal($idSucursal)) {
            $resultado["err"] = EXIT_FAILURE;
            $resultado["mensaje"] = "No se puede eliminar una sucursal con pedidos asociados.";
        } else {
            //si no, sí
            $sucursal = new Sucursal();
            $sucursal->idsucursal = $idSucursal;
            $sucursal->eliminar();
            $resultado["err"] = EXIT_SUCCESS; //del otro lado lo interpreta como data
            $resultado["mensaje"] = "Registro eliminado exitosamente.";
        }
        return json_encode($resultado);
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
            $row[] = "<a href='/admin/sucursal/" . $aSucursales[$i]->idsucursal . "'>" . $aSucursales[$i]->nombre . "</a>"; 
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
