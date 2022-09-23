var base_url 	= $('meta[name="base_url"]').attr('content');

function load_cart()
{
	$.ajax({
		url 		: base_url + '/cart/getcart',
		method  	: 'POST',
		success		: function(r) {
			if(!r.status) {
				alert(r.msg);
				return;
			}

			$('#wrapper_cart').html(r.html_cart);
		},
		dataType	: 'json'
	});

	return false;
}

load_cart();

/*
	Agregar un producto al carrito
*/

$('body').on('click' , '.btn_addcart', function(e) {
	e.preventDefault();
	let idproducto 	= parseInt( $(this).data('idproducto') ),
		cantidad 	= parseInt( $('input[name="producto"]').val() );

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


/*
	Quitar un artículo del carrito de compras
*/

$('body').on('click' , '.btn_removeproduct' , function(e) {
	e.preventDefault();
	let idproducto 	= $(this).data('idproducto');


	$.ajax({
			url 		: base_url + '/cart/removeproductcart',
			method  	: 'POST',
			data 		: {idproducto : idproducto},
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
				load_cart();
				message_toast('success' , r.msg);

			},
			dataType	: 'json'
		});

		return false;
});


/*
	Vaciar el carrito de compras
*/

$('body').on('click' , '.btn_removecart' , function(e) {
	e.preventDefault();

	let pregunta = confirm('¿Está seguro que quiere vaciar el carrito?');

	if(!pregunta)
	{
		return;
	}

	$.ajax({
		url 		: base_url + '/cart/removecart',
		method  	: 'POST',
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
			load_cart();
			message_toast('success' , r.msg);

		},
		dataType	: 'json'
	});

	return false;
});




/*
	Actualizar cantidad de input
*/

$('body').on('change', '.input_cantidad' ,function() {
	let cantidad 	= parseInt( $(this).val() ),
		idproducto 	= $(this).data('idproducto'),
		stock 		= $(this).data('stock');

		if(cantidad < 1) {
			cantidad = 1;
			$(this).val(cantidad);
		}

		if(cantidad >= stock) {
			cantidad = stock;
			$(this).val(cantidad);
		}
		
		$.ajax({
			url 		: base_url + '/cart/update_cantproduct',
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
				load_cart();
				message_toast('success' , r.msg);

			},
			dataType	: 'json'
		});

		return false;
});