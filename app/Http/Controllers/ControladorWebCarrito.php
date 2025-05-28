<?php

namespace App\Http\Controllers;
use App\Entidades\Carrito;
use Illuminate\Http\Request;

require app_path() . '/start/constants.php';

class ControladorWebCarrito extends Controller
{
    public function index()
    {
        $idCarrito = 2;
        $carrito = new Carrito();
        $aCarritos = $carrito->obtenerPorId($idCarrito);
        return view("web.carrito", compact("aCarritos"));
    }


}
