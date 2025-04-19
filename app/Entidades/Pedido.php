<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    public $timestamps = true;

    protected $fillable = [
        'idpedido',
        'fecha',
        'total',
        'fk_idsucursal',
        'fk_idcliente',
        'fk_idestado',
        'fk_idpedidoproducto'
    ];

    public function obtenerTodos()
    {
        $sql = "SELECT
                  idpedido,
                  fecha,
                  total,
                  fk_idsucursal,
                  fk_idcliente,
                  fk_idestado,
                  fk_idpedidoproducto
                  FROM pedidos ORDER BY idpedido ASC";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }

    public function obtenerPorId($idPedido)
    {
        $sql = "SELECT
                  idpedido,
                  fecha,
                  total,
                  fk_idsucursal,
                  fk_idcliente,
                  fk_idestado,
                  fk_idpedidoproducto
                FROM pedidos WHERE idpedido = $idPedido";
        $lstRetorno = DB::select($sql);

        if (count($lstRetorno) > 0) {
            $this->idpedido = $lstRetorno[0]->idpedido;
            $this->fecha = $lstRetorno[0]->fecha;
            $this->total = $lstRetorno[0]->total;
            $this->fk_idsucursal = $lstRetorno[0]->fk_idsucursal;
            $this->fk_idcliente = $lstRetorno[0]->fk_idcliente;
            $this->fk_idestado = $lstRetorno[0]->fk_idestado;
            $this->fk_idpedidoproducto = $lstRetorno[0]->fk_idpedidoproducto;
            return $this;
        }
        return null;
    }

    public function guardar()
    {
        $sql = "UPDATE pedidos SET
            fecha=$this->fecha
            total=$this->total
            fk_idsucursal=$this->fk_idsucursal
            fk_idcliente=$this->fk_idcliente
            fk_idestado=$this->fk_idestado
            fk_idpedidoproducto=$this->fk_idpedidoproducto
            WHERE idpedido=?";
        $affected = DB::update($sql, [$this->idpedido]);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM pedidos WHERE
            idpedido=?";
        $affected = DB::delete($sql, [$this->idpedido]);
    }

    public function insertar()
    {
        $sql = "INSERT INTO pedidos (
                  fecha,
                  total,
                  fk_idsucursal,
                  fk_idcliente,
                  fk_idestado,
                  fk_idpedidoproducto
            ) VALUES (?, ?, ?, ?, ?, ?, ?);";
        $result = DB::insert($sql, [
            $this->fecha,
            $this->total,
            $this->fk_idsucursal,
            $this->fk_idcliente,
            $this->fk_idestado,
            $this->fk_idpedidoproducto,
        ]);
        return $this->idpedido = DB::getPdo()->lastInsertId();
    }
}
