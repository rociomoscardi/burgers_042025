<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Pedido_producto extends Model
{
    protected $table = 'pedidos_productos';
    public $timestamps = false;

    protected $fillable = [
        'idpedido_producto',
        'fk_idproducto',
        'fk_idpedido',
        'cantidad'
    ];

    public function obtenerTodos()
    {
        $sql = "SELECT
            idpedido_producto,
            fk_idproducto,
            fk_idpedido,
            cantidad
            FROM pedidos_productos ORDER BY idpedido_producto ASC";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }

    public function obtenerPorPedido($idPedido)
    {
        $sql = "SELECT
            P.idpedido_producto,
            P.fk_idproducto,
            P.fk_idpedido,
            P.cantidad,
            R.titulo,
            R.imagen
            FROM pedidos_productos P 
            INNER JOIN productos R ON P.fk_idproducto = R.idproducto
            INNER JOIN pedidos E ON P.fk_idpedido = E.idpedido
            WHERE P.fk_idpedido = $idPedido
            ORDER BY idpedido_producto ASC";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }

    public function obtenerPorId($idPedidoProducto)
    {
        $sql = "SELECT
            idpedido_producto,
            fk_idproducto,
            fk_idpedido,
            cantidad
            FROM pedidos_productos WHERE idpedido_producto = $idPedidoProducto";
        $lstRetorno = DB::select($sql);

        if (count($lstRetorno) > 0) {
            $this->idpedido_producto = $lstRetorno[0]->idpedido_producto;
            $this->fk_idproducto = $lstRetorno[0]->fk_idproducto;
            $this->fk_idpedido = $lstRetorno[0]->fk_idpedido;
            $this->cantidad = $lstRetorno[0]->cantidad;
            return $this;
        }
        return null;
    }

    public function guardar()
    {
        $sql = "UPDATE clientes SET
            fk_idproducto=$this->fk_idproducto,
            fk_idpedido=$this->fk_idpedido,
            cantidad=$this->cantidad,
            WHERE idpedidoproducto=?";
        $affected = DB::update($sql, [$this->idpedido_producto]);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM pedidos_productos WHERE
            idpedido_producto=?";
        $affected = DB::delete($sql, [$this->idpedido_producto]);
    }

    public function insertar()
    {
        $sql = "INSERT INTO pedidos_productos (
            fk_idproducto,
            fk_idpedido,
            cantidad
            ) VALUES (?, ?, ?);";
        $result = DB::insert($sql, [
            $this->fk_idproducto,
            $this->fk_idpedido,
            $this->cantidad,
        ]);
        return $this->idpedidoproducto = DB::getPdo()->lastInsertId();
    }
}
