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
            FROM sucursales WHERE idsucursal = ?";
        $lstRetorno = DB::select($sql, [$idSucursal]);

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

    /*public function guardar()
    {
        $sql = "UPDATE sucursales SET
            nombre='$this->nombre',
            direccion='$this->direccion',
            telefono='$this->telefono',
            link_mapa='$this->link_mapa',
            horarios='$this->horarios'
            WHERE idsucursal=?";
        $affected = DB::update($sql, [$this->idsucursal]);
    }*/
    public function guardar() {
        $affected = \DB::update("UPDATE sucursales SET 
                nombre = ?, 
                direccion = ?, 
                telefono = ?, 
                link_mapa = ?, 
                horarios = ? 
                WHERE idsucursal = ?", [
            $this->nombre,
            $this->direccion,
            $this->telefono,
            $this->link_mapa,
            $this->horarios,
            $this->idsucursal
        ]);
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

    public function cargarDesdeRequest($request) { //recibe el request del formulario y lo empieza a setear en el propio objeto
        $this->idsucursal = $request->input('id') != "0" ? $request->input('id') : $this->idsucursal; //esto solo va en los int, si es un string o viene o queda un string vacío
        $this->nombre = $request->input('txtNombre');
        $this->direccion = $request->input('txtDireccion');
        $this->telefono = $request->input('txtTelefono');
        $this->link_mapa = $request->input('txtMapa');
        $this->horarios = $request->input('txtHorarios');
    }

    public function obtenerFiltrado(){
        $request = $_REQUEST;
        $columns = array(
            0 => 'nombre',
            1 => 'direccion',
            2 => 'link_mapa',
            3 => 'telefono',
            4 => 'horarios',
        );
        $sql = "SELECT DISTINCT
                    idsucursal,
                    nombre,
                    direccion,
                    link_mapa,
                    telefono,
                    horarios
                    FROM sucursales
                WHERE 1=1
                ";

        //Realiza el filtrado
        if (!empty($request['search']['value'])) {
            $sql .= " AND ( nombre LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR direccion LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR link_mapa LIKE '%" . $request['search']['value'] . "%' )";
            $sql .= " OR telefono LIKE '%" . $request['search']['value'] . "%' )";
            $sql .= " OR horarios LIKE '%" . $request['search']['value'] . "%' )";
        }
        $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];

        $lstRetorno = DB::select($sql);

        return $lstRetorno;
    }
}
