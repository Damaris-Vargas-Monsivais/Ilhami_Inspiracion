var base_url 	= $('meta[name="base_url"]').attr('content');


/*
	Agregar un producto al carrito
*/

$('body').on('click' , '.btn_addcart_products', function(e) {
	e.preventDefault();
	let idproducto 	= parseInt( $(this).data('idproducto') ),
		cantidad 	= parseInt( $(this).data('cantidad') );

		$.ajax({
			url 		: base_url + '/cart/add_cartproduct',
			method  	: 'POST',
			data 		: {idproducto : idproducto, cantidad : cantidad},
			beforeSend 	: function() {
				$('body').waitMe({
					effect : 'ios'
				});
			},
			success		: function(r) {
				if(!r.status) {
					$('body').waitMe('hide');
					message_toast('error' , r.msg);
					return;
				}
				
				$('body').waitMe('hide');
				load_cantproductscart();
				message_toast('success' , r.msg);

			},
			dataType	: 'json'
		});

		return false;
});