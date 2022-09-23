<!-- Page Content-->
    <script src="https://js.stripe.com/v3/"></script>
	  @php
    // Acá ingresas tu clave pk_
    $stripe_key = 'pk_test_51IdMnFHTbfxeD8f4JE6Epi01tDoPS5oX7nj454je3MZy2EAy8kKaDYqDl8AjyV4hk71pCoSyeD1N8biBkr3gaFzd00n5ToT6Aq';
    @endphp
    <div class="container padding-bottom-3x mb-2 mt-5">
      <div class="row">
        <!-- Checkout Adress-->
        <div class="col-xl-9 col-lg-8">
          <hr class="padding-bottom-1x">
          <div class="accordion" id="accordion" role="tablist">
            <div class="card">
              <div class="card-header" role="tab">
                <h6>
                	<a href="#card" data-toggle="collapse"><i class="icon-credit-card"></i>Paga con tarjeta de crédito</a>
                </h6>
              </div>
              <div class="collapse show" id="card" data-parent="#accordion" role="tabpanel">
                <div class="card-body">
                  <p>Aceptamos las siguientes tarjetas de crédito:&nbsp;&nbsp;<img class="d-inline-block align-middle" src="img\credit-cards.png" style="width: 120px;" alt="Cerdit Cards"></p>

                  <form class="interactive-credit-card row" id="payment-form">
                  	@csrf
                    <div class="col-md-12">
                      <div class="card-header">
                        <label for="card-element">
                          Ingrese la información de su tarjeta de crédito
                        </label>
                      </div>
                      <div class="card-body">
                        <div id="card-element">
                          <!-- Aquí se insertará un elemento -->
                        </div>
                        <!-- Se utiliza para mostrar errores de formulario. -->
                        <div id="card-errors" role="alert"></div>
                        <input type="hidden" name="plan" value="" />
                      </div>
                    </div>

                    <div class="col-md-12">
                      <button id="card-button" type="submit" data-secret="{{ $intent }}" class="btn btn-outline-primary  mt-0  float-right" type="submit">
                      	Pagar ahora
                      </button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>

          <div class="d-flex justify-content-between paddin-top-1x mt-4">
          	<a class="btn btn-outline-secondary" href="{{ route('cart') }}">
          		<i class="icon-arrow-left"></i><span class="hidden-xs-down">&nbsp;Volver</span>
          	</a>
          </div>
        </div>

        <!-- Sidebar          -->
        <div class="col-xl-3 col-lg-4 mt-4">
          <aside class="sidebar">
            <div class="padding-top-2x hidden-lg-up"></div>
            <!-- Order Summary Widget-->
            <section class="widget widget-order-summary">
              <h3 class="widget-title">Resumen de la orden</h3>
              <table class="table">
                <tr>
                  <td>Subtotal:</td>
                  <td class="text-gray-dark val_subtotal">{{ number_format(session('cart')['subtotal'], 2, '.', ' ') }} MXM</td>
                </tr>
                <tr>
                  <td>Envío:</td>
                  <td class="text-gray-dark val_envio">{{ number_format(session('cart')['envio'], 2, '.', ' ') }} MXM</td>
                </tr>
                <tr>
                  <td></td>
                  <td class="text-lg text-gray-dark val_total" style="font-size: 20px">{{ number_format(( session('cart')['total'] + session('cart')['envio']), 2, '.', ' ') }} MXM</td>
                </tr>
              </table>
            </section>
          </aside>
        </div>

        <div id="wrapper_modal"></div>

      </div>
    </div>
    
    <script>
      var base_url  = $('meta[name="base_url"]').attr('content');
      var style = {
            base: {
              iconColor: '#18b898',
              color: '#32325d',
              fontWeight: 500,
              fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
              fontSize: '16px',
              fontSmoothing: 'antialiased',

              ':-webkit-autofill': {
                color: '#18b898',
              },
              '::placeholder': {
                color: '#18b898',
              },
            },
            invalid: {
              color: '#fa755a',
              iconColor: '#fa755a'
            }
        };

      const stripe        = Stripe('{{ $stripe_key }}', { locale: 'es' });
      const elements      = stripe.elements();
      const cardElement   = elements.create('card', { style: style, iconStyle: 'solid' });
      const cardButton    = document.getElementById('card-button');
      const clientSecret  = cardButton.dataset.secret;


      cardElement.mount('#card-element');

    	// Manejar el envío de formularios.
        var form = document.getElementById('payment-form');
    
        form.addEventListener('submit', function(event) {
            // Prevenimos el evento para no recargar la página
            event.preventDefault();
            $('body').waitMe({
                effect: 'rotateplane'
            });
            
            stripe.handleCardPayment(clientSecret, cardElement, {
                payment_method_data: {
                    billing_details: { name: "{{ session()->get('datos_cliente')['email_cliente'] }}" }
                }
            })
            .then(function(result) {
                $.ajax({
                        url         : base_url + "/checkout_success",
                        method      : 'POST',
                        data        : {
                          idventa   : result.paymentIntent.id,
                          estado    : result.paymentIntent.status
                        },
                        beforeSend  : function() {
                            $('body').waitMe({
                                effect: 'rotateplane'
                            });
                        },
                        success     : function(r){
                            if(!r.status) {
                                $('body').waitMe('hide');
                                message_toast('warning' , r.msg);
                                return;
                            }   

                            $('body').waitMe('hide');
                            let html_modal = `<div id="myModal" class="modal fade" data-backdrop="static" data-keyboard="false">
                                              <div class="modal-dialog modal-confirm">
                                                <div class="modal-content">
                                                  <div class="modal-header justify-content-center">
                                                    <div class="icon-box">
                                                      <i class="icon-check"></i>
                                                    </div>
                                                    <button type="button" class="close btn_closepayment" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                  </div>
                                                  <div class="modal-body text-center">
                                                    <h4>
                                                      ¡Gracias!
                                                    </h4> 
                                                    <p>
                                                      En unos momentos nos comunicaremos con usted para coordinar los detalles del envío.
                                                    </p>
                                                    <button class="btn btn-success btn_closepayment" data-dismiss="modal"><span>Finalizar</span></button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>`;

                            $('#payment-form').trigger('reset');
                            $('.val_subtotal').html('0.00 MXM');
                            $('.val_envio').html('0.00 MXM');
                            $('.val_total').html('0.00 MXM');
                            $('#wrapper_modal').html(html_modal); 
                            $('#myModal').modal('show');
                        },
                        dataType    : 'json'
                    });
                    return;
            });
        });


        // Redireccionar a welcome una vez terminado el proceso
        $('body').on('click' , '.btn_closepayment', function(e) {
            e.preventDefault();
            window.location.href = "{{ url('/') }}";
        });
    </script>