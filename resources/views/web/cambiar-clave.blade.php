@extends("web.plantilla")
@section("contenido")
<!-- Contact Section -->
<section id="mi-cuenta" class="mi-cuenta section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h1><span>Cambiar</span> <span class="description-title">contraseña</span></h1>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="600">
        @if(isset($msg))
        <div class="row gy-4">
            <div class="col-md-6 col-12 offset-md-3 py-3">
                <div class="alert alert-{{$msg['ESTADO'] }}" role="alert">
                    {{$msg['MSG'] }}
                </div>
            </div>
        </div>
        @endif
    </div>

    <div class="container">
        <form action="" method="post" class="" data-aos="fade-up" data-aos-delay="600">
            <div class="row gy-4">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                <div class="col-md-6 col-12 offset-md-3 py-3">
                    <label for="txtClave1">Nueva contraseña: *</label>
                    <input type="password" name="txtClave1" id="txtClave1" class="form-control" required="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-12 offset-md-3 py-3">
                    <label for="txtClaveN">Repetir nueva contraseña: *</label>
                    <input type="password" class="form-control" name="txtClaveN" id="txtClaveN" required="">
                </div>
                <div class="col-md-12 text-center py-3">
                    <button type="submit" name="btnGuardar" id="btnGuardar">Guardar</button>
                </div>
            </div>
    </div>
    </form><!-- End Contact Form -->
    </div>
</section>
@endsection