  <div id="wrapper_body">
    <div class="page-title">
      <div class="container">
        <div class="column">
          <h1>
            Detalle producto
          </h1>
        </div>
      </div>
    </div> 

    <!-- Page Content-->
    <div class="container padding-bottom-3x">
      <div class="row">
        <!-- Poduct Gallery-->
        <div class="col-md-6">
          <div class="product-gallery">
            <div class="gallery-wrapper">
              <div class="gallery-item video-btn text-center"></div>
            </div>
            <!-- Imagenes grandes -->
            <div class="product-carousel owl-carousel gallery-wrapper">
              @foreach($images_product as $index => $imagen)
              <div class="gallery-item" data-hash="{{ $index }}">
                <a href="{{ asset('uploads/' . $imagen->imagen) }}" data-size="1000x667">
                  <img src="{{ asset('uploads/' . $imagen->imagen) }}" alt="Product">
                </a>
              </div>
              @endforeach  
            </div>
            <!-- Fin imagenes grandes -->

            <!-- Imagenes Pequeñas -->
            <!-- <ul class="product-thumbnails">
              @foreach($images_product as $index => $imagen)
              <li class="active">
                <a href="#{{$index}}">
                  <img src="{{ asset('uploads/' . $imagen->imagen) }}" alt="Product">
                </a>
              </li>
              @endforeach
            </ul> -->
            <!-- Fin imagenes Pequeñas -->
          </div>
        </div>

        <!-- Producto Info-->
        <div class="col-md-6">
          <div class="padding-top-2x mt-2 hidden-md-up"></div>
          <div class="sp-categories pb-3">
            <i class="icon-tag"></i>
            <a href="{{ route('products-categorie' , $product->categoriaid) }}">{{ $product->categoria }}</a>
          </div>

          <h2 class="mb-3">{{ $product->nombre }}</h2>
          <span class="h3 d-block">
            <del class="text-muted">
              {{ number_format(($product->precio + 50), 2, '.', ' ') }} 
            </del>&nbsp; {{ number_format($product->precio, 2, '.', ' ') }} MXM</span>

            <p class="text-muted">{{ $product->descripcion }}... 
              <a href='#details' class='scroll-to'>Más información</a>
            </p>

            <!--<small class="text-danger font-weight-bold">(Stock <span id="cant_stock"></span>)</small>-->
            <div class="row align-items-end pb-4">
              <div class="col-sm-4">
                <div class="form-group mb-0">
                  <label for="quantity">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Cantidad <small class="text-danger font-weight-bold">(Stock <span id="cant_stock"></span>)</small>
                  </label>
                  <input type="number" name="producto" class="form-control text-center" value="1" data-idproducto="{{ $product->idproducto }}">
                </div>
              </div>

              <div class="col-sm-8">
                <div class="pt-4 hidden-sm-up"></div>
                <button class="btn btn-primary btn-block m-0 btn_addcart" data-idproducto="{{ $product->idproducto }}"><i class="icon-bag"></i> Agregar al carrito</button>
              </div>
            </div>


            <div class="pt-1 mb-4">
              <span class="text-medium">SKU:</span> #{{ $product->sku }}
            </div>
            
            <hr class="mb-2">
          </div>
        </div>
      </div>

      <!-- Product Details-->
      <div class="bg-secondary padding-top-3x padding-bottom-2x mb-3" id="details">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h3 class="h4">
                Detalles
              </h3>
              
              <p class="mb-4 text-justify">
                {{ $product->descripcion }}
              </p>

              <h3 class="h4">
                Características
              </h3>

              <ul class="list-icon mb-4">
                @foreach($caracteristicas as $caracteristica)
                <li>
                  <i class="icon-check text-success"></i> {{ $caracteristica->descripcion }}
                </li>
                @endforeach
              </ul>

            </div>

            <div class="col-md-6">
              <h3 class="h4">
                Especificaciones
              </h3>

              <ul class="list-unstyled mb-4">
                @foreach($especificaciones as $especificacion)
                  <li>
                    {{ $especificacion->descripcion }}
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- Photoswipe container-->
      <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
          <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
          </div>
          <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
              <div class="pswp__counter"></div>
              <button class="pswp__button pswp__button--close" title="Cerrar (Esc)"></button>
              <button class="pswp__button pswp__button--fs" title="Pantalla completa"></button>
              <button class="pswp__button pswp__button--zoom" title="Acercar/Alejar"></button>
              <div class="pswp__preloader">
                <div class="pswp__preloader__icn">
                  <div class="pswp__preloader__cut">
                    <div class="pswp__preloader__donut"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
              <div class="pswp__share-tooltip"></div>
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Anterior"></button>
            <button class="pswp__button pswp__button--arrow--right" title="Siguiente"></button>
            <div class="pswp__caption">
              <div class="pswp__caption__center"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

      <script src="{{ asset('js/modulos/details.js?' . config('version')) }}"></script>
      <script src="{{ asset('js/modulos/cart.js?' . config('version')) }}"></script>