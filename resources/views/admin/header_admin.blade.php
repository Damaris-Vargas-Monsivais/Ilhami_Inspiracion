<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    {{ $title }}
  </title>
  <meta name="author" content="Rokaux">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="base_url" content="{{ url('/') }}">
  <!-- Vendor Styles including: Bootstrap, Font Icons, Plugins, etc.-->
  <link rel="stylesheet" media="screen" href="{{ asset('customizer/customizer.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/waitMe.min.css') }}">
  <link rel="stylesheet" media="screen" href="{{ asset('css/vendor.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
  <link id="mainStyles" rel="stylesheet" href="{{ asset('css/styles.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">


  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/modernizr.min.js') }}"></script>
  <script src="{{ asset('js/vendor.min.js') }}"></script>
  <script src="{{ asset('js/scripts.min.js') }}"></script>
  <script src="{{ asset('customizer/customizer.min.js') }}"></script>
  <script src="{{ asset('js/modulos/global.js') }}"></script>
  <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('js/toastr.min.js') }}"></script>
  <script src="{{ asset('js/waitMe.min.js') }}"></script>
  <script src="{{ asset('js/moment.js') }}"></script>
</head>
<!-- Body-->
<body class="hola">
  <!-- Template Customizer-->
  <!-- Header-->
  <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
  <header class="site-header navbar-sticky">
    <!-- Topbar-->
    <div class="topbar d-flex justify-content-between">
      <!-- Logo-->
      <div id="wrapper_logoheader" class="site-branding d-flex">
        
      </div>
      
      <!-- Toolbar-->
      <div class="toolbar d-flex">
        <div class="toolbar-item visible-on-mobile mobile-menu-toggle"><a href="#">
          <div><i class="icon-menu"></i><span class="text-label">Menu</span></div></a></div>
          
          <div class="toolbar-item hidden-on-mobile">
            <a href="{{ route('logout') }}">
              <div><i class="icon-user"></i><span class="text-label">Cerrar sesión</span></div>
            </a>
          </div>
        </div>

        <!-- Mobile Menu-->
        <div class="mobile-menu">
          <!-- Toolbar-->
          <div class="toolbar">
            <div class="toolbar-item">
              <a href="{{ route('logout') }}">
                <div><i class="icon-user"></i><span class="text-label">Cerrar sesión</span></div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>


      <!-- Page Content-->
    <div class="container-fluid padding-bottom-3x mb-2">
      <div class="row">
        <div class="col-lg-3">
          <aside class="user-info-wrapper">
            <div class="user-cover" style="background-image: url(img/account/user-cover-img.jpg);"></div>

            <div class="user-info">
              <div class="user-avatar">
                <!--<a class="edit-avatar" href="#"></a> -->
                <img src="{{ asset('img/account/user.png') }}" alt="User">
              </div>

              <div class="user-data">
                <h4 class="h5 text-capitalize">
                  @if(session('usuario'))
                    {{ session('usuario')['nombres'] }}
                  @endif
                </h4>
              </div>
            </div>
          </aside>

          <nav class="list-group">

            <a class="list-group-item" href="{{ route('admin') }}">
              <i class="icon-home"></i>Inicio
            </a>

              <a class="list-group-item with-badge" href="{{ route('orders') }}">
                <i class="icon-shopping-bag"></i>
                Órdenes<span class="badge badge-default badge-pill">
                  {{ $orders == 0 ? 0 : $orders }}
                </span>
              </a>

              <a class="list-group-item" href="{{ route('admin.products') }}">
                <i class="icon-package"></i>Productos
              </a>

              <a class="list-group-item" href="{{ route('admin.categories') }}">
                <i class="icon-list"></i>Categorías
              </a>

              <a class="list-group-item" href="{{ route('admin.users') }}">
                <i class="icon-package"></i>Usuarios
              </a>
              
              <a class="list-group-item" href="{{ route('config_tienda') }}">
                <i class="icon-settings"></i>Configuración
              </a>
          </nav>
        </div>