var base_url 	= $('meta[name="base_url"]').attr('content');

$('body').on('click' , '.btn_updatecategorie' , function(e)
{
	e.preventDefault();

	let form				= new FormData($('#form_editcategorie')[0]),
		descripcion			= $('input[name="descripcion"]').val();

		if(descripcion == '')
		{
			message_toast('warning' , 'El campo no debe quedar vacío');
		}	

		if(descripcion == '')
		{
			$('input[name="descripcion"]').addClass('is-invalid');
		}
		else {
			$('input[name="descripcion"]').removeClass('is-invalid');
		}


		if(descripcion != '')
		{

			$.ajax({
				url			: base_url + '/admin/storecategorie',
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
					load_imagecategorie();
					message_toast('success' , r.msg);
				},
				dataType 	: 'json' 
			});
		}

});


function load_imagecategorie()
{
	let idcategoria  = $('input[name="idcategoria"]').val();

	$.ajax({
		url   	 	: base_url + '/admin/loadimagesidcat',
		method 		: 'POST',
		data 		: {idcategoria : idcategoria},
		success     : function(r){
			if(r.status) {
				let html = `<p class="d-inline-block">Actual:</p><img src="${base_url + '/uploads/categorias/' + r.imagen['imagen_referencia']}" class="img-responsive img-rounded float-right" alt="" width="250px">`; 
				
				$('#wrapper_categorie').html(html);
				return;
			}

			message_toast('error' , 'No se pudieron cargar las imagenes');
		},
		dataType    : 'json'
	});
}

load_imagecategorie();