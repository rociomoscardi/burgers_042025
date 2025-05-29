@extends("web.plantilla")
@section('scripts')
<script>
    globalId = '<?php echo isset($cliente->idcliente) && $cliente->idcliente > 0 ? $cliente->idcliente : 0; ?>';
    <?php $globalId = isset($cliente->idcliente) ? $cliente->idcliente : "0"; ?>
</script>
@endsection
@section("contenido")
<div id="msg"></div>
<!-- Contact Section -->
<section id="mi-cuenta" class="mi-cuenta section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h1><span>Mi</span> <span class="description-title">cuenta</span></h1>
    </div><!-- End Section Title -->

    <div class="container">
        <form id="form1" action="" method="post" data-aos="fade-up" data-aos-delay="600">
            <div class="row gy-4">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                <input type="hidden" id="id" name="id" class="form-control" value="{{$globalId}}" required>
                <div class="col-md-6">
                    <label for="txtNombre">Nombre completo: *</label>
                    <input type="text" name="txtNombre" id="txtNombre" class="form-control" value="{{$cliente->nombre_comp}}" required="">
                </div>
                <div class="col-md-6 ">
                    <label for="txtCorreo">Correo: *</label>
                    <input type="email" class="form-control" name="txtCorreo" id="txtCorreo" value="{{$cliente->correo}}" required="">
                </div>
                <div class="col-md-6">
                    <label for="txtTelefono">Teléfono: *</label>
                    <input type="text" class="form-control" name="txtTelefono" id="txtTelefono" value="{{$cliente->telefono}}" required="">
                </div>
                <div class="col-md-12 text-center py-3">
                    <button type="submit">Guardar</button>
                </div>
            </div>
        </form><!-- End Contact Form -->
        <div class="col-md-12 text-center pb-4" data-aos="fade-up" data-aos-delay="600">
            <a href="/cambiar-clave">Cambiar contraseña</a>
        </div>
    </div>

    <div class="container">
        <div class="container section-title" data-aos="fade-up">
            <h2><span>Pedidos</span> <span class="description-title">activos</span></h2>
        </div><!-- End Section Title -->

        <div class="row">
            <div class="col-12">
                <table class="table table-hover border" data-aos="fade-up" data-aos-delay="600">
                    <thead>
                        <th>Fecha</th>
                        <th>N° pedido</th>
                        <th>Sucursal</th>
                        <th>Estado del pedido</th>
                        <th>Importe</th>
                    </thead>

                    @foreach ($aPedidos as $pedido)
                    <tbody>
                        <td>{{$pedido->fecha}}</td>
                        <td>{{$pedido->idpedido}}</td>
                        <td>{{$pedido->sucursal}}</td>
                        <td>{{$pedido->estado}}</td>
                        <td>${{number_format($pedido->total, 2, ',', '.') }}</td>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</section>
@endsection