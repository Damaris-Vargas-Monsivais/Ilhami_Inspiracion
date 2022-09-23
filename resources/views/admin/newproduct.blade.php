<!-- Content -->
<div class="col-lg-9">
  <div class="padding-top-2x mt-2 hidden-lg-up"></div>
  <div class="column mt-2">
    <ul class="breadcrumbs">
      <li>
        <a href="">Nuevo producto</a>
    </li>
</ul>
</div>


<div class="mt-2">
    <div class="row">
      <div class="col-lg-12 order-md-2">                
        <h3 class="d-inline-block">Nuevo producto</h3>
        <form id="form_newproduct" class="card" autocomplete="off" enctype="multipart/form-data">
           <div class="card-body">
            <div class="row">
               <div class="form-group col-md-4">
                   <label for="categoria" class="col-form-label">Categoría: </label>
                   <select name="categoria" id="categoria" class="form-control form-control-sm" name="categoria">
                            <option value="">[SELECCIONE]</option>
                       @foreach($categorias as $categoria)
                            <option id="{{ $categoria['idcategoria'] }}" value="{{ $categoria['idcategoria'] }}">{{ $categoria['descripcion'] }}</option>
                       @endforeach
                   </select>
               </div> 

               <div class="form-group col-md-4">
                   <label for="nombre" class="col-form-label">Nombre: </label>
                   <input type="text" class="form-control form-control-sm" name="nombre">
               </div> 

               <div class="form-group col-md-4">
                   <label for="descripcion" class="col-form-label">Descripción: </label>
                   <textarea name="descripcion" id="descripcion" class="form-control form-control-sm" cols="8" rows="3"></textarea>
               </div>


                <div class="form-group col-md-4">
                    <label for="precio" class="col-form-label">Precio: </label>
                    <input type="text" id="precio" class="form-control form-control-sm"  name="precio" placeholder="mxn/. 0.00">
                </div>

                <div class="form-group col-md-4">
                    <label for="stock" class="col-form-label">Stock: </label>
                    <input type="text" id="stock" class="form-control form-control-sm"  name="stock">
                </div>

                <div class="form-group col-md-4">
                    <label for="sku" class="col-form-label">SKU: </label>
                    <input type="text" id="sku" class="form-control form-control-sm"  name="sku">
                </div>

                <div class="form-group col-md-4">
                    <label for="especificacion" class="col-form-label">Especificaciones: <i class="icon-plus-circle text-warning font-weight-bold align-middle btn_especificacion" data-toggle="tooltip" title="Agregar especificación" style="font-size: 13px"></i></label>

                    <input type="text" id="especificacion" class="form-control form-control-sm mb-2" multiple name="especificacion[]">
                </div>

                <div class="form-group col-md-4">
                    <label for="caracteristica" class="col-form-label">Características: <i class="icon-plus-circle text-warning font-weight-bold align-middle btn_caracteristica" data-toggle="tooltip" title="Agregar característica" style="font-size: 13px"></i></label>
                    <input type="text" id="caracteristica" class="form-control form-control-sm mb-2" multiple name="caracteristica[]">
                </div>

               <div class="form-group col-md-4">
                    <label for="imagen" class="col-form-label">Imágenes: <i class="icon-plus-circle text-warning font-weight-bold align-middle btn_imagenes" data-toggle="tooltip" title="Agregar imagen" style="font-size: 13px"></i></label>
                    <input type="file" id="imagen" class="form-control form-control-sm mb-2" name="imagenes[]">
               </div>

              </div>

               <div class="row">
                 <div class="form-group col-md-4">
                    <button class="btn btn-success btn-sm btn-block btn_save_product">Guardar</button>
                  </div>

                  <div class="form-group col-md-4">
                    <a href="{{ route('admin.products') }}" class="btn btn-danger btn-sm btn-block">Volver</a>
                  </div>
               </div>
           </div>
        </form>
    </div>
</div>
</div>
</div>
<!-- End content -->
</div>
</div>
<script src="{{ asset('js/modulos/newproduct.js?' . config('app.version')) }}"></script>