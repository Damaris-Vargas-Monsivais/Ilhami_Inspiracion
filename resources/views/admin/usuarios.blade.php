<!-- Content -->
        <div class="col-lg-9">
          <div class="padding-top-2x mt-2 hidden-lg-up"></div>
          <div class="column mt-2">
            <ul class="breadcrumbs">
              <li>
                <a href="">Usuarios</a>
              </li>
            </ul>
          </div>

          <div class="mt-2">
            <div class="row">
              <div class="col-lg-12 order-md-2">                
                <h3 class="d-inline-block">Usuarios</h3>
                <a href="{{ route('register') }}" class="btn btn-sm btn-primary float-right">Agregar nuevo</a>
                <div class="table-responsive">
                  <table id="table_users" class="table table-bordered table-sm text-center">
                    <thead class="text-center">
                      <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>E-mail</th>
                        <th>Teléfono</th>
                        <th width="15%">Estado</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End content -->
      </div>
    </div>
    <script src="{{ asset('js/modulos/users.js?' . config('app.version')) }}"></script>