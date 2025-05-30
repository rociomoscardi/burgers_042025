<?php

namespace App\Http\Controllers;
use App\Entidades\Carrito;
use Illuminate\Http\Request;
use Session;

require app_path() . '/start/constants.php';

class ControladorWebCarrito extends Controller
{
    public function index()
    {
        $idCarrito = 2;
        $carrito = new Carrito();
        $aCarritos = $carrito->obtenerPorId($idCarrito);

        $idCliente = Session::get("idCliente");
        $aCarritos = $carrito->obtenerPorCliente($idCliente);

        return view("web.carrito", compact("aCarritos"));
    }


}
