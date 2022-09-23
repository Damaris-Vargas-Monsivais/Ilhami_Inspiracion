<!-- Page Content-->
<!-- Content -->
        <div class="col-lg-9">
          <div class="padding-top-2x mt-2 hidden-lg-up"></div>
          <div class="column mt-2">
            <ul class="breadcrumbs">
              <li>
                <a href="">Nuevo usuario</a>
              </li>
            </ul>
          </div>

          <div class="mt-2">
            <div class="row">
              <div class="col-lg-12 order-md-2">    
              <h3 class="d-inline-block">Nuevo usuario</h3>            
                <form id="form_register" autocomplete="off" class="row mt-3" method="post">
            @csrf
            <div class="col-sm-6">
              <div class="form-group">
                <label for="nombres">Nombres</label>
                <input class="form-control" type="text" id="nombres" name="nombres">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input class="form-control" type="text" id="apellidos" name="apellidos">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="email">E-mail</label>
                <input class="form-control" type="email" id="email" name="email">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="telefono">N&uacute;mero de tel&eacute;fono</label>
                <input class="form-control" type="text" id="telefono" name="telefono">
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label for="clave">Contraseña</label>
                <input class="form-control" type="password" id="clave" name="clave">
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <button class="btn btn-primary margin-bottom-none btn-block mt-4 btn_register" type="submit">Aceptar</button>
              </div>
            </div>
          </form>
              </div>
            </div>
          </div>
        </div>
        <!-- End content -->
      </div>
    </div>
<script src="{{ asset('js/modulos/register.js?' . config('app.version')) }}"></script>