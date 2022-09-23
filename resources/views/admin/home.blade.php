        <!-- Content -->
        <div class="col-lg-9">
          <div class="padding-top-2x mt-2 hidden-lg-up"></div>
          <div class="column mt-2">
            <ul class="breadcrumbs">
              <li>
                <a href="">Inicio</a>
              </li>
            </ul>
          </div>

          <div class="mt-2">
            <div class="row">
              <div class="col-lg-12 order-md-2">                
                <div class="row">
                    <div class="col-md-6 col-12">
                      <div class="alert alert-warning alert-dismissible text-center margin-bottom-1x">
                        <h2 class="font-weight-bold">
                          {{ $pendientes == 0 ? 0 : $pendientes }}
                        </h2>
                        <i class="icon-clock"></i>&nbsp;&nbsp;
                        <span class='text-medium'>PENDIENTES</span>
                      </div>
                    </div>
                    

                    <div class="col-md-6 col-12">
                      <div class="alert alert-success alert-dismissible text-center margin-bottom-1x">
                        <h2 class="font-weight-bold">
                          {{ $entregados == 0 ? 0 : $entregados }}
                        </h2>
                        <i class="icon-check-circle"></i>&nbsp;&nbsp;
                        <span class='text-medium'>ENTREGADOS</span>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End content -->
      </div>
    </div>