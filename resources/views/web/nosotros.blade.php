@extends("web.plantilla")
@section("contenido")
<main class="main">
    <!-- About Section -->
    <section id="about" class="about section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h1><span>Sobre</span> <span class="description-title">nosotros</span></h1>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">
                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                    <img src="web/img/about.jpg" class="img-fluid mb-4" alt="">
                </div>
                <div class="col-lg-5" data-aos="fade-up" data-aos-delay="250">
                    <div class="content ps-0 ps-lg-5">
                        <p class="fst-italic">
                            En Lucy’s Burgers creemos que no hay nada más lindo que compartir una buena hamburguesa. Nacimos del amor por lo simple, lo casero y lo rico: recetas que abrazan, sabores que invitan a quedarte y un ambiente donde siempre sos bienvenido. Detrás del nombre está Lucy, nuestra gatita mimada y la inspiración de cada mordida feliz. ¡Pasá cuando quieras, siempre hay algo rico esperándote!
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle-fill"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
                            <li><i class="bi bi-check-circle-fill"></i> <span>Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
                            <li><i class="bi bi-check-circle-fill"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li>
                        </ul>
                        <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident
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
                                        <h3>Lola M.</h3>
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
                        <input type="file" name="fileCV" id="fileCV" class="form-control">
                    </div>
                    <div class="col-md-12 py-3 text-center">
                        <button type="submit" name="btnPostulacion" id="btnPostulacion">Enviar</button>
                    </div>
                </div>
            </form><!-- End Contact Form -->
    </section>

</main>
@endsection