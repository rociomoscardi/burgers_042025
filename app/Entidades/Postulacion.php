<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Postulacion extends Model
{
    protected $table = 'postulaciones';
    public $timestamps = false;

    protected $fillable = [
        'idpostulacion',
        'nombre',
        'apellido',
        'telefono',
        'correo',
        'link_cv'
    ];

    public function obtenerTodos()
    {
        $sql = "SELECT
                idpostulacion,
                nombre,
                apellido,
                telefono,
                correo,
                link_cv
                FROM postulaciones ORDER BY nombre ASC";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }

    public function obtenerPorId($idPostulacion)
    {
        $sql = "SELECT
                idpostulacion,
                nombre,
                apellido,
                telefono,
                correo,
                link_cv
                FROM postulaciones WHERE idpostulacion = $idPostulacion";
        $lstRetorno = DB::select($sql);

        if (count($lstRetorno) > 0) {
            $this->idpostulacion = $lstRetorno[0]->idpostulacion;
            $this->nombre = $lstRetorno[0]->nombre;
            $this->apellido = $lstRetorno[0]->apellido;
            $this->telefono = $lstRetorno[0]->telefono;
            $this->correo = $lstRetorno[0]->correo;
            $this->link_cv = $lstRetorno[0]->link_cv;
            return $this;
        }
        return null;
    }

    public function guardar()
    {
        $sql = "UPDATE postulaciones SET
            nombre='$this->nombre',
            apellido='$this->apellido',
            telefono='$this->telefono',
            correo='$this->correo',
            link_cv='$this->link_cv'
            WHERE idpostulacion=?";
        $affected = DB::update($sql, [$this->idpostulacion]);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM postulaciones WHERE
            idpostulacion=?";
        $affected = DB::delete($sql, [$this->idpostulacion]);
    }

    public function insertar()
    {
        $sql = "INSERT INTO postulaciones (
                nombre,
                apellido,
                telefono,
                correo,
                link_cv
            ) VALUES (?, ?, ?, ?, ?);";
        $result = DB::insert($sql, [
            $this->nombre,
            $this->apellido,
            $this->telefono,
            $this->correo,
            $this->link_cv,
        ]);
        return $this->idpostulacion = DB::getPdo()->lastInsertId();
    }
}
