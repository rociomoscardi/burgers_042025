@extends("web.plantilla")
@section("contenido")
<main class="main">

  <!-- Hero Section -->
  <section id="hero" class="hero section light-background">

    <div class="container">
      <div class="row gy-4 justify-content-center justify-content-lg-between">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Sabores que abrazan.<br>Hamburguesas que conquistan.</h1>
          <p>Disfrutamos de brindar una experiencia gastronómica única, donde calidad, ambiente y servicio se unen.</p>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
          <img src="web/img/hero1-img.webp" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- /Hero Section -->

  <!-- Contact Section -->
  <section id="contact" class="contact section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <p><span>Dónde</span> <span class="description-title">encontrarnos</span></p>
      </div><!-- End Section Title -->

      <div class="mb-5">
        <iframe style="width: 100%; height: 400px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen=""></iframe>
      </div><!-- End Google Maps -->

      <div class="row gy-4">
        @foreach ($aSucursales as $sucursal)
        <div class="col-md-6">
          <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
            <i class="icon bi bi-geo-alt flex-shrink-0"></i>
            <div>
              <h3>{{$sucursal->nombre}}</h3>
              <p>{{$sucursal->direccion}}</p>
              <p>{{$sucursal->telefono}}</p>
              <p>{{$sucursal->horarios}}</p>
              <a href="{{$sucursal->link_mapa}}" target= “_blank”> Cómo llegar </a>
            </div>
          </div>
        </div><!-- End Info Item -->
        @endforeach
      </div>
    </div>

  </section><!-- /Contact Section -->

</main>
@endsection