<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pagar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/waitMe.min.css') }}">



  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/waitMe.min.js') }}"></script>
</head>
<body>
    @php
    $stripe_key = 'pk_test_51IdMnFHTbfxeD8f4JE6Epi01tDoPS5oX7nj454je3MZy2EAy8kKaDYqDl8AjyV4hk71pCoSyeD1N8biBkr3gaFzd00n5ToT6Aq';
    @endphp
    <div class="container" style="margin-top:10%;margin-bottom:10%">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="">
                    <p>Se le cobrará ${{ number_format(($amount / 100), 2, '.', ' ') }}</p>
                </div>
                <div class="card">
                    <form action="{{ route('checkout.credit-card')}} "  method="post" id="payment-form">
                        @csrf                    
                        <div class="form-group">
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

                        <div class="card-footer">
                          <button
                          id="card-button"
                          class="btn btn-dark"
                          type="submit"
                          data-secret="{{ $intent }}"
                        > Pagar </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // El estilo personalizado se puede pasar a las opciones al crear un elemento.
        // (Tener en cuenta que esta demostración utiliza un conjunto de estilos más amplio que la guía a continuación).

        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },

            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
    
        const stripe        = Stripe('{{ $stripe_key }}', { locale: 'es' }); // Crea un cliente de Stripe.
        const elements      = stripe.elements(); // Cree una instancia de Elements.
        const cardElement   = elements.create('card', { style: style }); // Cree una instancia de la tarjeta Element.
        const cardButton    = document.getElementById('card-button');
        const clientSecret  = cardButton.dataset.secret;
    
        cardElement.mount('#card-element'); // Agregue una instancia del elemento de tarjeta en card-element
    
        // Manejar errores de validación en tiempo real desde la tarjeta Element.
        cardElement.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
    
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
                    billing_details: { name: "{{ session()->get('usuario')['nombres'] }}" }
                }
            })
            .then(function(result) {
                $.ajax({
                        url         : "{{ url('/checkout_success') }}",
                        method      : 'POST',
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
                            console.log('Pago exitoso');
                            //window.location.href = "{{ url('/') }}"
                        },
                        dataType    : 'json'
                    });
                    return;
            });
        });
    </script>
</body>
</html>