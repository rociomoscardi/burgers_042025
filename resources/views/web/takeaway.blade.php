@extends("web.plantilla")
@section("contenido")

<main class="main">
    <!-- Menu Section -->
    <section id="menu" class="menu section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h1><span>Nuestro</span> <span class="description-title">menú</span></h1>
        </div><!-- End Section Title -->

        <div class="container">
            <!-- CATEGORÍAS -->
            <ul class="filters_menu nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                @php $first = true; @endphp
                @foreach ($aCategorias as $categoria)
                    <li class="nav-item">
                        <a class="nav-link {{ $first ? 'active show' : '' }}" data-bs-toggle="tab" data-bs-target="#categoria-{{ $categoria->idtipoproducto }}">
                            <h4>{{ $categoria->nombre }}</h4>
                        </a>
                    </li>
                    @php $first = false; @endphp
                @endforeach
            </ul>

            <!-- CONTENIDO DE PRODUCTOS -->
            <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
                @php $first = true; @endphp
                @foreach ($aCategorias as $categoria)
                    <div class="tab-pane fade {{ $first ? 'active show' : '' }}" id="categoria-{{ $categoria->idtipoproducto }}">
                        <div class="row gy-5">
                            @foreach ($aProductos as $producto)
                                @if ($producto->fk_idtipoproducto == $categoria->idtipoproducto)
                                    <div class="col-3 menu-item">
                                        <a href="{{ $producto->imagen }}" class="glightbox">
                                            <img src="{{ $producto->imagen }}" class="menu-img img-fluid" alt="">
                                        </a>
                                        <h4>{{ $producto->titulo }}</h4>
                                        <p class="ingredients">{{ $producto->descripcion }}</p>
                                        <p class="price">${{ $producto->precio }}</p>
                                        <div class="row">
                                            <div class="col-2 offset-2">
                                                <button type="submit"><i class="bi bi-cart4"></i></button>
                                            </div>
                                            <div class="col-2 offset-3">
                                                <p class="cantidad">{{ $producto->cantidad }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @php $first = false; @endphp
                @endforeach
            </div>

        </div>

    </section><!-- /Menu Section -->

</main>
@endsection
