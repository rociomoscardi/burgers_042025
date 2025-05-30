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
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th></th>
                    </thead>
                    @foreach ($aCarritos as $carrito)
                    @php $totalCarrito += $carrito->precio * $carrito->cantidad; @endphp
                    <tbody>
                        <td>{{$carrito->producto}}</td>
                        <td>{{$carrito->cantidad}}</td>
                        <td>${{ number_format($carrito->precio * $carrito->cantidad, 2, ',', '.') }}</td>
                        <td><a href="" class="btn btn-danger"><i class="bi bi-trash"></i></a></td>
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
            @else
            <div class="container section-title" data-aos="fade-up">
                <h2>No hay productos seleccionados.</h2>
            </div>
            @endif
        </div>

    </div>


</section>
@endsection