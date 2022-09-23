var base_url 	= $('meta[name="base_url"]').attr('content');

$('body').on('click' , '.btn_updateperfil' , function(e)
{
	e.preventDefault();

	let form				= $('#form_editperfil').serialize(),
		nombres				= $('input[name="nombres"]').val(),
		apellidos			= $('input[name="apellidos"]').val(),
		email				= $('input[name="email"]').val(),
		telefono			= $('input[name="telefono"]').val();

		if(nombres == '' || apellidos == '' || email == '' || 
			telefono == '')
		{
			message_toast('warning' , 'Los campos no deben quedar vacíos');
		}	

		if(nombres == '')
		{
			$('input[name="nombres"]').addClass('is-invalid');
		}
		else {
			$('input[name="nombres"]').removeClass('is-invalid');
		}

		if(apellidos == '')
		{
			$('input[name="apellidos"]').addClass('is-invalid');
		}
		else {
			$('input[name="apellidos"]').removeClass('is-invalid');
		}

		if(email == '')
		{
			$('input[name="email"]').addClass('is-invalid');
		} else {
			$('input[name="email"]').removeClass('is-invalid');
		}

		if(telefono == '')
		{
			$('input[name="telefono"]').addClass('is-invalid');
		} else {
			$('input[name="telefono"]').removeClass('is-invalid');
		}

		if(nombres != '' && apellidos != '' && email != '' && 
			telefono != '')
		{

			$.ajax({
				url			: base_url + '/admin/storeperfil',
				method		: 'POST',
				data    	: form,
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
					message_toast('success' , r.msg);
				},
				dataType 	: 'json' 
			});
		}

});