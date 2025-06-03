<?php

namespace App\Http\Controllers;

use App\Entidades\Carrito;
use App\Entidades\Pedido;
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
            $this->eliminar($request);
        } else if (isset($_POST["btnFinalizar"])) {
            $this->insertarPedido($request);
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

        return view("web.carrito", compact("resultado", "aCarritos"));
    }

    public function insertarPedido(Request $request)
    {
        $idCliente = Session::get("idCliente");;
        
        $carrito = new Carrito();
        $aCarritos = $carrito->obtenerPorCliente($idCliente);

        $totalCarrito = 0;
        foreach ($aCarritos as $carrito){
            $totalCarrito += $carrito->cantidad * $carrito->precio;
        }

        $sucursal = $request->input("lstSucursal");
        $pago = $request->input("lstPago");
        $fecha = date("Y-m-d");

        $pedido = new Pedido();
        $pedido->fk_idsucursal = $sucursal;
        $pedido->fk_idcliente = $idCliente;
        $pedido->fk_idestado = 4;
        $pedido->fecha = $fecha;
        $pedido->total = $totalCarrito;
        

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
