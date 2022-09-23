var base_url 	= $('meta[name="base_url"]').attr('content');


function load_datatable()
{
	let table  	= $('#table_orders').DataTable({
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
	    "ajax"			: base_url + "/admin/getOrders",
	    "columns"		: [
	    	{data   : 'fecha', render : function(data) {
	    		return moment(data).format('DD-MM-YYYY');
	    	}},
	    	{data   : 'email'},
	    	{data   : 'resumen', render  : function(data) {
	    		return `<a href="${base_url + '/uploads/reportes/' + data}" class="text-info" target="_blank" data-toggle="tooltip" title="Ver" style="text-decoration: none"><span class="icon-eye"></span></a>`;
	    	}},
	    	{data   : 'estado' , render : function(data) {
	    		if(data == '1')
	    		{
	    			return `<span class="badge badge-warning">Pendiente</span>`;
	    		}
	    		else {
	    			return `<span class="badge badge-success">Entregado</span>`;
	    		}
	    	}},
	    	{data   : 'btn_orders'}
	    ]
	});

	return table;
}

load_datatable();



/*
	Actualizar estado de ORDEN
*/

$('body').on('click' , '.btn_updateorder' , function(e) {
	e.preventDefault();

	let confirmar 	= confirm('¿Cambiar estado de la orden?'),
		idventa		= $(this).data('idventa');
		if(!confirmar)
		{
			return;
		}

		$.ajax({
			url 		:	base_url + '/admin/updateorder',
			method  	:  'POST',
			data 		: 	{idventa : idventa},
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
				message_toast('success' , 'Registro actualizado');
			},
			dataType 	: 'json'
		});

});