@extends("web.plantilla")
@section("contenido")
<main class="main">

  <!-- Hero Section -->
  <section id="hero" class="hero section light-background">

    <div class="container">
      <div class="row gy-4 justify-content-center justify-content-lg-between">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Sabores que abrazan.<br>Hamburguesas que conquistan.</h1>
          <p data-aos="fade-up">Disfrutamos de brindar una experiencia gastronómica única, donde calidad, ambiente y servicio se unen.</p>
        </div>
        <!--<div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
          <img src="web/img/hero1-img.png" class="img-fluid animated" alt="">
        </div>-->
      </div>
    </div>

  </section><!-- /Hero Section -->

  <!-- Contact Section -->
  <section id="contact" class="contact section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2><span>¿Dónde</span> <span class="description-title">encontrarnos?</span></h2>
      </div><!-- End Section Title -->

      <div class="mb-5">
        <iframe style="width: 100%; height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d32812.13007670153!2d-58.44297161023346!3d-34.60680587519896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcca3b4ef90cbd%3A0xa0b3812e88e88e87!2sBuenos%20Aires!5e0!3m2!1sen!2sar!4v1746494828890!5m2!1sen!2sar" frameborder="0" allowfullscreen=""></iframe>
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
              <a href="{{$sucursal->link_mapa}}" target=“_blank”> Cómo llegar </a>
            </div>
          </div>
        </div><!-- End Info Item -->
        @endforeach
      </div>
    </div>

  </section><!-- /Contact Section -->

</main>
@endsection