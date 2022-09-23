<!-- Content -->
        <div class="col-lg-9">
          <div class="padding-top-2x mt-2 hidden-lg-up"></div>
          <div class="column mt-2">
            <ul class="breadcrumbs">
              <li>
                <a href="">Categorías</a>
              </li>
            </ul>
          </div>

          <div class="mt-2">
            <div class="row">
              <div class="col-lg-12 order-md-2">                
                <h3 class="d-inline-block">Categorías</h3>
                <a href="{{ route('admin.newcategorie') }}" class="btn btn-sm btn-primary float-right">Agregar nuevo</a>
                <div class="table-responsive">
                  <table id="table_categories" class="table table-bordered table-sm text-center">
                    <thead class="text-center">
                      <tr>
                        <th>Descripción</th>
                        <th>Imagen referencia</th>
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
    <script src="{{ asset('js/modulos/categories.js?' . config('app.version')) }}"></script>