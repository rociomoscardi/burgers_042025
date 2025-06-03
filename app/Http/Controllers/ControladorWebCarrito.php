<?php

namespace App\Http\Controllers;

use App\Entidades\Carrito;
use App\Entidades\Pedido;
use App\Entidades\Pedido_producto;
use App\Entidades\Sucursal;
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

        $sucursal = new Sucursal();
        $aSucursales = $sucursal->obtenerTodos();
        return view("web.carrito", compact("aCarritos", "aSucursales", "aCarritos"));
    }

    public function procesar(Request $request)
    {
        if (isset($_POST["btnBorrar"])) {
            return $this->eliminar($request);
        } else if (isset($_POST["btnFinalizar"])) {
            return $this->insertarPedido($request);
        }
    }

    public function eliminar(Request $request)
    {
        $idCliente = Session::get("idCliente");
        $idCarrito = $request->input("txtCarrito");
        $carrito = new Carrito();
        $carrito->idcarrito = $idCarrito;
        $carrito->eliminar();
        $resultado["err"] = EXIT_SUCCESS;
        $resultado["mensaje"] = "El producto ha sido eliminado.";

        $carrito = new Carrito();
        $aCarritos = $carrito->obtenerPorCliente($idCliente);
        $sucursal = new Sucursal();
        $aSucursales = $sucursal->obtenerTodos();

        return view("web.carrito", compact("resultado", "aCarritos", "aSucursales"));
    }

    public function insertarPedido(Request $request)
    {
        $idCliente = Session::get("idCliente");;

        $carrito = new Carrito();
        $aCarritos = $carrito->obtenerPorCliente($idCliente);
        $sucursal = new Sucursal();
        $aSucursales = $sucursal->obtenerTodos();

        $totalCarrito = 0;
        foreach ($aCarritos as $item) {
            $totalCarrito += $item->cantidad * $item->precio;
        }

        $sucursal = $request->input("lstSucursal");
        $pago = $request->input("lstPago");
        $fecha = date("Y-m-d");
        $comentario = $request->input("txtComentario");

        $pedido = new Pedido();
        $pedido->fk_idsucursal = $sucursal;
        $pedido->fk_idcliente = $idCliente;
        $pedido->fk_idestado = 4;
        $pedido->fecha = $fecha;
        $pedido->total = $totalCarrito;
        $pedido->m_pago = $pago;
        $pedido->comentario = $comentario;
        $pedido->insertar();

        $pedidoProducto = new Pedido_producto();
        foreach ($aCarritos as $item) {
            $pedidoProducto->fk_idproducto = $item->fk_idproducto;
            $pedidoProducto->fk_idpedido = $pedido->idpedido;
            $pedidoProducto->cantidad = $item->cantidad;
            $pedidoProducto->insertar();
        }

        $carrito->eliminarPorCliente($idCliente);

        $msg["ESTADO"] = MSG_SUCCESS;
        $msg["MSG"] = "Tu pedido se realizó correctamente. Ya lo podés ver en tu cuenta!";
        return view("web.carrito", compact("msg", "aCarritos", "aSucursales"));
    }

    public function actualizar(Request $request)
    {
        $cantidad = $request->input("txtCantidad");
        $carrito = new Carrito();
        $carrito->cantidad = $cantidad;
        $carrito->guardar();
        $resultado["err"] = EXIT_SUCCESS;
        $resultado["mensaje"] = "El producto ha sido actualizado.";
        return view("web.carrito", compact("resultado"));
    }
}
