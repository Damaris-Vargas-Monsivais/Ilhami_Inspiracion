<!-- Page Title-->
<div id="wrapper_body">
  <div class="page-title">
    <div class="container">
      <div class="column">
        <h1>
          Todos los productos
        </h1>
      </div>
    </div>
  </div>

  <!-- Page Content-->
  <div class="container padding-bottom-3x mb-1">
    <div class="row">
      <!-- Products-->
      <div class="col-lg-9 order-lg-2">
        <!-- Shop Toolbar-->
        <div class="shop-toolbar padding-bottom-1x mb-2">
          <div class="column">
            <div class="shop-sorting">
              <span class="text-muted">Total:&nbsp;</span><span>1 - {{ count($products) }} artículos</span>
            </div>
          </div>
          <div class="column"></div>
        </div>

        <!-- Products Grid-->
        <div class="row justify-content-center">
          @foreach($products as $product)
          <div class="col-md-4 col-sm-6">
            <div class="product-card mb-30">
              <a class="product-thumb" href="{{ route('product-detail' , $product->idproducto) }}">
                <img src="{{ asset('uploads/' . $product->imagen) }}" alt="Product">
              </a>
              <div class="product-card-body">
                <div class="product-category">
                  <a href="{{ route('products-categorie' , $product->categoriaid) }}">{{ $product->categoria }}</a>
                </div>
                <h3 class="product-title">
                  <a href="{{ route('product-detail' , $product->idproducto) }}">{{ $product->nombre }}</a>
                </h3>
                <h4 class="product-price">
                  {{ number_format($product->precio, 2, '.', ' ') }} MXM
                </h4>
              </div>

              <div class="product-button-group">
                <a class="product-button btn_addcart_products" href="#" data-idproducto="{{ $product->idproducto }}"
                  data-cantidad="1"><i class="icon-shopping-cart"></i><span>Agregar al carrito</span></a>
              </div>

            </div>
          </div>
          @endforeach
        </div>

        <!-- Paginacion-->
        {{ $products->links() }}
      </div>

      <!-- Sidebar -->
      <div class="col-lg-3 order-lg-1">
        <div class="sidebar-toggle position-left"><i class="icon-filter"></i></div>
        <aside class="sidebar sidebar-offcanvas position-left"><span class="sidebar-close"><i class="icon-x"></i></span>
          <!-- Widget Categories-->
          <section class="widget widget-categories">
            <h3 class="widget-title">
              Categorías
            </h3>
            <ul>

              <!--<li class="has-children expanded">
                    <a href="#">Computadoras &amp; Accesorios</a><span>(1138)</span>
                    <ul>
                      <li>
                        <a href="#">Desktop PCs</a><span>(508)</span>
                        <ul>
                          <li><a href="#">Office PC</a></li>
                          <li><a href="#">Gaming PC</a></li>
                          <li><a href="#">PC for Learning</a></li>
                        </ul>
                      </li>

                      <li><a href="#">Nettops</a><span>(97)</span></li>
                      <li><a href="#">PC Accessories</a><span>(110)</span></li>
                    </ul>
                  </li> -->
              <li>
                <a href="{{ route('products') }}">
                  Ver todo
                </a>
              </li>
              @foreach($categories as $index => $categorie)
              <li>
                <a
                  href="{{ route('products-categorie' , $categorie->idcategoria) }}">{{ $categorie['descripcion'] }}</a><span>({{ $product_categorie[$index] }})</span>
              </li>
              @endforeach
            </ul>
          </section>
        </aside>
      </div>
    </div>
  </div>
</div>
<script src="{{ asset('js/modulos/products_cart.js?' . config('app.version')) }}"></script>