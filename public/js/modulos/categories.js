var base_url 	= $('meta[name="base_url"]').attr('content');


function load_datatable()
{
	let table  	= $('#table_categories').DataTable({
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
	    "ajax"			: base_url + "/admin/getCategories",
	    "columns"		: [
	    	{data   : 'descripcion'},
	    	{data   : 'imagen_referencia', render  : function(data) {
	    		return `<a href="${base_url + '/uploads/categorias/' + data}" target="_blank" data-toggle="tooltip" title="Ver"><img src="${base_url + '/uploads/categorias/' + data}" alt="" width="50px" height="60px;"></a>`;
	    	}},
	    	{data   : 'btn_categories'}
	    ]
	});

	return table;
}

load_datatable();



/*
	Dar de baja a una categoría
*/

$('body').on('click' , '.btn_deletecategorie' , function(e) {
	e.preventDefault();

	let confirmar 	= confirm('¿Está seguro que quiere eliminar esta categoría?'),
		idcategoria	= $(this).data('idcategoria');
		if(!confirmar)
		{
			return;
		}

		$.ajax({
			url 		:	base_url + '/admin/deletecategorie',
			method  	:  'POST',
			data 		: 	{idcategoria : idcategoria},
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