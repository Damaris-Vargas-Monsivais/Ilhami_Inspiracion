var base_url 	= $('meta[name="base_url"]').attr('content');


function load_datatable()
{
	let table  	= $('#table_users').DataTable({
		"destroy"		: true,
		"lengthMenu"	: [[4, 15, 30, -1], [4, 15, 30, 200]],
		ordering 		: false,
		language		: {
	        "decimal": "",
	        "emptyTable": "No hay información",
	        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
	        "infoEmpty": "Sin resultados encontrados",
	        "infoFiltered": "(Filtrado de _MAX_ entradas en total)",
	        "infoPostFix": "",
	        "thousands": ",",
	        "lengthMenu": "Mostrar _MENU_ Entradas",
	        "loadingRecords": "Cargando...",
	        "processing": "Procesando...",
	        "search": "Buscar:",
	        "zeroRecords": "Sin resultados encontrados",
	        "paginate": {
	            "first": "Primero",
	            "last": "Ultimo",
	            "next": "Siguiente",
	            "previous": "Anterior"
	        }
	    },

	    // Ajax
	    "serverSide"	: true,
	    "ajax"			: base_url + "/admin/getUsers",
	    "columns"		: [
	    	{data   : 'nombres'},
	    	{data   : 'apellidos'},
	    	{data   : 'email'},
	    	{data   : 'telefono'},
	    	{data   : 'action'}
	    ]
	});

	return table;
}

load_datatable();



/*
	Dar de baja a una categoría
*/

$('body').on('click' , '.check_estado' , function(e) {
	e.preventDefault();

	let confirmar 	= confirm('¿Cambiar estado de usuario?'),
		idusuario	= $(this).val(),
		estado 		= $(this).data('estado');
		if(!confirmar)
		{
			return;
		}

		$.ajax({
			url 		:	base_url + '/admin/updateuser',
			method  	:  'POST',
			data 		: 	{idusuario : idusuario , estado: estado},
			beforeSend	: 	function() {
				$('body').waitMe({
					effect 	: 'ios'
				});
			},
			success 	: 	function(r) {
				if(!r.status) {
					$('body').waitMe('hide');
					message_toast('warning' , r.msg);
					return;
				}

				$('body').waitMe('hide');
				load_datatable().ajax.reload();
				message_toast('success' , r.msg);
			},
			dataType 	: 'json'
		});

});