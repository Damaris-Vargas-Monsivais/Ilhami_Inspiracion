<a href="{{ route('editproduct' , $idproducto) }}" class="text-warning" style="text-decoration: none;" data-toggle="tooltip" title="Editar">
	<i class="icon-edit"></i>
</a>

<a href="{{ route('deleteproduct') }}" class="text-danger btn_deleteproduct" style="text-decoration: none;" data-toggle="tooltip" title="Eliminar" data-idproducto="{{ $idproducto }}">
	<i class="icon-trash"></i>
</a>