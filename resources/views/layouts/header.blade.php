<HTML lang="es">
<head>
  <meta charset="utf-8">
  <title>Ilhami</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <link rel="icon" type="image/png" href="favicon.png">
  <meta name="base_url" content="{{ url('/') }}">
  <link rel="stylesheet" media="screen" href="{{ asset('css/vendor.min.css') }}">
  <link id="mainStyles" rel="stylesheet" media="screen" href="{{ asset('css/styles.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/waitMe.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style_modalpayment.css') }}">
  <link rel="stylesheet" media="screen" href="{{ asset('customizer/customizer.min.css') }}">

  
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/vendor.min.js') }}"></script>
  <script src="{{ asset('js/scripts.min.js') }}"></script>
  <script src="{{ asset('customizer/customizer.min.js') }}"></script>
  <script src="{{ asset('js/toastr.min.js') }}"></script>
  <script src="{{ asset('js/waitMe.min.js') }}"></script>
  <script src="{{ asset('js/modernizr.min.js') }}"></script>
  <script src="{{ asset('js/modulos/global.js') }}"></script>
</head>
<!-- Body-->
<body>
  <!-- Template Customizer-->
  <!-- Header-->
  <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
  <header class="site-header navbar-sticky">
    <!-- Topbar-->
    <div class="topbar d-flex justify-content-between">
      <!-- Logo-->
      <div class="site-branding d-flex">
        <a class="site-logo align-self-center" href="{{ route('home') }}">
          <img src="{{ asset('img/logo') . '/' . $info['logo'] }}" alt="Logoencode">
        </a>
      </div>

      <!-- Search / Categories-->
      <div class="search-box-wrap d-flex">
        <div class="search-box-inner align-self-center">
          <div class="search-box d-flex">
            <div class="btn-group categories-btn">
              <button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
                <i class="icon-menu text-lg"></i>&nbsp;Categor&iacute;as
              </button>

              <div class="dropdown-menu mega-dropdown">
                <div class="row">
                  @foreach($categorias as $categoria)
                  <div class="col-sm-3">
                    <a class="d-block navi-link text-center mb-30" href="{{ route('products-categorie' , $categoria->idcategoria) }}">
                      <img class="d-block" src="{{ asset('uploads/categorias/' . $categoria->imagen_referencia) }}">
                      <span class="text-gray-dark">{{ $categoria->descripcion }}</span>
                    </a>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>

            <form class="input-group" method="get"><span class="input-group-btn">
              <button class="input_search" type="submit"><i class="icon-search"></i></button></span>
              <input class="form-control" type="search" placeholder="Buscar algún artículo..." name="palabra" autocomplete="off">
            </form>
          </div>
        </div>
      </div>

      <!-- Toolbar-->
      <div class="toolbar d-flex">
        <div class="toolbar-item visible-on-mobile mobile-menu-toggle">
          <a href="#">
            <div>
              <i class="icon-menu"></i><span class="text-label">Menu</span>
            </div>
          </a>
        </div>

        <div class="toolbar-item hidden-on-mobile">
          @if(!session('usuario') || !session('usuario')['login'])
          <a href="{{ route('login') }}">
            <div>
              <i class="icon-user"></i>
              <span class="text-label">Login</span>
            </div>
          </a>

          @else
          <a href="{{ route('admin') }}">
            <div>
              <i class="icon-user"></i>
              <span class="text-label">Panel</span>
            </div>
          </a>
          @endif
        </div>

        <div class="toolbar-item">
          <a href="{{ route('cart') }}">
            <div>
              <span class="cart-icon">
                <i class="icon-shopping-cart"></i>
                <span class="count-label cant_productcart"></span>
              </span>
              <span class="text-label">Carrito</span>
            </div>
          </a>
        </div>
      </div>

      <!-- Menu Mobile -->
      <div class="mobile-menu">
        <!-- Search Box-->
        <div class="mobile-search">
          <form class="input-group" method="get"><span class="input-group-btn">
            <button type="submit input_search"><i class="icon-search"></i></button></span>
            <input class="form-control" type="search" placeholder="Buscar algún artículo..." name="palabra" autocomplete="off">
          </form>
        </div>

        <!-- Toolbar-->
        <div class="toolbar">
          <div class="toolbar-item">
              @if(!session('usuario') || !session('usuario')['login'])
              <a href="{{ route('login') }}">
                <div>
                  <i class="icon-user"></i>
                  <span class="text-label">Login</span>
                </div>
              </a>

              @else
              <a href="{{ route('admin') }}">
                <div>
                  <i class="icon-user"></i>
                  <span class="text-label">Panel</span>
                </div>
              </a>
              @endif
          </div>
        </div>

        <!-- Slideable (Mobile) Menu-->
        <nav class="slideable-menu">
          <ul class="menu" data-initial-height="385">
            <li class="">
              <span>
                <a href="{{ route('home') }}">Inicio</a>
              </span>
            </li>

            <li class="has-children">
              <span>
                <a href="">Categorías</a><span class="sub-menu-toggle"></span>
              </span>
              
              <ul class="slideable-submenu">
                @foreach($categorias as $categoria)
                  <li>
                    <a href="">{{ $categoria->descripcion }}</a>
                  </li>
                @endforeach
              </ul>
            </li>

            <li class="">
              <span>
                <a href="#">Nosotros</a>
              </span>
            </li>

            <li class="">
              <span>
                <a href="{{ route('login') }}">Cuenta</a>
              </span>
            </li>
          </ul>
        </nav>
      </div>
    </div>

    <!-- Navbar-->
    <div class="navbar">
      <!-- Main Navigation-->
      <nav class="site-menu">
        <ul>
          <li class="">
            <a href="{{ route('home') }}">Inicio</a>
          </li>

          <li class="has-submenu">
            <a href="{{ route('products') }}">Categor&iacute;as</a>
            <ul class="sub-menu">
              @foreach($categorias as $categoria)
                <li>
                  <a href="{{ route('products-categorie' , $categoria->idcategoria) }}">{{ $categoria->descripcion }}</a>
                </li>
              @endforeach
            </ul>
          </li>

          <li class="has-submenu">
            <a href="">Nosotros</a>
          </li>

          <li class="has-submenu">
            <a href="{{ route('login') }}">Cuenta</a>
          </li>
        </ul>
      </nav>


      <!-- Barra de herramientas (Coloque la barra de herramientas aquí solo si habilita la barra de navegación fija)-->
      <!-- Carrito cuando se hace scroll -->
      <div class="toolbar">
        <div class="toolbar-inner">
          <div class="toolbar-item">
            <a href="{{ route('cart') }}">
              <div><span class="cart-icon"><i class="icon-shopping-cart"></i><span class="count-label cant_productcart"></span></span><span class="text-label">Carrito</span></div>
            </a>
          </div>
        </div>
      </div>
      <!-- Fin carrito cuando se hace scroll -->
    </div>
  </header>