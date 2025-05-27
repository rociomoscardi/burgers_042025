<?php

namespace App\Http\Controllers;

use App\Entidades\Cliente;
use App\Entidades\Sucursal;
use Illuminate\Http\Request;
use Session;


class ControladorWebLogin extends Controller
{
    public function index()
    {
        return view("web.login");
    }

    public function ingresar(Request $request)
    {
        $sucursal = new Sucursal();
        $aSucursales = $sucursal->obtenerTodos();

        $correo = $request->input('txtCorreo');
        $clave = $request->input('txtClave');

        $cliente = new Cliente();
        $cliente->obtenerPorCorreo($correo);
        if ($cliente->correo != "") {
            if (password_verify($clave, $cliente->clave)) {
                Session::put('idCliente', $cliente->idcliente);
                return view('web.index', compact('aSucursales'));
            } else {
                $mensaje = "Correo o contraseña incorrecto.";
                return view("web.login", compact('mensaje'));
            }
        }
    }

    public function logout(){
        Session::put("idCliente", "");

        return redirect("/");
    }
}
