var base_url 	= $('meta[name="base_url"]').attr('content'),
	idproducto	= $('input[name="producto"]').data('idproducto');


/*
	Necesitamos obtener la cantidad de stock para mostrar en el detalle
*/
function get_cantstock()
{
	$.ajax({
		url 		: base_url + '/getcantstock',
		method  	: 'POST',
		data 		: {idproducto : idproducto},
		success		: function(r) {
			if(!r.status) {
				alert(r.msg);
				return;
			}

			$('#cant_stock').html(r.product.stock);
		},
		dataType	: 'json'
	});

	return false;
}

get_cantstock();

/*
	Change para validar la cantidad de producto
*/

$('input[name="producto"]').on('change' , function() {
	let cantidad_producto 	= parseInt($(this).val()),
		stock 				= parseInt($('#cant_stock').text());

		if(cantidad_producto < 1) {
			cantidad_producto = 1;
			$(this).val(cantidad_producto);
		}	

		if(cantidad_producto > stock) {
			cantidad_producto = stock;
			$(this).val(cantidad_producto);
		}
});	