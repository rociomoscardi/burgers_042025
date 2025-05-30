@extends("web.plantilla")
@section("contenido")
<!-- Contact Section -->
<section id="contact" class="contact section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h1> <span class="description-title">Carrito</span></h1>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="600">
        <div class="row">
            @if($aCarritos)
            @php $totalCarrito = 0; @endphp
            <div class="col-sm-7 col-12">
                <table class="table table-hover border" data-aos="fade-up" data-aos-delay="600">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th></th>
                        <tr></tr>
                    </thead>
                    @foreach ($aCarritos as $carrito)
                    @php $totalCarrito += $carrito->precio * $carrito->cantidad; @endphp
                    <tbody>
                        <tr>
                            <form id="form1" action="" method="post" data-aos="fade-up" data-aos-delay="600">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                                <input type="hidden" name="txtCarrito" id="txtCarrito" value="{{$carrito->idcarrito}}">
                                <td>{{$carrito->producto}}</td>
                                <td>{{$carrito->cantidad}}</td>
                                <input type="hidden" name="txtCantidad" id="txtCantidad" min="1" value="{{$carrito->cantidad}}">
                                <td>${{ number_format($carrito->precio * $carrito->cantidad, 2, ',', '.') }}</td>
                                <td> <button type="submit" name="btnBorrar" id="btnBorrar"><i class="bi bi-trash"></i></button></td>
                            </form>
                        </tr>
                    </tbody>
                    @endforeach
                    <tfoot>
                        <tr>
                            <td colspan="2" class="text-end"><strong>Total a pagar:</strong></td>
                            <td><strong>${{ number_format($totalCarrito, 2, ',', '.') }}</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-sm-5 col-12">
                <label for="lstSucursal">Sucursal donde retirará el pedido:</label><br>
                <select class="form-control" name="lstSucursal" id="lstSucursal">
                    <option selected disabled value="">Seleccionar</option>
                    @foreach ($aSucursales as $sucursal)
                    <option value="">{{ $sucursal->nombre }}</option>
                    @endforeach
                </select><br>
                <label for="lstPago">Método dede pago:</label><br>
                <select class="form-control" name="lstPago" id="lstPago">
                    <option selected disabled value="">Seleccionar</option>
                    <option value="">Efectivo</option>
                    <option value="">Mercado Pago</option>
                </select><br>
                <textarea name="txtComentario" id="txtComentario" class="form-control">Añadir comentario...</textarea><br>
                <a class="btn-getstarted px-sm-5" href="/takeaway">Continuar pedido</a>
                <button type="submit" name="btnFinalizar" id="btnFinalizar" class="px-5">Finalizar pedido</button>
            </div>
        </div>
        <div class="row d-none">
            <div class="col-12">
                <a class="btn-getstarted px-sm-5" href="/takeaway">Continuar pedido</a>
            </div>
            <div class="col-12">
                <button type="submit" class="px-5">Finalizar pedido</button>
            </div>
        </div>
        @else
        <div class="container section-title" data-aos="fade-up">
            <h2>No hay productos seleccionados.</h2><br><br><br><br><br><br><br><br>
        </div>
        @endif
    </div>

</section>
@endsection