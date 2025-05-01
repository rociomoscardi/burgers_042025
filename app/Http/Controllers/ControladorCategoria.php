<?php

namespace App\Http\Controllers;

use App\Entidades\Tipo_producto;
use App\Entidades\Producto;
use App\Entidades\Sistema\Usuario;
use App\Entidades\Sistema\Patente;
use Illuminate\Http\Request;
use Exception;

require app_path() . '/start/constants.php';

class ControladorCategoria extends Controller
{

    public function nuevo()
    {
        $titulo = "Nueva categoría";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("CATEGORIAALTA")) {
                $codigo = "CATEGORIAALTA";
                $mensaje = "No tiene permisos para la operación.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                return view("sistema.categoria-nuevo", compact("titulo"));
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function index()
    {
        $titulo = "Listado de categorías";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("CATEGORIACONSULTA")) {
                $codigo = "CATEGORIACONSULTA";
                $mensaje = "No tiene permisos para la operación.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                return view("sistema.categoria-listar", compact("titulo"));
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function guardar(Request $request)
    {
        try {
            //Define la entidad servicio
            $titulo = "Modificar categoría";
            $entidad = new Tipo_producto();
            $entidad->cargarDesdeRequest($request);

            //validaciones
            if ($entidad->nombre == "") {
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

                $_POST["id"] = $entidad->idtipoproducto;
                return view('sistema.categoria-listar', compact('titulo', 'msg'));
            }
        } catch (Exception $e) {
            $msg["ESTADO"] = MSG_ERROR;
            $msg["MSG"] = ERRORINSERT;
        }

        $id = $entidad->idtipoproducto; //si da algun error al menos le deja los datos que tenía previamente
        $categoria = new Tipo_producto();
        $categoria->obtenerPorId($id);

        return view('sistema.categoria-nuevo', compact('msg', 'categoria', 'titulo')) . '?id=' . $categoria->idtipoproducto;
    }

    public function editar($id)
    {
        $titulo = "Editar categoría";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("CATEGORIAEDITAR")) {
                $codigo = "CATEGORIAEDITAR";
                $mensaje = "No tiene permisos para la operación.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $categoria = new Tipo_producto();
                $categoria->obtenerPorId($id);
                return view("sistema.categoria-nuevo", compact("titulo", "categoria"));
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function eliminar(Request $request)
    {
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("CATEGORIAELIMINAR")) {
                $resultado["err"] = EXIT_FAILURE;
                $resultado["mensaje"] = "No tiene permisos para la operación.";
            } else {
                $idCategoria = $request->input("id");
                $producto = new Producto();
                //si la categoría tiene un producto asociado no se tiene que poder borrar
                if ($producto->existeProductosPorCategoria($idCategoria)) {
                    $resultado["err"] = EXIT_FAILURE;
                    $resultado["mensaje"] = "No se puede eliminar una categoría con productos asociados.";
                } else {
                    //si no, sí
                    $categoria = new Tipo_producto();
                    $categoria->idtipoproducto = $idCategoria;
                    $categoria->eliminar();
                    $resultado["err"] = EXIT_SUCCESS; //del otro lado lo interpreta como data
                    $resultado["mensaje"] = "Registro eliminado exitosamente.";
                }
            }
        } else {
            $resultado["err"] = EXIT_FAILURE;
            $resultado["mensaje"] = "Usuario no autenticado.";
        }
        return json_encode($resultado);
    }


    public function cargarGrilla(Request $request)
    {
        $request = $_REQUEST;

        $entidad = new Tipo_producto();
        $aTiposProductos = $entidad->obtenerFiltrado();

        $data = array();
        $cont = 0;

        $inicio = $request['start'];
        $registros_por_pagina = $request['length'];


        for ($i = $inicio; $i < count($aTiposProductos) && $cont < $registros_por_pagina; $i++) {
            $row = array();
            $row[] = "<a href='/admin/categoria/" . $aTiposProductos[$i]->idtipoproducto . "'>" . $aTiposProductos[$i]->nombre . "</a>";
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
