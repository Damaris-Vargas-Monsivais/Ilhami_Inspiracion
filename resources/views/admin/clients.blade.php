<!-- Content -->
        <div class="col-lg-9">
          <div class="padding-top-2x mt-2 hidden-lg-up"></div>
          <div class="column mt-2">
            <ul class="breadcrumbs">
              <li>
                <a href="">Clientes</a>
              </li>
            </ul>
          </div>

          <div class="mt-2">
            <div class="row">
              <div class="col-lg-12 order-md-2">                
                <h3 class="d-inline-block">Clientes</h3>
                <div class="table-responsive">
                  <table id="table_clients" class="table table-bordered table-sm text-center">
                    <thead class="text-center">
                      <tr>
                        <th width="6%" class="text-center">#</th>
                        <th width="25%">Nombres</th>
                        <th width="25%">Apellidos</th>
                        <th width="20%">Email</th>
                        <th>Teléfono</th>
                        <th width="6%">&nbsp;</th>
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
    <script src="{{ asset('js/modulos/clients.js?' . config('app.version')) }}"></script>