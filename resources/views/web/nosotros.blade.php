@extends("web.plantilla")
@section("contenido")
<main class="main">

    <!-- Banner Section -->
    <section id="nosotros" class="nosotros section light-background">

        <div class="container">
            <div class="row gy-4 justify-content-center justify-content-lg-between">
                <div class="col-lg-12 order-2 order-lg-1 d-flex flex-column text-center">
                    <h1 data-aos="fade-up">Sobre nosotros.</h1>
                </div>
            </div>
        </div>

    </section><!-- /Banner Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container">

            <div class="row gy-4">
                <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="100">
                    <img src="web/img/sobre-nosotros-img.png" class="img-fluid mb-4" alt="">
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
                    <div class="content ps-0 ps-lg-5">
                        <p class="sobre_nosotros py-5">
                            En <strong> Lucy’s Burgers </strong> creemos que no hay nada más lindo que compartir una buena hamburguesa. <br> Nacimos del amor por <strong>lo simple, lo casero y lo rico:</strong>  recetas que abrazan y sabores que invitan a quedarte. <br> Detrás del nombre está Lucy, nuestra gatita mimada y la inspiración de cada mordida feliz. <br><br> Pedí através de nuestra tienda online y retira por nuestra sucursal más cercana. <br> ¡Te esperamos!
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /About Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Se dice de <span class="description-title">Lucy's Burgers</span></h2>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
                    {
                        "loop": true,
                        "speed": 600,
                        "autoplay": {
                            "delay": 5000
                        },
                        "slidesPerView": "auto",
                        "pagination": {
                            "el": ".swiper-pagination",
                            "type": "bullets",
                            "clickable": true
                        }
                    }
                </script>
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="row gy-4 justify-content-center">
                                <div class="col-lg-6">
                                    <div class="testimonial-content">
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            <span>¡La mejor sorpresa en cada pedido! Las hamburguesas siempre llegan calentitas, el pan suave y el cheddar perfectamente derretido. Todo un mimo para el paladar.</span>
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                        <h3>Nahuel M.</h3>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <img src="web/img/testimonials/testimonials-1.jpg" class="img-fluid testimonial-img" alt="">
                                </div>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="row gy-4 justify-content-center">
                                <div class="col-lg-6">
                                    <div class="testimonial-content">
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            <span>Pido todas las semanas y nunca falla: la calidad, el sabor y la presentación son impecables. ¡Se nota el amor con el que hacen cada hamburguesa!</span>
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                        <h3>Maritza P.</h3>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <img src="web/img/testimonials/testimonials-2.jpg" class="img-fluid testimonial-img" alt="">
                                </div>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="row gy-4 justify-content-center">
                                <div class="col-lg-6">
                                    <div class="testimonial-content">
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            <span>Rapidísimo, práctico y delicioso. Me encanta poder pedir online y pasar a buscar algo tan rico. Los aros de cebolla también son un golazo.</span>
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                        <h3>Silvana M.</h3>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <img src="web/img/testimonials/testimonials-3.jpg" class="img-fluid testimonial-img" alt="">
                                </div>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="row gy-4 justify-content-center">
                                <div class="col-lg-6">
                                    <div class="testimonial-content">
                                        <p>
                                            <i class="bi bi-quote quote-icon-left"></i>
                                            <span>¡Increíble experiencia desde la primera mordida! Siempre cumplen con el tiempo y el sabor es de otro planeta. Lucy’s es mi lugar de confianza.</span>
                                            <i class="bi bi-quote quote-icon-right"></i>
                                        </p>
                                        <h3>Esteban M.</h3>
                                        <div class="stars">
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <img src="web/img/testimonials/testimonials-4.jpg" class="img-fluid testimonial-img" alt="">
                                </div>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>

    </section><!-- /Testimonials Section -->

    <section id="careers" class="careers section">

        <div class="container section-title" data-aos="fade-up">
            <h2><span>Trabaja con</span> <span class="description-title">nosotros</span></h2>
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


            <form action="" method="post" class="" enctype="multipart/form-data" data-aos="fade-up" data-aos-delay="600">
                <div class="row gy-4">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                    <div class="col-md-6">
                        <label for="txtCorreo">Correo: *</label>
                        <input type="email" name="txtCorreo" id="txtCorreo" class="form-control" required="">
                    </div>
                    <div class="col-md-6 ">
                        <label for="txtNombre">Nombre y apellido: *</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control" required="">
                    </div>
                    <div class="col-md-6">
                        <label for="txtTelefono">Teléfono: *</label>
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" required="">
                    </div>
                    <div class="col-md-6">
                        <label>CV: * <small>(.pdf, .doc, .docx)</small></label><br>
                        <input type="file" name="fileCV" id="fileCV" accept=".pdf, .doc, .docx" class="form-control">
                    </div>
                    <div class="col-md-12 py-3 text-center">
                        <button type="submit" name="btnPostulacion" id="btnPostulacion">Enviar</button>
                    </div>
                </div>
            </form><!-- End Contact Form -->
    </section>

</main>
@endsection