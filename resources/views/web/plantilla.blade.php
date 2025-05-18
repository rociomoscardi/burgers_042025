<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Lucy's Burgers</title>
  <meta name="description" content="Disfrutamos de brindar una experiencia gastronómica única, donde calidad, ambiente y servicio se unen. Gracias a nuestros clientes, hoy seguimos creciendo...">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="web/img/logo-img-1.png" rel="icon">
  <link href="web/img/logo-img-1.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Baskervville:ital@0;1&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="web/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="web/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="web/vendor/aos/aos.css" rel="stylesheet">
  <link href="web/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="web/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="web/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Yummy
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="web/img/logo-img-1.png" alt="">
        <h1 class="sitename">Lucy's<br>Burgers</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/" class="{{ Request::is('/') ? 'active' : '' }}">Inicio<br></a></li>
          <li><a href="/takeaway" class="{{ Request::is('takeaway') ? 'active' : '' }}">Takeaway</a></li>
          <li><a href="/nosotros" class="{{ Request::is('nosotros') ? 'active' : '' }}">Nosotros</a></li>
          <li><a href="/contacto" class="{{ Request::is('contacto') ? 'active' : '' }}">Contacto</a></li>
          <li><a href="/mi-cuenta" class="{{ Request::is('mi-cuenta') ? 'active' : '' }}">Mi cuenta</a></li>
          <li><a href="/carrito" class="{{ Request::is('carrito') ? 'active' : '' }}"><i class="bi bi-cart4"></i></a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="index.html#book-a-table">Ingresar</a>

    </div>
  </header>

  @yield("contenido")

  <footer id="footer" class="footer dark-background">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 offset-2 d-flex logo">
          <img src="web/img/logo1-claro.png" alt="">
        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <div>
            <h4>Contactanos</h4>
            <p>
              <strong>Email:</strong><br><a href="mailto:lucysburgers@gmail.com">lucysburgers@gmail.com</a>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <h4>Seguinos</h4>
          <div class="social-links d-flex">
            <a href="https://x.com/desembarcocook" target="_blank" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="https://www.facebook.com/eldesembarcook" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/eldesembarcook/#" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span><strong class="px-1 sitename">Lucy's Burgers</strong></p>

    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="web/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="web/vendor/php-email-form/validate.js"></script>
  <script src="web/vendor/aos/aos.js"></script>
  <script src="web/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="web/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="web/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="web/js/main.js"></script>

  <script>
    AOS.init({
      once: true, // evita que se animen múltiples veces si volvés a hacer scroll
    });

    // Refresca AOS una vez que todo está completamente cargado
    window.addEventListener('load', () => {
      AOS.refreshHard();
    });
  </script>

@yield('scripts')

</body>

</html>