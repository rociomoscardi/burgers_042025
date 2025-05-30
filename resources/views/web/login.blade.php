@extends("web.plantilla")
@section("contenido")
<!-- Contact Section -->
<section id="login" class="login section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h1> <span class="description-title">Ingresar</span></h1>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="600">
        @if(isset($mensaje))
        <div class="row gy-4">
            <div class="col-md-6 col-12 offset-md-3 py-3">
                <div class="alert alert-danger" role="alert">
                    {{$mensaje}}
                </div>
            </div>
        </div>
        @endif
        <form action="" method="post" class="" data-aos="fade-up" data-aos-delay="600">
            <div class="row gy-4">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                <div class="col-md-6 col-12 offset-md-3 py-3">
                    <label for="txtCorreo">Correo: *</label>
                    <input type="email" name="txtCorreo" id="txtCorreo" class="form-control" required="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-12 offset-md-3 py-3">
                    <label for="txtClave">Contraseña: *</label>
                    <input type="password" class="form-control" name="txtClave" id="txtClave" required="">
                </div>
                <div class="col-md-12 text-center py-3">
                    <button type="submit" name="btnIngresar" id="btnIngresar">Ingresar</button>
                </div>
                <div class="col-md-12 text-center pt-3">
                    <a href="/registrarse">¿Aún no tenes una cuenta? ¡Registrate!</a>
                </div>
                <div class="col-md-12 text-center py-2">
                    <a href="/recuperar-clave">Olvide mi contraseña</a>
                </div>
            </div>
        </form><!-- End Contact Form -->
    </div>

</section>
@endsection