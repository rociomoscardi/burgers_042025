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
            <div class="col-12">
                <table class="table table-hover border" data-aos="fade-up" data-aos-delay="600">
                    <thead>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Subtotal</th>
                    </thead>
                    <tbody>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tbody>
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