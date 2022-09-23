var base_url 	= $('meta[name="base_url"]').attr('content');

function message_toast(type, message, title)
{
	switch(type)
	{
		case 'success':
			toastr.success(message , title, {
				"positionClass": "toast-bottom-right"
			});
			break;

		case 'info':
			toastr.info(message , title, {
				"positionClass": "toast-bottom-right"
			});
			break;

		case 'error':
			toastr.error(message , title, {
				"positionClass": "toast-bottom-right"
			});
			break;

		case 'warning':
			toastr.warning(message , title, {
				"positionClass": "toast-bottom-right"
			});
			break;
	}
}

message_toast();


function load_cantproductscart()
{
	$.ajax({
		url 		: base_url + '/cart/cantproductscart',
		method  	: 'POST',
		success		: function(r) {
			if(!r.status) {
				alert(r.msg);
				return;
			}

			$('.cant_productcart').html(r.cantidad);
		},
		dataType	: 'json'
	});

	return false;
}

load_cantproductscart();