<!-- Page Content-->
<div id="wrapper_body">
    <div class="container padding-bottom-3x mb-2">
      <div class="row">
        <div class="col-md-6 offset-3 mt-5">
          <form class="card" autocomplete="off">
            @csrf
            <div class="card-body">
              <h4 class="margin-bottom-1x text-center">
                Inicio de sesion
              </h4>

              <div class="form-group input-group">
                <input class="form-control" type="email" placeholder="Usuario" name="email" value="support@encode.pe">
                <span class="input-group-addon"><i class="icon-user"></i></span>
              </div>

              <div class="form-group input-group">
                <input class="form-control" type="password" placeholder="Contraseña" name="clave" value="encode123">
                <span class="input-group-addon"><i class="icon-lock"></i></span>
              </div>
              
              <div class="text-center text-sm-right">
                <button class="btn btn-primary margin-bottom-none btn_login" type="submit">Aceptar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
    <script src="{{ asset('js/modulos/login.js') }}"></script>
    <script>
      $('#myModal').modal('show');
    </script>

    <script>
        var base_url    = $('meta[name="base_url"]').attr('content');

        $('body').on('click' , '.input_search' , function(e) {
            e.preventDefault();
            let palabra     = $('input[name="palabra"]').val();

                if(palabra == '')
                {
                    message_toast('warning' , 'Debe escribir algo');
                    return;
                }

                if(palabra != '') {

                    $.ajax({
                        url         : base_url + '/admin/searchproduct',
                        method      : 'POST',
                        data        : {palabra : palabra},
                        beforeSend  : function(){
                            $('body').waitMe({
                                effect   : 'ios'
                            });
                        },
                        success     : function(r) {
                            if(!r.status) 
                            {
                                $('body').waitMe('hide');
                                let html_nr = `<div class="container padding-bottom-2x mb-1">
                                                    <div class="row">
                                                    <!-- Products-->
                                                    <div class="col-lg-12 text-center">
                                                    <img src="${base_url + '/img/noresults.png'}" alt="" style="width: 45%">
                                                    <span class="text-danger d-block font-weight-bold">Lo sentimos :( No hay producto relacionado con la búsqueda hecha</span>
                                                    </div>
                                                    </div>
                                                </div>`;
                                $('#wrapper_body').html(html_nr);
                                return;
                            }       

                            let html_r = `<div class="page-title">
                                          <div class="container">
                                            <div class="column">
                                              <h1>
                                                Productos encontrados
                                              </h1>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="container padding-bottom-3x mb-1">
                                          <div class="row">
                                            <div class="col-lg-9 order-lg-2">
                                              <div class="shop-toolbar padding-bottom-1x mb-2">
                                                <div class="column">
                                                  <div class="shop-sorting">
                                                    <span class="text-muted">Total:&nbsp;</span><span>1 - ${ r.productos.length } artículos</span>
                                                  </div>
                                                </div>
                                                <div class="column"></div>
                                              </div>

                                              <div class="row justify-content-center">`
                                                $.each(r.productos , function(index, producto){
                                                    html_r += `<div class="col-md-4 col-sm-6">
                                                  <div class="product-card mb-30">
                                                    <a class="product-thumb" href="${ r.route }/product-detail/${producto.idproducto}">
                                                      <img src="${ base_url + '/uploads/' + producto.imagen }" alt="Product">
                                                    </a>
                                                    <div class="product-card-body">
                                                      <div class="product-category">
                                                        <a href="${ r.route }/products-categorie/${producto.categoriaid}">${ producto.categoria }</a>
                                                      </div>
                                                      <h3 class="product-title">
                                                        <a href="${ r.route }/product-detail/${producto.idproducto}">${ producto.nombre }</a>
                                                      </h3>
                                                      <h4 class="product-price">
                                                        ${ parseFloat(producto.precio).toFixed(2) } MXM
                                                      </h4>
                                                    </div>


                                                  </div>
                                                </div>`;
                                                });

                                                html_r += `</div>
                                              </div>

                                              <div class="col-lg-3 order-lg-1">
                                                <div class="sidebar-toggle position-left"><i class="icon-filter"></i></div>
                                                <aside class="sidebar sidebar-offcanvas position-left"><span class="sidebar-close"><i class="icon-x"></i></span>
                                                <section class="widget widget-categories">
                                                        <h3 class="widget-title">
                                                          Categorías
                                                        </h3>
                                                        <ul>
                                                      <li>
                                                        <a href="{{ route('products') }}">
                                                          Ver todo
                                                        </a>
                                                      </li>`;
                                                      $.each(r.categories , function(index, categorie) {
                                                        html_r += `<li>
                                                        <a href="${ r.route }/products-categorie/${categorie.idcategoria}">${ categorie.descripcion }</a><span>(${r.product_categorie[index]})</span>
                                                      </li>`;
                                                      });
                                                    html_r += `</ul>
                                                  </section>
                                                </aside>
                                              </div>
                                            </div>
                                          </div>`;

                            $('body').waitMe('hide');
                            $('#wrapper_body').html(html_r);
                        },
                        dataType    : 'json' 
                    });
                }
        });





    /*
        Al dar enter
    */
    $('input[name="palabra"]').keypress(function(e) {
        if(e.which == 13) 
        {
            let palabra     = $(this).val();

            if(palabra == '')
            {
                message_toast('warning' , 'Debe escribir algo');
                return;
            }

            if(palabra != '') {

                $.ajax({
                    url         : base_url + '/admin/searchproduct',
                    method      : 'POST',
                    data        : {palabra : palabra},
                    beforeSend  : function(){
                        $('body').waitMe({
                            effect   : 'ios'
                        });
                    },
                    success     : function(r) {
                        if(!r.status) 
                        {
                            $('body').waitMe('hide');
                            let html_nr = `<div class="container padding-bottom-2x mb-1">
                            <div class="row">
                            <!-- Products-->
                            <div class="col-lg-12 text-center">
                            <img src="${base_url + '/img/noresults.png'}" alt="" style="width: 45%">
                            <span class="text-danger d-block font-weight-bold">Lo sentimos :( No hay producto relacionado con la búsqueda hecha</span>
                            </div>
                            </div>
                            </div>`;
                            $('#wrapper_body').html(html_nr);
                            return;
                        }       

                        let html_r = `<div class="page-title">
                        <div class="container">
                        <div class="column">
                        <h1>
                        Productos encontrados
                        </h1>
                        </div>
                        </div>
                        </div>

                        <div class="container padding-bottom-3x mb-1">
                        <div class="row">
                        <div class="col-lg-9 order-lg-2">
                        <div class="shop-toolbar padding-bottom-1x mb-2">
                        <div class="column">
                        <div class="shop-sorting">
                        <span class="text-muted">Total:&nbsp;</span><span>1 - ${ r.productos.length } artículos</span>
                        </div>
                        </div>
                        <div class="column"></div>
                        </div>

                        <div class="row justify-content-center">`
                        $.each(r.productos , function(index, producto){
                            html_r += `<div class="col-md-4 col-sm-6">
                            <div class="product-card mb-30">
                            <a class="product-thumb" href="${ r.route }/product-detail/${producto.idproducto}">
                            <img src="${ base_url + '/uploads/' + producto.imagen }" alt="Product">
                            </a>
                            <div class="product-card-body">
                            <div class="product-category">
                            <a href="${ r.route }/products-categorie/${producto.categoriaid}">${ producto.categoria }</a>
                            </div>
                            <h3 class="product-title">
                            <a href="${ r.route }/product-detail/${producto.idproducto}">${ producto.nombre }</a>
                            </h3>
                            <h4 class="product-price">
                            ${ parseFloat(producto.precio).toFixed(2) } MXM
                            </h4>
                            </div>



                            </div>
                            </div>`;
                        });

                        html_r += `</div>
                        </div>

                        <div class="col-lg-3 order-lg-1">
                        <div class="sidebar-toggle position-left"><i class="icon-filter"></i></div>
                        <aside class="sidebar sidebar-offcanvas position-left"><span class="sidebar-close"><i class="icon-x"></i></span>
                        <section class="widget widget-categories">
                        <h3 class="widget-title">
                        Categorías
                        </h3>
                        <ul>
                        <li>
                        <a href="{{ route('products') }}">
                        Ver todo
                        </a>
                        </li>`;
                        $.each(r.categories , function(index, categorie) {
                            //route('products-categorie' , $categorie->idcategoria)
                            html_r += `<li>
                            <a href="${ r.route }/products-categorie/${categorie.idcategoria}">${ categorie.descripcion }</a><span>(${r.product_categorie[index]})</span>
                            </li>`;
                        });
                        html_r += `</ul>
                        </section>
                        </aside>
                        </div>
                        </div>
                        </div>`;

                        $('body').waitMe('hide');
                        $('#wrapper_body').html(html_r);
                        console.log(r.route);
                    },
                    dataType    : 'json' 
                });
}
        }
    });
   

    </script>