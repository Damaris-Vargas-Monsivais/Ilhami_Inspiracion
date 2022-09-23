<!-- Content -->
<div class="col-lg-9">
  <div class="padding-top-2x mt-2 hidden-lg-up"></div>
  <div class="column mt-2">
    <ul class="breadcrumbs">
      <li>
        <a href="">Editar producto</a>
      </li>
    </ul>
  </div>

  <div class="mt-2">
    <div class="row">
      <div class="col-lg-12 order-md-2">
        <div class="mt-2">
          <div class="row">
            <div class="col-lg-12 order-md-2">                
              <h3 class="d-inline-block">Editar producto</h3>
              <form id="form_editproduct" class="card" autocomplete="off" enctype="multipart/form-data">
               @csrf
               <div class="card-body">
                <div class="row">
                     <div class="form-group col-md-4">
                       <label for="categoria" class="col-form-label">Categoría: </label>
                       <input type="hidden" name="idproducto" value="{{ $product->idproducto }}">
                       <select name="categoria" id="categoria" class="form-control form-control-sm" name="categoria">
                        <option value="">[SELECCIONE]</option>
                        @foreach($categorias as $categoria)
                          @if($product->categoriaid == $categoria->idcategoria)
                            <option id="{{ $categoria['idcategoria'] }}" value="{{ $categoria['idcategoria'] }}" selected>{{ $categoria['descripcion'] }}</option>
                          @else
                            <option id="{{ $categoria['idcategoria'] }}" value="{{ $categoria['idcategoria'] }}">{{ $categoria['descripcion'] }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div> 

                    <div class="form-group col-md-4">
                     <label for="nombre" class="col-form-label">Nombre: </label>
                     <input type="text" class="form-control form-control-sm" name="nombre" value="{{ $product->nombre }}">
                   </div> 

                   <div class="form-group col-md-4">
                     <label for="descripcion" class="col-form-label">Descripción: </label>
                     <textarea name="descripcion" id="descripcion" class="form-control form-control-sm" cols="8" rows="3">{{ $product->descripcion }}</textarea>
                   </div>
               </div>

               <div class="row">
                   <div class="form-group col-md-4">
                    <label for="precio" class="col-form-label">Precio: </label>
                    <input type="text" id="precio" class="form-control form-control-sm"  name="precio" placeholder="S/. 0.00" value="{{ number_format($product->precio , 2, '.' , ' ') }}">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="stock" class="col-form-label">Stock: </label>
                    <input type="text" id="stock" class="form-control form-control-sm"  name="stock" value="{{ $product->stock }}">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="sku" class="col-form-label">SKU: </label>
                    <input type="text" id="sku" class="form-control form-control-sm"  name="sku" value="{{ $product->sku  }}">
                  </div>
              </div>

              <div class="row">
                <div class="form-group col-md-4">
                    <label for="especificacion" class="col-form-label">Especificaciones: </label>
                    @foreach($especificaciones as $index => $especificacion)
                    <input type="text" class="form-control form-control-sm mb-2" data-idespecificacion="{{ $especificacion['idespecificacion'] }}" value="{{ $especificacion['descripcion'] }}" multiple name="especificacion[]">
                     @endforeach
                </div>

                <div class="form-group col-md-4">
                    <label for="caracteristica" class="col-form-label">Características: </label>
                    @foreach($caracteristicas as $index => $caracteristica)
                    <input type="text" class="form-control form-control-sm mb-2" data-idcaracteristica="{{ $caracteristica['idcaracteristica'] }}" value="{{ $caracteristica['descripcion'] }}" multiple name="caracteristica[]">
                     @endforeach
                </div>
              </div>

              <div class="row">
                <div id="wrapper_products" class="form-group col-md-8">
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-4">
                  <button class="btn btn-success btn-sm btn-block btn_editproduct">Aceptar</button>
                </div>

                <div class="form-group col-md-4">
                  <a href="{{ url('admin/products') }}" class="btn btn-danger btn-block btn-sm">Volver</a>
                </div>
              </div>
           </div>
         </form>
       </div>
     </div>
   </div>
      </div>
    </div>
  </div>
</div>
<!-- End content -->
</div>
</div>
<script src="{{ asset('js/modulos/editproduct.js?' . config('app.version')) }}"></script>