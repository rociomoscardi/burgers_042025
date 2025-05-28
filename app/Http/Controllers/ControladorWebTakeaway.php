<?php

namespace App\Http\Controllers;

use App\Entidades\Tipo_producto;
use App\Entidades\Producto;
use Illuminate\Http\Client\Request;
Use Session;

class ControladorWebTakeaway extends Controller
{
    public function index()
    {
        $categoria = new Tipo_producto();
        $aCategorias = $categoria->obtenerTodos();
        $producto = new Producto();
        $aProductos = $producto->obtenerTodos();
        return view("web.takeaway", compact("aCategorias", "aProductos"));
    }

    public function insertar(Request $request){
        $idCliente = Session::get("idCliente");
        $idProducto = $request->input("txtProducto");
        $cantidad = $request->input("txtCantidad");

    }
}
