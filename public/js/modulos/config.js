var base_url 	= $('meta[name="base_url"]').attr('content');
	
function load_logo()
{
	$.ajax({
		url 		: base_url + '/admin/loadlogo',
		method 		: 'POST',
		success     : function(r){
			if(!r.status){
				alertify.alert(r.msg);
				return;
			}

			let html = `<label class="col-form-label">Actual:</label>
                    <img src="${base_url}/img/logo/${r.logo}" class="d-block mx-auto" alt="" width="50%">`;

            $('#wrapper_logo').html(html);
		},
		dataType 	: 'json'
	});
}

load_logo();

$('body').on('click' , '.btn_save_settings' , function(e) {
	e.preventDefault();
	
	let form = new FormData($('#form_storesettings')[0]);

		$.ajax({
			url 		: base_url + '/admin/store_settings',
			method 		: 'POST',
			data    	: form,
			cache 		: false,
			processData : false,
			contentType	: false,
			beforeSend	: function(){
				$('body').waitMe({
					effect  : 'ios'
				});
			},
			success     : function(r){
				if(!r.status){
					$('body').waitMe('hide');
					message_toast('error' , r.msg);
					return;
				}

				$('body').waitMe('hide');
				message_toast('success', r.msg);
				load_logoheader();
				load_logo();
			},
			dataType 	: 'json'
		});
});

