<?php

namespace App\Http\Controllers;

use App\Entidades\Carrito;
use App\Entidades\Cliente;
use App\Entidades\Pedido;
use App\Entidades\Pedido_producto;
use App\Entidades\Sucursal;
use Illuminate\Http\Request;
use Session;

use MercadoPago\Item;
use MercadoPago\MerchantOrder;
use MercadoPago\Payer;
use MercadoPago\Payment;
use MercadoPago\Preference;
use MercadoPago\SDK;

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
        $idCliente = Session::get("idCliente");
        $idSucursal = $request->input("lstSucursal");
        $pago = $request->input("lstPago");

        if ($pago == "Mercadopago") {
            $this->procesarMercadopago($request);
        } else {

            $carrito = new Carrito();
            $aCarritos = $carrito->obtenerPorCliente($idCliente);
            $sucursal = new Sucursal();
            $aSucursales = $sucursal->obtenerTodos();

            $totalCarrito = 0;
            foreach ($aCarritos as $item) {
                $totalCarrito += $item->cantidad * $item->precio;
            }

            $fecha = date("Y-m-d");
            $comentario = $request->input("txtComentario");

            $pedido = new Pedido();
            $pedido->fk_idsucursal = $idSucursal;
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
    }

    public function procesarMercadopago(Request $request)
    {
        //Linkearlo con nuestra cuenta de MP
        $access_token = "";
        SDK::setClientId(config("payment-methods.mercadopago.client"));
        SDK::setClientSecret(config("payment-methods.mercadopago.secret"));
        SDK::setAccessToken($access_token); //Es el token de la cuenta de MP donde se va a depositar el dinero. Uno tiene que tener una cuenta comercio en MP > datos del negocio > configuración, hay una solapa "Credenciales".  

        $idCliente = Session::get("idCliente");
        $cliente = new Cliente();
        $cliente->obtenerPorId($idCliente);
        $idSucursal = $request->input("lstSucursal");
        $pago = $request->input("lstPago");

        $carrito = new Carrito();
        $aCarritos = $carrito->obtenerPorCliente($idCliente);
        $sucursal = new Sucursal();
        $aSucursales = $sucursal->obtenerTodos();

        $totalCarrito = 0;
        foreach ($aCarritos as $item) {
            $totalCarrito += $item->cantidad * $item->precio;
        }

        $fecha = date("Y-m-d");
        $comentario = $request->input("txtComentario");

        //Armado del producto 'Item'
        $item = new Item();
        $item->id = "1234";
        $item->title = "Compra en Lucy's Burgers";
        $item->category_id = "products";
        $item->quantity = 1;
        $item->unit_price = $totalCarrito;
        $item->currency_id = "ARS";

        $preference = new Preference();
        $preference->items = array($item); //acá agrega el item de arriba

        //Datos del comprador
        $payer = new Payer();
        $payer->name = $cliente->nombre_comp;
        $payer->surname = ""; //si estuviera nombre y apellido por separado acá iría $cliente->apellido
        $payer->email = $cliente->correo;
        $payer->date_created = date('Y-m-d H:m:s');
        $payer->identification = array(
            "type" => "DNI",
            "number" => $cliente->dni
        );
        $preference->payer = $payer;

        $pedido = new Pedido();
        $pedido->fk_idsucursal = $idSucursal;
        $pedido->fk_idcliente = $idCliente;
        $pedido->fk_idestado = 5;
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

        //URL de configuración para indicarle a MP
        $preference->back_urls = [ //estas rutas las inventamos nosotros
            "success" => "http://127.0.0.1:8000/mercado-pago/aprobado/" . $pedido->idpedido,
            "pending" => "http://127.0.0.1:8000/mercado-pago/pendiente/" . $pedido->idpedido, //esto es para cuando la persna lleva el efectivo a un rappi pago.
            "failure" => "http://127.0.0.1:8000/mercado-pago/error/" . $pedido->idpedido,
        ];

        $preference->payment_methods = array("installments" => 6);
        $preference->auto_return = "all";
        $preference->notification_url = '';
        $preference->save(); //ejecuta la transacción. 
    }

    /*public function actualizar(Request $request)
    {
        $cantidad = $request->input("txtCantidad");
        $carrito = new Carrito();
        $carrito->cantidad = $cantidad;
        $carrito->guardar();
        $resultado["err"] = EXIT_SUCCESS;
        $resultado["mensaje"] = "El producto ha sido actualizado.";
        return view("web.carrito", compact("resultado"));
    }*/
}
