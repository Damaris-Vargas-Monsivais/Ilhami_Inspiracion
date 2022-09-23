var base_url 	= $('meta[name="base_url"]').attr('content');


function load_datatable()
{
	let table  	= $('#table_products').DataTable({
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
	    "ajax"			: base_url + "/admin/getProducts",
	    "columns"		: [
	    	{data   : 'nombre'},
	    	{data   : 'descripcion', render : function(data) {
	    		return `<span style="text-align: justify">${data}</span>`;
	    	}},
	    	{data   : 'precio' , render: function(data) {
	    		return parseFloat(data).toFixed(2) + ' MXM'
	    	}},
	    	{data   : 'stock'},
	    	{data   : 'categoria'},
	    	{data   : 'btn'},
	    ]
	});

	return table;
}

load_datatable();

/*
	Dar de baja a un producto
*/

$('body').on('click' , '.btn_deleteproduct' , function(e) {
	e.preventDefault();

	let confirmar 	= confirm('¿Está seguro que quiere eliminar este producto?'),
		idproducto	= $(this).data('idproducto');
		if(!confirmar)
		{
			return;
		}

		$.ajax({
			url 		:	base_url + '/admin/deleteproduct',
			method  	:  'POST',
			data 		: 	{idproducto : idproducto},
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