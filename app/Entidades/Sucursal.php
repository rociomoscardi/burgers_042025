<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = 'sucursales';
    public $timestamps = false;

    protected $fillable = [
        'idsucursal',
        'nombre',
        'direccion',
        'telefono',
        'link_mapa',
        'horarios'
    ];

    public function obtenerTodos()
    {
        $sql = "SELECT
            idsucursal,
            nombre,
            direccion,
            telefono,
            link_mapa,
            horarios
            FROM sucursales ORDER BY nombre ASC";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }

    public function obtenerPorId($idSucursal)
    {
        $sql = "SELECT
            idsucursal,
            nombre,
            direccion,
            telefono,
            link_mapa,
            horarios
            FROM sucursales WHERE idsucursal = $idSucursal";
        $lstRetorno = DB::select($sql);

        if (count($lstRetorno) > 0) {
            $this->idsucursal = $lstRetorno[0]->idsucursal;
            $this->nombre = $lstRetorno[0]->nombre;
            $this->direccion = $lstRetorno[0]->direccion;
            $this->telefono = $lstRetorno[0]->telefono;
            $this->link_mapa = $lstRetorno[0]->link_mapa;
            $this->horarios = $lstRetorno[0]->horarios;
            return $this;
        }
        return null;
    }

    public function guardar()
    {
        $sql = "UPDATE sucursales SET
            nombre='$this->nombre',
            direccion='$this->direccion',
            telefono='$this->telefono',
            link_mapa='$this->link_mapa',
            horarios='$this->horarios'
            WHERE idsucursal=?";
        $affected = DB::update($sql, [$this->idsucursal]);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM sucursales WHERE
            idsucursal=?";
        $affected = DB::delete($sql, [$this->idsucursal]);
    }

    public function insertar()
    {
        $sql = "INSERT INTO sucursales (
            nombre,
            direccion,
            telefono,
            link_mapa,
            horarios
            ) VALUES (?, ?, ?, ?, ?);";
        $result = DB::insert($sql, [
            $this->nombre,
            $this->direccion,
            $this->telefono,
            $this->link_mapa,
            $this->horarios,
        ]);
        return $this->idsucursal = DB::getPdo()->lastInsertId();
    }
}
