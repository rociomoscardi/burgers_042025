@extends("web.plantilla")
@section("contenido")
<!-- Contact Section -->
<section id="registrarse" class="registrarse section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h1> <span class="description-title">Registrarse</span></h1>
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

        <form action="" method="post" class="" data-aos="fade-up" data-aos-delay="600">
            <div class="row gy-4">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                <div class="col-md-6">
                    <label for="txtNombre">Nombre completo: *</label>
                    <input type="text" name="txtNombre" id="txtNombre" class="form-control" required="">
                </div>
                <div class="col-md-6 ">
                    <label for="txtDni">DNI: *</label>
                    <input type="text" class="form-control" name="txtDni" id="txtDni" required="">
                </div>
                <div class="col-md-6">
                    <label for="txtTelefono">Teléfono: *</label>
                    <input type="text" class="form-control" name="txtTelefono" id="txtTelefono" required="">
                </div>
                <div class="col-md-6">
                    <label for="txtCorreo">Correo: *</label>
                    <input type="email" class="form-control" name="txtCorreo" id="txtCorreo" required="">
                </div>
                <div class="col-md-6">
                    <label for="txtMensaje">Contraseña: *</label>
                    <input type="password" class="form-control" name="txtClave" id="txtClave" required="">
                </div>
                <div class="col-md-12 text-center py-3">
                    <button type="submit">Registrarse</button>
                </div>

            </div>
        </form><!-- End Contact Form -->
    </div>
</section>
@endsection