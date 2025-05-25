<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    public $timestamps = false;

    protected $fillable = [
        'idproducto',
        'titulo',
        'descripcion',
        'precio',
        'cantidad',
        'imagen',
        'fk_idtipoproducto'
    ];

    public function obtenerTodos()
    {
        $sql = "SELECT
            idproducto,
            titulo,
            descripcion,
            precio,
            cantidad,
            imagen,
            fk_idtipoproducto
            FROM productos ORDER BY titulo ASC";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }

    public function obtenerPorId($idProducto)
    {
        $sql = "SELECT
            idproducto,
            titulo,
            descripcion,
            precio,
            cantidad,
            imagen,
            fk_idtipoproducto
            FROM productos WHERE idproducto = ?";
        $lstRetorno = DB::select($sql, [$idProducto]);

        if (count($lstRetorno) > 0) {
            $this->idproducto = $lstRetorno[0]->idproducto;
            $this->titulo = $lstRetorno[0]->titulo;
            $this->descripcion = $lstRetorno[0]->descripcion;
            $this->precio = $lstRetorno[0]->precio;
            $this->cantidad = $lstRetorno[0]->cantidad;
            $this->imagen = $lstRetorno[0]->imagen;
            $this->fk_idtipoproducto = $lstRetorno[0]->fk_idtipoproducto;
            return $this;
        }
        return null;
    }

    public function guardar()
    {
        $sql = "UPDATE productos SET
            titulo='$this->titulo',
            descripcion='$this->descripcion',
            precio=$this->precio,
            cantidad=$this->cantidad,
            imagen='$this->imagen',
            fk_idtipoproducto=$this->fk_idtipoproducto
            WHERE idproducto=?";
        $affected = DB::update($sql, [$this->idproducto]);
    }

    public function eliminar()
    {
        $sql = "DELETE FROM productos WHERE
            idproducto=?";
        $affected = DB::delete($sql, [$this->idproducto]);
    }

    public function insertar()
    {
        $sql = "INSERT INTO productos (
            titulo,
            descripcion,
            precio,
            cantidad,
            imagen,
            fk_idtipoproducto
            ) VALUES (?, ?, ?, ?, ?, ?);";
        $result = DB::insert($sql, [
            $this->titulo,
            $this->descripcion,
            $this->precio,
            $this->cantidad,
            $this->imagen,
            $this->fk_idtipoproducto,
        ]);
        return $this->idproducto = DB::getPdo()->lastInsertId();
    }

    public function cargarDesdeRequest($request) { //recibe el request del formulario y lo empieza a setear en el propio objeto
        $this->idproducto = $request->input('id') != "0" ? $request->input('id') : $this->idproducto; //esto solo va en los int, si es un string o viene o queda un string vacío
        $this->titulo = $request->input('txtTitulo');
        $this->descripcion = $request->input('txtDescripcion');
        $this->precio = $request->input('txtPrecio') != "0" ? $request->input('txtPrecio') : $this->precio;
        $this->cantidad = $request->input('txtCantidad');
        //$this->imagen = $request->input('archivo');
        $this->fk_idtipoproducto = $request->input('lstTipoProducto') != "0" ? $request->input('lstTipoProducto') : $this->fk_idtipoproducto;
    }

    public function obtenerFiltrado(){
        $request = $_REQUEST;
        $columns = array(
            0 => 'P.titulo',
            1 => 'C.nombre',
            2 => 'P.precio',
            3 => 'P.imagen',
        );
        $sql = "SELECT DISTINCT
                    idproducto,
                    titulo,
                    C.nombre as tipo,
                    precio,
                    imagen
                    FROM productos P
                    LEFT JOIN tipo_productos C ON C.idtipoproducto = P.fk_idtipoproducto
                WHERE 1=1
                ";

        //Realiza el filtrado
        if (!empty($request['search']['value'])) {
            $sql .= " AND ( P.titulo LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR C.nombre LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR P.precio LIKE '%" . $request['search']['value'] . "%' )";
            $sql .= " OR P.imagen LIKE '%" . $request['search']['value'] . "%' )";
        }
        $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];

        $lstRetorno = DB::select($sql);

        return $lstRetorno;
    }

    public function existeProductosPorCategoria($idCategoria){
        $sql = "SELECT
            idproducto,
            titulo,
            descripcion,
            precio,
            cantidad,
            imagen,
            fk_idtipoproducto
            FROM productos WHERE fk_idtipoproducto = $idCategoria";
        $lstRetorno = DB::select($sql);

        return (count($lstRetorno) > 0); // si es mayor que 0 me devuleve true, y si no me devuelve false 
    }
}
