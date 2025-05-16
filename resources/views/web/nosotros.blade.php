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
                      <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</span>
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                    <h3>Saul Goodman</h3>
                    <h4>Ceo &amp; Founder</h4>
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
                      <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</span>
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                    <h3>Sara Wilsson</h3>
                    <h4>Designer</h4>
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
                      <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</span>
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                    <h3>Jena Karlis</h3>
                    <h4>Store Owner</h4>
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
                      <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.</span>
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                    <h3>John Larson</h3>
                    <h4>Entrepreneur</h4>
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

    <div class="container">
      <form action="" method="post" class="php-email-form container" data-aos="fade-up" data-aos-delay="600">
        <div class="row gy-4">
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
            <button type="submit">Enviar</button>
          </div>
        </div>
      </form><!-- End Contact Form -->
  </section>

</main>
@endsection