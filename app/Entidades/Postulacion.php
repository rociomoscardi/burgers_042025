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
            FROM postulaciones WHERE idpostulacion = ?";
        $lstRetorno = DB::select($sql, [$idPostulacion]);

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

    public function cargarDesdeRequest($request) { //recibe el request del formulario y lo empieza a setear en el propio objeto
        $this->idpostulacion = $request->input('id') != "0" ? $request->input('id') : $this->idpostulacion; //esto solo va en los int, si es un string o viene o queda un string vacío
        $this->nombre = $request->input('txtNombre');
        $this->apellido = $request->input('txtApellido');
        $this->telefono = $request->input('txtTelefono');
        $this->correo = $request->input('txtCorreo');
        //$this->link_cv = $request->input('fileCV');
    }

    public function obtenerFiltrado(){
        $request = $_REQUEST;
        $columns = array(
            0 => 'nombre',
            1 => 'apellido',
            2 => 'telefono',
            3 => 'correo',
            4 => 'link_cv',
        );
        $sql = "SELECT DISTINCT
                    idpostulacion,
                    nombre,
                    apellido,
                    telefono,
                    correo,
                    link_cv
                    FROM postulaciones
                WHERE 1=1
                ";

        //Realiza el filtrado
        if (!empty($request['search']['value'])) {
            $sql .= " AND ( nombre LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR apellido LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR telefono LIKE '%" . $request['search']['value'] . "%' )";
            $sql .= " OR correo LIKE '%" . $request['search']['value'] . "%' )";
            $sql .= " OR link_cv LIKE '%" . $request['search']['value'] . "%' )";
        }
        $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];

        $lstRetorno = DB::select($sql);

        return $lstRetorno;
    }
}
