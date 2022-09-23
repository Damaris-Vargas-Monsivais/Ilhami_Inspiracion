<!-- Content -->
<div class="col-lg-9">
  <div class="padding-top-2x mt-2 hidden-lg-up"></div>
  <div class="column mt-2">
    <ul class="breadcrumbs">
      <li>
        <a href="">Nueva categoría</a>
    </li>
</ul>
</div>


<div class="mt-2">
    <div class="row">
      <div class="col-lg-12 order-md-2">                
        <h3 class="d-inline-block">Nueva categoría</h3>
        <form id="form_newcategorie" class="card" autocomplete="off" enctype="multipart/form-data">
          @csrf
           <div class="card-body">
                <div class="row">
                  <div class="form-group col-md-4">
                   <label for="descripcion" class="col-form-label">Descripción: </label>
                   <input type="text" class="form-control form-control-sm" name="descripcion">
                  </div>

                  <div class="form-group col-md-4">
                   <label for="imagen_referencia" class="col-form-label">Imagen de referencia: </label>
                   <input type="file" class="form-control form-control-sm" name="imagen_referencia">
                  </div> 
                </div>
                
               <div class="row">
                  <div class="form-group col-md-2">
                   <button class="btn btn-success btn-sm btn-block btn_save_categorie">Guardar</button>
                  </div>

                  <div class="form-group col-md-2">
                   <a href="{{ route('admin.categories') }}" class="btn btn-danger btn-block btn-sm">Volver</a>
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
<script src="{{ asset('js/modulos/newcategorie.js?' . config('app.version')) }}"></script>