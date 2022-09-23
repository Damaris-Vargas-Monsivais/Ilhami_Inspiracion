<!-- Site Footer-->
    <footer class="site-footer" style="background-image: url('img/footer-bg.png');">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <!-- Contact Info-->
            <section class="widget widget-light-skin">
              <h3 class="widget-title">
                P&oacute;ngase en contacto con nosotros
              </h3>
              <!-- <p class="text-white">
                Tel&eacute;fono: {{ $info['telefono'] }}
              </p> -->

              <ul class="list-unstyled text-sm text-white">
                <!-- <li>
                  <span class="opacity-50">Lunes-Viernes:&nbsp;</span>{{ $info['hora_entrada'] }} - {{ $info['hora_salida'] }}
                </li> -->
              </ul>

              <p>
                <a class="navi-link-light" href="#">ilhami@support.com</a>
              </p>
              <!-- <a class="social-button shape-circle sb-facebook sb-light-skin" target="_blank" href="{{ $info['url_facebook'] }}">
                <i class="socicon-facebook"></i>
              </a>
              <a class="social-button shape-circle sb-twitter sb-light-skin" target="_blank" href="{{ $info['url_twitter'] }}">
                <i class="socicon-twitter"></i>
              </a>
              <a class="social-button shape-circle sb-instagram sb-light-skin" target="_blank" href="{{ $info['url_instagram'] }}">
                <i class="socicon-instagram"></i>
              </a> -->
            </section>
          </div>

          <div class="col-lg-6">
            <!-- Subscription-->
            <!-- <section class="widget widget-light-skin">
              <h3 class="widget-title">
                Estar informado
              </h3>

              <form class="row" action="" method="post">
                <div class="col-sm-9">
                  <div class="input-group input-light">
                    <input class="form-control" type="email" name="email" placeholder="Tu correo electrónico">
                    <span class="input-group-addon">
                      <i class="icon-mail"></i>
                    </span>
                  </div>

                  <p class="form-text text-sm text-white opacity-50 pt-2 text-justify">
                    Suscríbase a nuestro boletín para recibir ofertas de descuentos anticipados, las últimas noticias, información sobre ventas y promociones.
                  </p>
                </div>
                <div class="col-sm-3">
                  <button class="btn btn-primary btn-block mt-0" type="submit">Suscribirse</button>
                </div>
              </form>
            </section>
          </div>
        </div> -->

        <!-- Copyright-->
        <p class="footer-copyright">
            © Todos los derechos reservados - 
            <a href="" target="_blank">Ilhami.com</a>
        </p>
      </div>
    </footer>
    <!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="icon-chevron-up"></i></a>
    <!-- Backdrop-->
    <div class="site-backdrop"></div>
    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->

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

                                                    <div class="product-button-group">
                                                      <a class="product-button btn_addcart_products" href="#" data-idproducto="${producto.idproducto}"
                                                        data-cantidad="1"><i class="icon-shopping-cart"></i><span>Agregar al carrito</span></a>
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
  </body>
</html>