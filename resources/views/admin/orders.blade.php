<!-- Content -->
        <div class="col-lg-9">
          <div class="padding-top-2x mt-2 hidden-lg-up"></div>
          <div class="column mt-2">
            <ul class="breadcrumbs">
              <li>
                <a href="">Órdenes</a>
              </li>
            </ul>
          </div>

          <div class="mt-2">
            <div class="row">
              <div class="col-lg-12 order-md-2">                
                <h3 class="d-inline-block">Órdenes</h3>
                @if($orders > 0)
                <div class="table-responsive">
                  <table id="table_orders" class="table table-bordered table-sm text-center">
                    <thead class="text-center">
                      <tr>
                        <th>Fecha</th>
                        <th>E-mail</th>
                        <th>Resumen</th>
                        <th>Estado</th>
                        <th width="6%">&nbsp;</th>
                      </tr>
                    </thead>
                  </table>
                </div>
                @else
                  <div class="text-center">
                    <img src="{{ asset('img/shop/order_empty.png') }}" alt="" width="30%">
                    <p class="mt-3">Sin órdenes</p>
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
        <!-- End content -->
      </div>
    </div>
    <script src="{{ asset('js/modulos/orders.js?' . config('app.version')) }}"></script>