@extends("web.plantilla")
@section("contenido")
<!-- Contact Section -->
<section id="contact" class="contact section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h1> <span class="description-title">Contactanos</span></h1>
    </div><!-- End Section Title -->

    <div class="container">
        <form action="forms/contact.php" method="post" class="" data-aos="fade-up" data-aos-delay="600">
            <div class="row gy-4">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                <div class="col-md-6">
                    <label for="txtNombre">Nombre: *</label>
                    <input type="text" name="txtNombre" id="txtNombre" class="form-control" required="">
                </div>
                <div class="col-md-6 ">
                    <label for="txtCorreo">Correo: *</label>
                    <input type="txtCorreo" class="form-control" name="txtCorreo" required="">
                </div>
                <div class="col-md-12">
                    <label for="txtTelefono">Teléfono: *</label>
                    <input type="text" class="form-control" name="txtTelefono" id="txtTelefono" required="">
                </div>
                <div class="col-md-12">
                    <label for="txtMensaje">Mensaje: *</label>
                    <textarea class="form-control" name="txtMensaje" id="txtMensaje" rows="6" required=""></textarea>
                </div>
                <div class="col-md-12 text-center py-3">
                    <button type="submit">Enviar</button>
                </div>

            </div>
        </form><!-- End Contact Form -->
    </div>
</section>
@endsection