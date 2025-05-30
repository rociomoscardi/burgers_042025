<?php

namespace App\Http\Controllers;

use App\Entidades\Cliente;
use Illuminate\Http\Request;
use Session;
require app_path() . '/start/constants.php';
class ControladorWebCambiarClave extends Controller
{
    public function index()
    {
        return view("web.cambiar-clave");
    }

    public function cambiar(Request $request){

        $idCliente = Session::get("idCliente");
        $cliente = new Cliente();
        $clave1 = $request->input("txtClave1");
        $claveN = $request->input("txtClaveN");

        if($clave1 != "" && $clave1 == $claveN){
            $cliente->obtenerPorId($idCliente);
            $cliente->clave = password_hash($clave1, PASSWORD_DEFAULT);
            $cliente->guardar();

            $msg["ESTADO"] = MSG_SUCCESS;
            $msg["MSG"] = "Tu contraseña se actualizó correctamente."; 
            return view ("web.cambiar-clave", compact("msg"));
        } else {
            $msg["ESTADO"] = MSG_ERROR;
            $msg["MSG"] = "Las contraseñas no coinciden."; 
            return view ("web.cambiar-clave", compact("msg"));
        }
    }
}
