<?php

namespace App\Http\Controllers;

use App\Entidades\Carrito;
use App\Entidades\Tipo_producto;
use App\Entidades\Producto;
use Illuminate\Http\Request;
use Session;

require app_path() . '/start/constants.php';

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

    public function insertar(Request $request)
    {
        $idCliente = Session::get("idCliente");
        $idProducto = $request->input("txtProducto");
        $cantidad = $request->input("txtCantidad");

        $categoria = new Tipo_producto();
        $aCategorias = $categoria->obtenerTodos();
        $producto = new Producto();
        $aProductos = $producto->obtenerTodos();

        if (isset($idCliente) && $idCliente > 0) {
            if (isset($cantidad) && $cantidad > 0) {
                $carrito = new Carrito();
                $carrito->fk_idcliente = $idCliente;
                $carrito->fk_idproducto = $idProducto;
                $carrito->cantidad = $cantidad;
                $carrito->insertar();

                $msg["ESTADO"] = MSG_SUCCESS;
                $msg["MSG"] = "El producto se ha agregado al carrito.";

                return view('web.takeaway', compact('msg', 'aCategorias', 'aProductos'));
            } else {

                $msg["ESTADO"] = MSG_ERROR;
                $msg["MSG"] = "El producto no se ha agregado al carrito.";

                return view('web.takeaway', compact('msg', 'aCategorias', 'aProductos'));
            }
        } else {
            $msg["ESTADO"] = MSG_ERROR;
            $msg["MSG"] = "Debe iniciar sesión para realizar un pedido.";

            return view('web.takeaway', compact('msg', 'aCategorias', 'aProductos'));
        }
    }
}
