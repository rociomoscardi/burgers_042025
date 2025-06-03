<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = 'carritos';
    public $timestamps = false;

    protected $fillable = [
        'idcarrito',
        'fk_idcliente',
        'fk_idproducto',
        'cantidad'
    ];
    protected $hidden = [];
    private $producto;
    private $precio;
    private $imagen;

    public function obtenerTodos()
    {
        $sql = "SELECT
            idcarrito,
            fk_idcliente,
            fk_idproducto,
            cantidad
            FROM carritos ORDER BY fk_idcliente ASC";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }

    public function obtenerPorId($idCarrito)
    {
        $sql = "SELECT
            idcarrito,
            fk_idcliente,
            fk_idproducto,
            cantidad
            FROM carritos WHERE idcarrito = $idCarrito";
        $lstRetorno = DB::select($sql);

        if (count($lstRetorno) > 0) {
            $this->idcarrito = $lstRetorno[0]->idcarrito;
            $this->fk_idcliente = $lstRetorno[0]->fk_idcliente;
            $this->fk_idproducto = $lstRetorno[0]->fk_idproducto;
            $this->cantidad = $lstRetorno[0]->cantidad;
            return $this;
        }
        return null;
    }

    public function obtenerPorCliente($idCliente)
    {
        $sql = "SELECT
            C.idcarrito,
            C.fk_idcliente,
            C.fk_idproducto,
            C.cantidad,
            P.titulo AS producto,
            P.precio
            FROM carritos C
            INNER JOIN productos P ON C.fk_idproducto = P.idproducto
            WHERE fk_idcliente = $idCliente";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }

    public function guardar()
    {
        $sql = "UPDATE clientes SET
            fk_idcliente=$this->fk_idcliente,
            fk_idproducto=$this->fk_idproducto,
            cantidad=$this->cantidad,
            WHERE idcarrito=?";
        $affected = DB::update($sql, [$this->idcarrito]);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM carritos WHERE
            idcarrito=?";
        $affected = DB::delete($sql, [$this->idcarrito]);
    }

    public function eliminarPorCliente($idCliente)
    {
        $sql = "DELETE FROM carritos WHERE
            fk_idcliente=?";
        $affected = DB::delete($sql, [$this->$idCliente]);
    }

    public function insertar()
    {
        $sql = "INSERT INTO carritos (
            fk_idcliente,
            fk_idproducto,
            cantidad
            ) VALUES (?, ?, ?);";
        $result = DB::insert($sql, [
            $this->fk_idcliente,
            $this->fk_idproducto,
            $this->cantidad,
        ]);
        return $this->idcarrito = DB::getPdo()->lastInsertId();
    }
}
