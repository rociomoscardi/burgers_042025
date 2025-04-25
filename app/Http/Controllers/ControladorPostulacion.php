<?php

namespace App\Http\Controllers;
use App\Entidades\Postulacion;
use Illuminate\Http\Request;
class ControladorPostulacion extends Controller{

    public function nuevo(){
        $titulo = "Nueva postulación";
        return view("sistema.postulacion-nuevo", compact("titulo"));
    }

    public function index(){
        $titulo = "Listado de postulaciones";
        return view("sistema.postulacion-listar", compact("titulo"));
    }

    public function cargarGrilla(Request $request){
        $request = $_REQUEST;

        $entidad = new Postulacion();
        $aPostulacion = $entidad->obtenerFiltrado();

        $data = array();
        $cont = 0;

        $inicio = $request['start'];
        $registros_por_pagina = $request['length'];


        for ($i = $inicio; $i < count($aPostulacion) && $cont < $registros_por_pagina; $i++) {
            $row = array();
            $row[] = "<a href='/admin/postulacion" . $aPostulacion[$i]->idpostulacion . "'>" . $aPostulacion[$i]->nombre . "</a>"; 
            $row[] = $aPostulacion[$i]->apellido;
            $row[] = $aPostulacion[$i]->telefono;
            $row[] = $aPostulacion[$i]->correo;
            $row[] = "<a href= ''> Descargar </a>";
            $cont++;
            $data[] = $row;
        }

        $json_data = array(
            "draw" => intval($request['draw']),
            "recordsTotal" => count($aPostulacion), //cantidad total de registros sin paginar
            "recordsFiltered" => count($aPostulacion), //cantidad total de registros en la paginacion
            "data" => $data,
        );
        return json_encode($json_data);
    }
}
