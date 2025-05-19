@extends('plantilla')
@section('titulo', "$titulo")
@section('scripts')
<script>
    globalId = '<?php echo isset($pedido->idpedido) && $pedido->idpedido > 0 ? $pedido->idpedido : 0; ?>';
    <?php $globalId = isset($pedido->idpedido) ? $pedido->idpedido : "0"; ?>
</script>
@endsection
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin/home">Inicio</a></li>
    <li class="breadcrumb-item"><a href="/admin/pedidos">Pedidos</a></li>
    <li class="breadcrumb-item active">Modificar</li>
</ol>
<ol class="toolbar">
    <li class="btn-item"><a title="Nuevo" href="/admin/pedido/nuevo" class="fa fa-plus-circle" aria-hidden="true"><span>Nuevo</span></a></li>
    <li class="btn-item"><a title="Guardar" href="#" class="fa fa-floppy-o" aria-hidden="true" onclick="javascript: $('#modalGuardar').modal('toggle');"><span>Guardar</span></a>
    </li>
    @if($globalId > 0)
    <li class="btn-item"><a title="Guardar" href="#" class="fa fa-trash-o" aria-hidden="true" onclick="javascript: $('#mdlEliminar').modal('toggle');"><span>Eliminar</span></a></li>
    @endif
    <li class="btn-item"><a title="Salir" href="#" class="fa fa-arrow-circle-o-left" aria-hidden="true" onclick="javascript: $('#modalSalir').modal('toggle');"><span>Salir</span></a></li>
</ol>
<script>
    function fsalir() {
        location.href = "/admin/sistema/menu";
    }
</script>
@endsection
@section('contenido')
<?php
if (isset($msg)) {
    echo '<div id = "msg"></div>';
    echo '<script>msgShow("' . $msg["MSG"] . '", "' . $msg["ESTADO"] . '")</script>';
}
?>
<div id = "msg"></div>
<div class="panel-body">
    <form id="form1" method="POST">
        <div class="row">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
            <input type="hidden" id="id" name="id" class="form-control" value="{{$globalId}}" required>
            <div class="form-group col-lg-6">
                <label>Fecha: *</label>
                <input type="date" id="txtFecha" name="txtFecha" class="form-control" value="{{$pedido->fecha ?? ''}}" required>
            </div>
            <div class="form-group col-lg-6">
                <label>Sucursal: *</label>
                <select class="form-control" name="lstSucursal" id="lstSucursal">
                    <option selected disabled value="">Seleccionar</option>
                    @foreach ($aSucursales as $sucursal)
                    @if (isset($pedido->fk_idsucursal) && $pedido->fk_idsucursal == $sucursal->idsucursal)
                    <option selected value="{{ $sucursal->idsucursal }}">{{ $sucursal->nombre }}</option>
                    @else
                    <option value="{{ $sucursal->idsucursal }}">{{ $sucursal->nombre }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group col-lg-6">
                <label>Cliente: *</label>
                <select class="form-control" name="lstCliente" id="lstCliente">
                    <option selected disabled value="">Seleccionar</option>
                    @foreach ($aClientes as $cliente)
                    @if (isset($pedido->fk_idcliente) && $pedido->fk_idcliente == $cliente->idcliente)
                    <option selected value="{{ $cliente->idcliente }}">{{ $cliente->nombre_comp }}</option>
                    @else
                    <option value="{{ $cliente->idcliente }}">{{ $cliente->nombre_comp }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group col-lg-6">
                <label>Estado del pedido: *</label>
                <select class="form-control" name="lstEstado" id="lstEstado">
                    <option selected disabled value="">Seleccionar</option>
                    @foreach ($aEstados as $estado)
                    @if (isset($pedido->fk_idestado) && $pedido->fk_idestado == $estado->idestado)
                    <option selected value="{{ $estado->idestado }}">{{ $estado->nombre }}</option>
                    @else
                    <option value="{{ $estado->idestado }}">{{ $estado->nombre }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group col-lg-6">
                <label>Total: *</label>
                <input type="text" name="txtTotal" id="txtTotal" class="form-control" value="{{$pedido->total ?? ''}}" placeholder="$0,00" required>
            </div>
        </div>
    </form>
</div>

<script>
    //agarra el modal de boostrap y genera el submit cuando se pudo que sí.
    $("#form1").validate();

    function guardar() {
        if ($("#form1").valid()) {
            modificado = false;
            form1.submit();
        } else {
            $("#modalGuardar").modal('toggle');
            msgShow("Corrija los errores e intente nuevamente.", "danger");
            return false;
        }
    }

    function eliminar() {
        $.ajax({
            type: "GET",
            url: "{{ asset('admin/pedido/eliminar') }}",
            data: { id:globalId },
            async: true,
            dataType: "json",
            success: function (data) {
                if (data.err = 0) {
                    msgShow(data.mensaje, "danger");
                    $("#btnEnviar").hide();
                    $("#btnEliminar").hide();
                    $('#mdlEliminar').modal('toggle');
                } else {
                    msgShow(data.mensaje, "success");
                    $('#mdlEliminar').modal('toggle');
                }
            }
        });
    }
</script>
@endsection