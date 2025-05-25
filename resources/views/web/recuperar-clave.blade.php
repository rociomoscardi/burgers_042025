@extends("web.plantilla")
@section("contenido")
<!-- Contact Section -->
<section id="login" class="login section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h1>Recuperar <span class="description-title">contraseña</span></h1>
    </div><!-- End Section Title --><br>

    <div class="container" data-aos="fade-up" data-aos-delay="600">
      <div class="row">
        <div class="col-12 offset-3">
            <p>Te enviaremos una nueva contraseña al mail que ingreses a continuación:</p>
        </div>
      </div>
        <form action="" method="post" class="" data-aos="fade-up" data-aos-delay="600">
            <div class="row gy-4">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                <div class="col-md-6 col-12 offset-md-3 py-3">
                    <label for="txtCorreo">Correo: *</label>
                    <input type="email" name="txtCorreo" id="txtCorreo" class="form-control" required="">
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" name="btnIngresar" id="btnIngresar">Ingresar</button>
                </div>
            </div><br><br><br>
            </div>
        </form><!-- End Contact Form -->
    </div>

</section>
@endsection