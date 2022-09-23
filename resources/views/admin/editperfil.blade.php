        <!-- Content -->
        <div class="col-lg-9">
          <div class="padding-top-2x mt-2 hidden-lg-up"></div>
          <div class="column mt-2">
            <ul class="breadcrumbs">
              <li>
                <a href="">Actualizar datos</a>
              </li>
            </ul>
          </div>

          <div class="mt-2">
            <div class="row">
              <div class="col-lg-12 order-md-2">                
                <div class="row">
                  <div class="col-md-8 mt-4">
                    <div class="padding-top-3x hidden-md-up"></div>
                    <div>
                      <h3 class="margin-bottom-1x text-center d-inline-block">
                        Actualizar mis datos
                      </h3>
                    </div>

                    <form id="form_editperfil" class="row mt-3" method="post">
                      @csrf
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="nombres" class="col-form-label">Nombres</label>
                          <input type="hidden" name="idusuario" value="{{ $usuario->idusuario }}">
                          <input class="form-control" type="text" id="nombres" name="nombres" value="{{ $usuario->nombres }}">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="apellidos" class="col-form-label">Apellidos</label>
                          <input class="form-control" type="text" id="apellidos" name="apellidos" value="{{ $usuario->apellidos }}">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="email" class="col-form-label">E-mail</label>
                          <input class="form-control" type="email" id="email" name="email" value="{{ $usuario->email }}">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="telefono" class="col-form-label">N&uacute;mero de tel&eacute;fono</label>
                          <input class="form-control" type="text" id="telefono" name="telefono" value="{{ $usuario->telefono }}">
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <button class="btn btn-primary margin-bottom-none btn-block mt-4 btn_updateperfil" type="submit">Actualizar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End content -->
      </div>
    </div>

    <script src="{{ asset('js/modulos/editperfil.js?' . config('app.version')) }}"></script>