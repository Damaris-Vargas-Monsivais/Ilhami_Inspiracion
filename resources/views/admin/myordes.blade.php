<!-- Content -->
        <div class="col-lg-9">
          <div class="padding-top-2x mt-2 hidden-lg-up"></div>
          <div class="column mt-2">
            <ul class="breadcrumbs">
              <li>
                <a href="">Mis órdenes</a>
              </li>
            </ul>
          </div> 

          <div class="mt-2">
            <div class="row">
              <div class="col-lg-12 order-md-2">                
                <h3 class="d-inline-block">Mis órdenes</h3>
                <input type="hidden" name="idusuario" value="{{ session()->get('usuario')['idusuario'] }}">
                <div class="table-responsive">
                  <table id="table_ordersusuario" class="table table-bordered table-sm text-center">
                    <thead class="text-center">
                      <tr>
                        <th width="6%" class="text-center">#</th>
                        <th>Fecha</th>
                        <th>Resumen</th>
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
    <script src="{{ asset('js/modulos/myorders_usuario.js?' . config('app.version')) }}"></script>