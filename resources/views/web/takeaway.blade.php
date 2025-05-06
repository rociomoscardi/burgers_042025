@extends("web.plantilla")
@section("contenido")
<main class="main">
    <!-- Menu Section -->
    <section id="menu" class="menu section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <p><span>Nuestro</span> <span class="description-title">menú</span></p>
        </div><!-- End Section Title -->

        <div class="container">
            <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <li class="nav-item">
                    @foreach ($aCategorias as $categoria)
                    <a class="nav-link show" data-bs-toggle="tab" data-bs-target="#{{$categoria->nombre}}">
                        <h4>{{$categoria->nombre}}</h4>
                    </a>
                </li><!-- End tab nav item -->
                @endforeach
            </ul>

            <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
          
                <div class="tab-pane fade active show" id="{{$categoria->nombre}}">

                    <div class="tab-header text-center">
                    </div>

                    <div class="row gy-5">
                        @foreach ($aProductos as $producto)
                        <div class="col-3 menu-item $categoria->nombre">
                            <a href="web/img/menu/menu-item-1.png" class="glightbox"><img src="web/img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
                            <h4>{{$producto->titulo}}</h4>
                            <p class="ingredients">
                                {{$producto->descripcion}}
                            </p>
                            <p class="price">
                                {{$producto->precio}}
                            </p>
                        </div><!-- Menu Item -->
                        @endforeach
                    </div>
                    
                </div><!-- End Starter Menu Content -->

            </div>

        </div>

    </section><!-- /Menu Section -->

</main>
@endsection