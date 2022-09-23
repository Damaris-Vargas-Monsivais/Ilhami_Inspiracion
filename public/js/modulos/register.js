var base_url 	= $('meta[name="base_url"]').attr('content');

$('body').on('click' , '.btn_register' , function(e)
{
	e.preventDefault();

	let form				= $('#form_register').serialize(),
		nombres				= $('input[name="nombres"]').val(),
		apellidos			= $('input[name="apellidos"]').val(),
		email				= $('input[name="email"]').val(),
		telefono			= $('input[name="telefono"]').val(),
		clave				= $('input[name="clave"]').val();

		if(nombres == '' || apellidos == '' || email == '' || 
			telefono == '' || clave == '')
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

		if(clave == '')
		{
			$('input[name="clave"]').addClass('is-invalid');	
		} else {
			$('input[name="clave"]').removeClass('is-invalid');
		}

		if(nombres != '' && apellidos != '' && email != '' && 
			telefono != '' && clave != '')
		{

			$.ajax({
				url			: base_url + '/admin/newrecord',
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
					window.location.href = base_url + '/admin/users'
				},
				dataType 	: 'json' 
			});
		}

});