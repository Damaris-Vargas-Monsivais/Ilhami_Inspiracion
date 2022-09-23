var base_url 	= $('meta[name="base_url"]').attr('content');


function load_datatable()
{
	let table  	= $('#table_clients').DataTable({
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
	    "ajax"			: base_url + "/admin/getClients",
	    "columns"		: [
	    	{data   : 'idusuario'},
	    	{data   : 'nombres'},
	    	{data   : 'apellidos'},
	    	{data   : 'email'},
	    	{data   : 'telefono'},
	    	{data   : 'btn_clients'},
	    ]
	});

	return table;
}

load_datatable();



/*
	Dar de baja a un producto
*/

$('body').on('click' , '.btn_deleteclient' , function(e) {
	e.preventDefault();

	let confirmar 	= confirm('¿Está seguro que quiere eliminar a este cliente?'),
		idusuario	= $(this).data('idusuario');
		if(!confirmar)
		{
			return;
		}

		$.ajax({
			url 		:	base_url + '/admin/deleteclient',
			method  	:  'POST',
			data 		: 	{idusuario : idusuario},
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
				message_toast('success' , 'Registro eliminado');
			},
			dataType 	: 'json'
		});

});