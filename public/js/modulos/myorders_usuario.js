var base_url 	= $('meta[name="base_url"]').attr('content'),
	idusuario 	= $('input[name="idusuario"]').val();


function load_datatable()
{
	let table  	= $('#table_ordersusuario').DataTable({
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
	    "ajax"			: base_url + "/admin/getOrdersusuario/" + idusuario,
	    "columns"		: [
	    	{data   : 'idventa'},
	    	{data   : 'fecha', render : function(data) {
	    		return moment(data).format('DD-MM-YYYY');
	    	}},
	    	{data   : 'resumen', render  : function(data) {
	    		return `<a href="${base_url + '/uploads/reportes/' + data}" class="text-info" target="_blank" data-toggle="tooltip" title="Ver" style="text-decoration: none"><icon class="icon-eye"></icon></a>`;
	    	}}
	    ]
	});

	return table;
}

load_datatable();