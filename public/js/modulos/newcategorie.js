/*

	Agregar
	
*/

var base_url 	= $('meta[name="base_url"]').attr('content');

$('body').on('click' , '.btn_save_categorie' , function(e)
{
	e.preventDefault();

	let form				= new FormData($('#form_newcategorie')[0]), 
		descripcion 		= $('input[name="descripcion"]').val();
		

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
				url			: base_url + '/admin/add_newcategorie',
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
					$('#form_newcategorie').trigger('reset');
					message_toast('success' , 'Agregado correctamente');
				},
				dataType 	: 'json' 
			});
		}

});