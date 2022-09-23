    <!-- INDEX-->
    <!-- Page Content-->
    <!-- Main Slider-->
    <div id="wrapper_body">
    <section class="hero-slider" style="background-image: url(img/hero-slider/main-bg.jpg);">
      <div class="owl-carousel large-controls dots-inside" data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: true, &quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 7000 }">

        <div class="item">
          <div class="container padding-top-3x">
            <div class="row justify-content-center align-items-center">
              <div class="col-lg-5 col-md-6 padding-bottom-2x text-md-left text-center">
                <div class="from-bottom">
                  <img class="d-inline-block w-150 mb-3" src="{{ asset('img/hero-slider/logo03.png') }}" alt="Motorola">
                  <div class="h2 text-body mb-2 pt-1">
                    Artista Javier Venegas
                  </div>
                  <div class="h2 text-body mb-4 pb-1">
                    Obra de arte por solo <span class="text-medium">{{ number_format(799, 2, '.', ' ') }} MXM</span>
                  </div>
                </div>
                <a class="btn btn-primary scale-up delay-1" href="{{ route('products') }}">
                  Ver <i class="icon-arrow-right"></i>
                </a>
              </div>
              <div class="col-md-6 padding-bottom-2x mb-3">
                  <img class="d-block mx-auto" src="{{ asset('img/hero-slider/03.png') }}" alt="Moto 360">
              </div>
            </div>
          </div>
        </div>

        <div class="item">
          <div class="container padding-top-3x">
            <div class="row justify-content-center align-items-center">
              <div class="col-lg-5 col-md-6 padding-bottom-2x text-md-left text-center">
                <div class="from-bottom">
                  <img class="d-inline-block w-150 mb-3" src="{{ asset('img/hero-slider/logo01.png') }}" alt="Sony">
                  <div class="h2 text-body mb-2 pt-1">
                    Artista Alessandra Puentes
                  </div>
                  <div class="h2 text-body mb-4 pb-1">
                   Obra de arte por solo <span class="text-medium">{{ number_format(2599, 2, '.', ' ') }} MXM</span>
                  </div>
                </div>
                <a class="btn btn-primary scale-up delay-1" href="{{ route('products') }}">
                  Ver <i class="icon-arrow-right"></i>
                </a>
              </div>
              <div class="col-md-6 padding-bottom-2x mb-3">
                  <img class="d-block mx-auto" src="{{ asset('img/hero-slider/01.png') }}" alt="Chuck Taylor All Star II">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Top Categories/Deals-->
    <section class="container padding-top-3x padding-bottom-2x">
      <div class="row">
        @foreach($cate_welcome as $categoria)
        <div class="col-lg-4 col-sm-6">
          <div class="card border-0 bg-secondary mb-30">
            <div class="card-body d-table w-100">
              <div class="d-table-cell align-middle">
                <img class="d-block w-100" src="{{ asset('uploads/categorias/' . $categoria->imagen_referencia) }}" alt="Image">
              </div>

              <div class="d-table-cell align-middle pl-2">
                <h3 class="h6 text-thin">
                  {{ $categoria->descripcion }} <br><strong>Y más...</strong>
                </h3>

                <h4 class="h6 d-table w-100 text-thin">
                  <span class="d-table-cell align-bottom" style="line-height: 1.2;">CON<br>EL&nbsp;</span><span class="d-table-cell align-bottom h1 text-medium">30%</span><span class="d-table-cell align-bottom">&nbsp;dcto.</span>
                </h4>

                <a class="text-decoration-none" href="{{ route('products-categorie' , $categoria->idcategoria) }}">
                  Ver <i class="icon-chevron-right d-inline-block align-middle text-lg"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </section>

    <!-- Featured Products-->
    <section class="container padding-bottom-2x mb-2">
      <h2 class="h3 pb-3 text-center">
        Arte destacado
      </h2>

      <!-- Un producto por categoría -->
      <div class="row">
        @foreach($products as $product)
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="product-card mb-30">
            <a class="product-thumb" href="{{ route('product-detail' , $product->idproducto) }}">
              <img src="{{ asset('uploads/' . $product->imagen) }}" alt="Product">
            </a>
            <div class="product-card-body">
              <div class="product-category">
                <a href="{{ route('products-categorie' , $product->categoriaid) }}">
                  {{ $product->categoria }}
                </a>
              </div>

              <h3 class="product-title">
                <a href="{{ route('product-detail' , $product->idproducto) }}">
                  {{ $product->nombre }}
                </a>
              </h3>

              <h4 class="product-price">
                {{ number_format($product->precio, 2, '.', ' ') }} MXM
              </h4>
            </div>

            <div class="product-button-group">
              <a class="product-button btn_addcart_products" href="#" data-idproducto="{{ $product->idproducto }}" data-cantidad="1">
                <i class="icon-shopping-cart"></i><span>Agregar al carrito</span>
              </a>
            </div>

          </div>
        </div>
        @endforeach
      </div>

      <div class="text-center">
        <a class="btn btn-outline-secondary" href="{{ route('products') }}">
          Ver todos los productos
        </a>
      </div>
    </section>

    <!-- Servicios-->
    <section class="container padding-bottom-2x">
      <div class="row">
         <div class="col-md-3 col-sm-6 text-center mb-30">
          <img class="d-block w-90 img-thumbnail rounded mx-auto mb-4" src="{{ asset('img/services/01.png') }}" alt="Shipping">
          <h6 class="mb-2">
            Envíos económicos a cualquier estado de México
          </h6>
          <p class="text-sm text-muted mb-0">
            Envíos desde 100.00 MXM
          </p>
        </div> 

         <div class="col-md-3 col-sm-6 text-center mb-30">
          <img class="d-block w-90 img-thumbnail rounded mx-auto mb-4" src="{{ asset('img/services/02.png') }}" alt="Money Back">
          <h6 class="mb-2">
            Garantía de devolución del dinero
          </h6>
          <p class="text-sm text-muted mb-0">
            Devolvemos el dinero en 30 días
          </p>
        </div> 

        <div class="col-md-3 col-sm-12 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded mx-auto mb-4" src="{{ asset('img/services/03.png') }}" alt="Support">
          <h6 class="mb-2">Atención al cliente 24/7</h6>
          <p class="text-sm text-muted mb-0">Atención al cliente amigable las 24 horas, los 7 días de la semana</p>
        </div>

        <div class="col-md-3 col-sm-12 text-center mb-30">
          <img class="d-block w-90 img-thumbnail rounded mx-auto mb-4" src="{{ asset('img/services/04.png') }}" alt="Payment">
          <h6 class="mb-2">
            Pago seguro en línea
          </h6>
          <p class="text-sm text-muted mb-0">
            Poseemos SSL / Certificado seguro
          </p>
        </div>
      </div>
    </section>
    </div>
    <script src="{{ asset('js/modulos/products_cart.js?' . config('app.version')) }}"></script>