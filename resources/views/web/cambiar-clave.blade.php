@extends("web.plantilla")
@section("contenido")
<!-- Contact Section -->
<section id="mi-cuenta" class="mi-cuenta section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h1><span>Cambiar</span> <span class="description-title">contraseña</span></h1>
    </div><!-- End Section Title -->

    <div class="container">
        <form action="" method="post" class="" data-aos="fade-up" data-aos-delay="600">
            <div class="row gy-4">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                <div class="col-md-6 col-12 offset-md-3 py-3">
                    <label for="txtClave">Nueva contraseña: *</label>
                    <input type="password" name="txtClave" id="txtClave" class="form-control" required="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-12 offset-md-3 py-3">
                    <label for="txtClaveN">Repetir nueva contraseña: *</label>
                    <input type="password" class="form-control" name="txtClaveN" id="txtClaveN" required="">
                </div>
                <div class="col-md-12 text-center py-3">
                    <button type="submit">Guardar</button>
                </div>
            </div>
    </div>
    </form><!-- End Contact Form -->
    </div>
</section>
@endsection