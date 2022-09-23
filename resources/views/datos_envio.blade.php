<!-- Content -->
<div class="col-lg-9">
    <div class="padding-top-2x mt-2 hidden-lg-up"></div>
    <div class="column mt-2">
    </div>

    <div class="mt-4">
        <div class="row mb-xl-5">
            <div class="col-lg-12 order-md-2 mb-xl-5">
                <h3 class="d-inline-block">Datos del cliente</h3>
                <div class="row mb-xl-5">
                    <div class="col-md-6 offset-md-5">
                        <form id="form_datos" action="" autocomplete="off">
                            @csrf
                            <div class="from-group mb-3">
                                <label for="">E-mail:</label>
                                <input type="text" class="form-control" name="email_cliente">
                                <span class="invalid-feedback">El campo no debe quedar vacío</span>
                            </div>

                            <div class="from-group mb-3">
                                <label for="direccion_cliente">Dirección:</label>
                                <textarea name="direccion_cliente" id="direccion_cliente" class="form-control" cols="8"
                                    rows="3"></textarea>
                                <span class="invalid-feedback">El campo no debe quedar vacío</span>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary float-right btn_procesar">Procesar</button>
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

<script>
    var base_url 	= $('meta[name="base_url"]').attr('content');
    $('.btn_procesar').on('click' , function(e) {
        e.preventDefault();
        let email_cliente       = $('input[name="email_cliente"]'),
            direccion_cliente   = $('textarea[name="direccion_cliente"]'),
            form                = $('#form_datos').serialize();

            if(email_cliente.val() == '')
            {
                email_cliente.addClass('is-invalid');
            }
            else {
                email_cliente.removeClass('is-invalid');
            }

            if(direccion_cliente.val() == '')
            {
                direccion_cliente.addClass('is-invalid');
            }
            else {
                direccion_cliente.removeClass('is-invalid');
            }


            if( email_cliente.val() != '' && direccion_cliente.val() != '' )
            {
                $.ajax({
                    url        :    base_url + '/validar_cliente',
                    method     :    'POST',
                    data       :    form,
                    beforeSend :    function(){
                        $('body').waitMe({
                            effect : 'ios'
                        });
                    },
                    success    :    function(r){
                        if(!r.status) 
                        {
                            $('body').waitMe('hide');
                            message_toast('warning' , 'Algo pasó, intente de nuevo');
                            return;
                        }

                        $('body').waitMe('hide');
                        window.location.href = base_url + '/checkout';

                    },
                    dataType   :    'json'

                });
            }
      });
</script>