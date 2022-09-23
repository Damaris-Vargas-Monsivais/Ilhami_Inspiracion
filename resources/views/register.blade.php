<!-- Page Content-->
    <div class="container padding-bottom-3x mb-2">
      <div class="row">
        <div class="col-md-6 offset-3 mt-4">
          <div class="padding-top-3x hidden-md-up"></div>
          <div>
            <h3 class="margin-bottom-1x text-center d-inline-block">
            ¿No tiene una cuenta? Regístrese
            </h3>
            <a class="navi-link text-danger" href="{{ route('login') }}">&nbsp; Iniciar sesión*</a>
          </div>
          <span class="text-muted">El registro demora menos de un minuto pero le brinda control total sobre sus pedidos.</span>
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
<script src="{{ asset('js/modulos/register.js') }}"></script>