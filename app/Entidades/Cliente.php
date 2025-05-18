<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    public $timestamps = false;

    protected $fillable = [
        'idcliente',
        'nombre_comp',
        'telefono',
        'correo',
        'dni',
        'clave'
    ];

    public function obtenerTodos()
    {
        $sql = "SELECT
                    idcliente,
                    nombre_comp,
                    telefono,
                    correo,
                    dni,
                    clave
                  FROM clientes ORDER BY nombre ASC";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }

    public function obtenerPorId($idCliente)
    {
        $sql = "SELECT
                idcliente,
                nombre_comp,
                telefono,
                correo,
                dni,
                clave
                FROM clientes WHERE idcliente = ?";
        $lstRetorno = DB::select($sql, [$idCliente]);

        if (count($lstRetorno) > 0) {
            $this->idcliente = $lstRetorno[0]->idcliente;
            $this->nombre_comp = $lstRetorno[0]->nombre_comp;
            $this->telefono = $lstRetorno[0]->telefono;
            $this->correo = $lstRetorno[0]->correo;
            $this->dni = $lstRetorno[0]->dni;
            $this->clave = $lstRetorno[0]->clave;
            return $this;
        }
        return null;
    }

    public function guardar()
    {
        $sql = "UPDATE clientes SET
            nombre='$this->nombre_comp',
            telefono='$this->telefono',
            correo='$this->correo',
            dni='$this->dni',
            clave='$this->clave'
            WHERE idcliente=?";
        $affected = DB::update($sql, [$this->idcliente]);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM clientes WHERE
            idcliente=?";
        $affected = DB::delete($sql, [$this->idcliente]);
    }

    public function insertar()
    {
        $sql = "INSERT INTO clientes (
                nombre_comp,
                telefono,
                correo,
                dni,
                clave
            ) VALUES (?, ?, ?, ?, ?, ?);";
        $result = DB::insert($sql, [
            $this->nombre_comp,
            $this->telefono,
            $this->correo,
            $this->dni,
            $this->clave,
        ]);
        return $this->idcliente = DB::getPdo()->lastInsertId();
    }

    public function cargarDesdeRequest($request) { //recibe el request del formulario y lo empieza a setear en el propio objeto
        $this->idcliente = $request->input('id') != "0" ? $request->input('id') : $this->idcliente; //esto solo va en los int, si es un string o viene o queda un string vacío
        $this->nombre_comp = $request->input('txtNombre');
        $this->telefono = $request->input('txtTelefono');
        $this->correo = $request->input('txtCorreo');
        $this->dni = $request->input('txtDni');
        $this->clave = password_hash($request->input('txtClave'), PASSWORD_DEFAULT);
    }

    public function obtenerFiltrado(){
        $request = $_REQUEST;
        $columns = array(
            0 => 'nombre_comp',
            1 => 'apellido',
            2 => 'correo',
            3 => 'dni',
            4 => 'telefono',
        );
        $sql = "SELECT DISTINCT
                    idcliente,
                    nombre_comp,
                    correo,
                    dni,
                    telefono
                    FROM clientes
                WHERE 1=1 /* siempre es verdadero */
                ";

        //Realiza el filtrado
        if (!empty($request['search']['value'])) {
            $sql .= " AND ( nombre_comp LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR correo LIKE '%" . $request['search']['value'] . "%' )";
            $sql .= " OR dni LIKE '%" . $request['search']['value'] . "%' )";
            $sql .= " OR telefono LIKE '%" . $request['search']['value'] . "%' )";
        }
        $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];

        $lstRetorno = DB::select($sql);

        return $lstRetorno;
    }
}
