/*

	Agregar
	
*/

var base_url 	= $('meta[name="base_url"]').attr('content');

$('.btn_especificacion').on('click' , function(e) {
	e.preventDefault();
	$('#especificacion').after('<input type="text" class="form-control form-control-sm mb-2" multiple name="especificacion[]">');
});

$('.btn_caracteristica').on('click' , function(e) {
	e.preventDefault();
	$('#caracteristica').after('<input type="text" class="form-control form-control-sm mb-2" multiple name="caracteristica[]">');
});

$('.btn_imagenes').on('click' , function(e) {
	e.preventDefault();
	$('#imagen').after('<input type="file" class="form-control form-control-sm mb-2" name="imagenes[]">');
})


$('body').on('click' , '.btn_save_product' , function(e) {
	e.preventDefault();
	let form			 	= new FormData(),
		categoria 			= $('select[name="categoria"]').val(), 
		nombre 				= $('input[name="nombre"]').val(),
		descripcion			= $('textarea[name="descripcion"]').val(),
		precio				= $('input[name="precio"]').val(),
		stock				= $('input[name="stock"]').val(),
		sku					= $('input[name="sku"]').val()
	
	if(categoria == '' || nombre == '' || descripcion == '' || 
		precio == '' || stock == '' || sku == '')
	{
		message_toast('warning' , 'Los campos no deben quedar vacíos');
	}	

	if(categoria == '')
	{
		$('select[name="categoria"]').addClass('is-invalid');
	}
	else {
		$('select[name="categoria"]').removeClass('is-invalid');
	}

	if(nombre == '')
	{
		$('input[name="nombre"]').addClass('is-invalid');
	}
	else {
		$('input[name="nombre"]').removeClass('is-invalid');
	}

	if(descripcion == '')
	{
		$('textarea[name="descripcion"]').addClass('is-invalid');
	} else {
		$('textarea[name="descripcion"]').removeClass('is-invalid');
	}

	if(precio == '')
	{
		$('input[name="precio"]').addClass('is-invalid');
	} else {
		$('input[name="precio"]').removeClass('is-invalid');
	}

	if(stock == '')
	{
		$('input[name="stock"]').addClass('is-invalid');
	} else {
		$('input[name="stock"]').removeClass('is-invalid');
	}

	if(sku == '')
	{
		$('input[name="sku"]').addClass('is-invalid');	
	} else {
		$('input[name="sku"]').removeClass('is-invalid');
	}

	if(categoria != '' && nombre != '' && descripcion != '' && 
			precio != '' && stock != '' && sku != '') {

			form.append('categoria' 	, categoria);
			form.append('nombre'    	, nombre);
			form.append('descripcion' 	, descripcion);
			form.append('precio'   		, precio);
			form.append('stock'			, stock);
			form.append('sku'   		, sku);

			$.each($('input[name="especificacion[]"]') , function(index, especificacion){
				form.append('especificaciones[]' , especificacion.value);
			});

			$.each($('input[name="caracteristica[]"]') , function(index, caracteristica){
				form.append('caracteristicas[]' , caracteristica.value);
			});


			$.each($('input[type="file"]') , function(index, imagen) {
				form.append('imagenes[]' , imagen.files[0]);
			});


			$.ajax({
				url			: base_url + '/admin/add_newproducto',
				method		: 'POST',
				data    	: form,
				cache		: false,
				processData : false,
				contentType : false,
				beforeSend  : function(){
					$('body').waitMe({
						effect   : 'ios'
					});
				},
				success     : function(r) {
					if(!r.status) 
					{
						$('body').waitMe('hide');
						message_toast('warning' , r.msg);
						return;
					}	

					$('body').waitMe('hide');
					console.log(r.resp);
					$('#form_newproduct').trigger('reset');
					message_toast('success' , 'Agregado correctamente');
				},
				dataType 	: 'json' 
			});
	}
});