/*
	
	Loguear

*/

var base_url 	= $('meta[name="base_url"]').attr('content');

$('body').on('click'  , '.btn_login' , function(e)
{
	e.preventDefault();
	let email 	= $('input[name="email"]').val(), 
		clave	= $('input[name="clave"]').val();

		if(email == '' || clave == '')
		{
			message_toast('warning', 'El campo no debe quedar vacío', '');
			return;
		} 


		$.ajax({
			url 		: base_url + '/login/sesion',
			method		: 'POST',
			data 		: {
				email : email, clave : clave
			},
			beforeSend 	: function() {
				$('body').waitMe({
					effect	 : 'orbit'
				});
			},
			success 	: function(r) {
				if(!r.status){
					$('body').waitMe('hide');
					message_toast('error', r.msg, '');
					return;
				}

				$('body').waitMe('hide');
				if(r.rolid == 1) {
					window.location.href = base_url + '/admin';
					return;
				}

				window.location.href = base_url + '/';
			},
			dataType 	: 'json'
		});

});