@extends("web.plantilla")
@section("contenido")
<!-- Contact Section -->
<section id="mi-cuenta" class="mi-cuenta section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h1><span>Mi</span> <span class="description-title">cuenta</span></h1>
    </div><!-- End Section Title -->

    <div class="container">
        <form action="" method="post" class="" data-aos="fade-up" data-aos-delay="600">
            <div class="row gy-4">
                <div class="col-md-6">
                    <label for="txtNombre">Nombre completo: *</label>
                    <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder="" required="">
                </div>
                <div class="col-md-6 ">
                    <label for="txtCorreo">Correo: *</label>
                    <input type="txtCorreo" class="form-control" name="txtCorreo" required="">
                </div>
                <div class="col-md-6">
                    <label for="txtTelefono">Teléfono: *</label>
                    <input type="text" class="form-control" name="txtTelefono" id="txtTelefono" required="">
                </div>
                <div class="col-md-12 text-center py-3">
                    <button type="submit">Guardar</button>
                </div>
            </div>
        </form><!-- End Contact Form -->
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border" data-aos="fade-up" data-aos-delay="600">
                    <thead>
                        <th>Pedidos activos</th>
                    </thead>
                    <tbody>
                        <td>b</td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection