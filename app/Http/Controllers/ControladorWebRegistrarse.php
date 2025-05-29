<?php

namespace App\Http\Controllers;

use App\Entidades\Cliente;
use Illuminate\Http\Request;

require app_path() . '/start/constants.php';


class ControladorWebRegistrarse extends Controller
{
    public function index()
    {
        return view("web.registrarse");
    }

    public function registrarse(Request $request)
    {
        $entidad = new Cliente();
        $entidad->nombre_comp = $request->input("txtNombre");
        $entidad->correo = $request->input("txtCorreo");
        $entidad->telefono = $request->input("txtTelefono");
        $entidad->dni = $request->input("txtDni");
        $entidad->clave = password_hash($request->input("txtClave"), PASSWORD_DEFAULT);

        if ($entidad->nombre_comp == "" || $entidad->correo == "" || $entidad->telefono == "" || $entidad->dni == "" || $entidad->clave == "") {
            $msg["ESTADO"] = MSG_ERROR;
            $msg["MSG"] = "Complete todos los datos.";
            return view('web.registrarse', compact('msg'));
        } else {
            $entidad->guardar();
            $mensaje = "¡Bienvenido! Ya podés iniciar sesión.";

            $entidad->insertar();
            return view('web.login', compact('mensaje'));
        }
    }
}
