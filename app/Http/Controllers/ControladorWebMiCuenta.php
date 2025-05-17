<?php

namespace App\Http\Controllers;
use App\Entidades\Cliente;
use Illuminate\Http\Request;
use Exception;
require app_path() . '/start/constants.php';

class ControladorWebMiCuenta extends Controller
{
    public function index()
    {
        $idCliente = 6;
        $cliente = new Cliente();
        $cliente->obtenerPorId($idCliente);
        return view("web.mi-cuenta", compact("cliente"));
    }

    public function guardar(Request $request){
        try {
            //Define la entidad servicio
            $titulo = "Modificar cliente";
            $entidad = new Cliente();
            $entidad->cargarDesdeRequest($request);

            //validaciones
            if ($entidad->nombre_comp == "" || $entidad->telefono == "" || $entidad->correo == "") {
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

                $_POST["id"] = $entidad->idcliente;
                return view('web.mi-cuenta', compact('msg'));
            }
        } catch (Exception $e) {
            $msg["ESTADO"] = MSG_ERROR;
            $msg["MSG"] = ERRORINSERT;
        }

        $id = $entidad->idcliente; //si da algun error al menos le deja los datos que tenía previamente
        $cliente = new Cliente();
        $cliente->obtenerPorId($id);

        return view('web.mi-cuenta', compact('msg', 'cliente')) . '?id=' . $cliente->idcliente;
    } //esto recibe los valores del formulario
}
