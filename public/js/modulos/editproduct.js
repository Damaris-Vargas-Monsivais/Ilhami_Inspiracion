/*

	Editar
	
*/


var base_url 	= $('meta[name="base_url"]').attr('content');


$('body').on('click' , '.btn_editproduct' , function(e)
{
	e.preventDefault();
	
	let form				= new FormData(),
		categoria 			= $('select[name="categoria"]').val(), 
		nombre 				= $('input[name="nombre"]').val(),
		descripcion			= $('textarea[name="descripcion"]').val(),
		precio				= $('input[name="precio"]').val(),
		stock				= $('input[name="stock"]').val(),
		sku					= $('input[name="sku"]').val(),
		idproducto			= $('input[name="idproducto"]').val(),
		especificaciones    = [],
		caracteristicas     = [];


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
			precio != '' && stock != '' && sku != '')
		{
			form.append('categoria' 	, categoria);
			form.append('nombre'    	, nombre);
			form.append('descripcion' 	, descripcion);
			form.append('precio'   		, precio);
			form.append('stock'			, stock);
			form.append('sku'   		, sku);
			form.append('idproducto'	, idproducto);


			$.each($('input[name="especificacion[]"]') , function(index, especificacion) {
				especificaciones.push(especificacion.value);
				form.append('especificaciones' , especificaciones);
			});


			$.each($('input[name="caracteristica[]"]') , function(index, caracteristica) {
				caracteristicas.push(caracteristica.value);
				form.append('caracteristicas' , caracteristicas);
			});


			$.each($('input[type="file"]') , function(index, imagen) {
				form.append(index , imagen.files[0]);
			});


			$.ajax({
				url			: base_url + '/admin/store_product',
				method		: 'POST',
				data    	: form,
				cache		: false,
				processData : false,
				contentType : false,
				beforeSend	: function() {
					$('body').waitMe({
						effect	: 'ios'
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
					load_images();
					message_toast('success' , 'Datos actualizados');
				},
				dataType 	: 'json' 
			});
		}
	
});


function load_images()
{
	let idproducto  = $('input[name="idproducto"]').val();

	$.ajax({
		url   	 	: base_url + '/admin/loadimagesid',
		method 		: 'POST',
		data 		: {idproducto : idproducto},
		success     : function(r){
			if(r.status) {
				let html = '<label for="imagen" class="col-form-label">Imágenes: </label><table class="table">'; 
				$.each(r.imagenes , function(index, imagen) {
					html += `<tr>
                            <td width="50%"><input type="file" id="imagen" class="form-control form-control-sm" multiple name="imagenes[]" data-idimagen="${imagen.imagen}"></td>
                            <td><a href="${ base_url + '/uploads/' + imagen.imagen }" target="_blank">${ imagen.imagen }</a></td>
                        </tr>`;
				});
				html += '</table>';
				$('#wrapper_products').html(html);
				return;
			}

			message_toast('error' , 'No se pudieron cargar las imagenes');
		},
		dataType    : 'json'
	});
}

load_images();