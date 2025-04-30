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
        'fk_idestado'
    ];

    public function obtenerTodos()
    {
        $sql = "SELECT
            idpedido,
            fecha,
            total,
            fk_idsucursal,
            fk_idcliente,
            fk_idestado
            FROM pedidos ORDER BY fecha DESC";
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
            fk_idestado
            FROM pedidos WHERE idpedido = ?";
        $lstRetorno = DB::select($sql, [$idPedido]);

        if (count($lstRetorno) > 0) {
            $this->idpedido = $lstRetorno[0]->idpedido;
            $this->fecha = $lstRetorno[0]->fecha;
            $this->total = $lstRetorno[0]->total;
            $this->fk_idsucursal = $lstRetorno[0]->fk_idsucursal;
            $this->fk_idcliente = $lstRetorno[0]->fk_idcliente;
            $this->fk_idestado = $lstRetorno[0]->fk_idestado;
            return $this;
        }
        return null;
    }

    public function guardar()
    {
        $sql = "UPDATE pedidos SET
            fecha='$this->fecha',
            total=$this->total,
            fk_idsucursal=$this->fk_idsucursal,
            fk_idcliente=$this->fk_idcliente,
            fk_idestado=$this->fk_idestado
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
            fk_idestado
            ) VALUES (?, ?, ?, ?, ?);";
        $result = DB::insert($sql, [
            $this->fecha,
            $this->total,
            $this->fk_idsucursal,
            $this->fk_idcliente,
            $this->fk_idestado,
        ]);
        return $this->idpedido = DB::getPdo()->lastInsertId();
    }

    public function cargarDesdeRequest($request) { //recibe el request del formulario y lo empieza a setear en el propio objeto
        $this->idpedido = $request->input('id') != "0" ? $request->input('id') : $this->idpedido; //esto solo va en los int, si es un string o viene o queda un string vacío
        $this->fecha = $request->input('txtFecha');
        $this->total = $request->input('txtTotal')!= "0" ? $request->input('txtTotal') : $this->total;
        $this->fk_idsucursal = $request->input('lstSucursal') != "0" ? $request->input('lstSucursal') : $this->fk_idsucursal;
        $this->fk_idcliente = $request->input('lstCliente') != "0" ? $request->input('lstCliente') : $this->fk_idcliente;
        $this->fk_idestado = $request->input('lstEstado') != "0" ? $request->input('lstEstado') : $this->fk_idestado;
    }

    public function obtenerFiltrado(){
        $request = $_REQUEST;
        $columns = array(
            0 => 'P.idpedido',
            1 => 'S.nombre',
            2 => 'C.apellido',
            3 => 'P.fecha',
            4 => 'P.total',
        );
        $sql = "SELECT DISTINCT
                    P.idpedido,
                    S.nombre as sucursal,
                    C.apellido as cliente,
                    P.fecha,
                    P.total
                    FROM pedidos P
                    INNER JOIN sucursales S ON S.idsucursal = P.fk_idsucursal
                    INNER JOIN clientes C ON C.idcliente = P.fk_idcliente
                WHERE 1=1
                ";

        //Realiza el filtrado
        if (!empty($request['search']['value'])) {
            $sql .= " AND ( S.nombre LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR C.apellido LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR P.fecha LIKE '%" . $request['search']['value'] . "%' )";
            $sql .= " OR P.total LIKE '%" . $request['search']['value'] . "%' )";
        }
        $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];

        $lstRetorno = DB::select($sql);

        return $lstRetorno;
    }

    public function existePedidosPorCliente($idCliente){
        $sql = "SELECT
            idpedido,
            fecha,
            total,
            fk_idsucursal,
            fk_idcliente,
            fk_idestado
            FROM pedidos WHERE fk_idcliente = $idCliente";
        $lstRetorno = DB::select($sql);

        return (count($lstRetorno) > 0); // si es mayor que 0 me devuleve true, y si no me devuelve false 
    }
    
    public function existePedidosPorSucursal($idSucursal){
        $sql = "SELECT
            idpedido,
            fecha,
            total,
            fk_idsucursal,
            fk_idcliente,
            fk_idestado
            FROM pedidos WHERE fk_idsucursal = $idSucursal";
        $lstRetorno = DB::select($sql);

        return (count($lstRetorno) > 0); // si es mayor que 0 me devuleve true, y si no me devuelve false 
    }
}
