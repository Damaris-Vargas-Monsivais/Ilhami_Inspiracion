<!-- Content -->
<div class="col-lg-9">
  <div class="padding-top-2x mt-2 hidden-lg-up"></div>
  <div class="column mt-2">
    <ul class="breadcrumbs">
      <li>
        <a href="">Actualizar información</a>
    </li>
</ul>
</div>


<div class="mt-2">
    <div class="row">
      <div class="col-lg-12 order-md-2">                
        <h3 class="d-inline-block">Actualizar información</h3>
        <form id="form_storesettings" class="card" autocomplete="off" enctype="multipart/form-data">
            @csrf
           <div class="card-body">
            <div class="row">

                <!--<div class="form-group col-md-4">
                   <label for="Logo" class="col-form-label">Logo: </label>
                   <input type="file" class="form-control form-control-sm" name="Logo" id="Logo">
               </div> -->

               <div class="form-group col-md-4">
                   <label for="telefono" class="col-form-label">Teléfono: </label>
                   <input type="hidden" name="idregistro" value="{{ $info->registro }}">
                   <input type="text" class="form-control form-control-sm" name="telefono" id="telefono" value="{{ $info->telefono }}">
               </div> 

               <div class="form-group col-md-4">
                   <label for="correo" class="col-form-label">E-mail: </label>
                   <input type="text" class="form-control form-control-sm" name="correo" id="correo" value="{{ $info->correo }}">
               </div>


                <div class="form-group col-md-4">
                    <label class="col-form-label" for="time-input">Horario de atención:</label>
                    <input class="form-control form-control-sm" type="time" id="time-input" name="hora_entrada" value="{{ $info->hora_entrada }}">
                    <label class="col-form-label" for="time-input">A:</label>
                    <input class="form-control form-control-sm" type="time" id="time-input" value="{{ $info->hora_salida }}" name="hora_salida">
                </div>

                <div class="form-group col-md-4">
                    <label class="col-form-label">Redes sociales (URL): </label>
                    <input type="text" class="form-control form-control-sm mb-1"  name="facebook" placeholder="Facebook">
                    <input type="text" class="form-control form-control-sm mb-1"  name="twitter" placeholder="Twitter">
                    <input type="text" class="form-control form-control-sm mb-1"  name="instagram" placeholder="Instagram">
                </div>

                <div class="form-group col-md-4">
                    <label for="logo" class="col-form-label">Logo:  <small class="text-muted text-danger">Se recomienda 900 x 370px </small></label>
                    <input type="file" id="logo" class="form-control form-control-sm"  name="logo">
                </div>

                <div id="wrapper_logo" class="form-group col-md-4">
                    
                </div>

              </div>

               <div class="row">
                    <div class="form-group col-md-4">
                        <button class="btn btn-success btn-sm btn-block btn_save_settings">Guardar</button>
                    </div>

                    <div class="form-group col-md-4">
                        <a href="{{ route('admin') }}" class="btn btn-danger btn-sm btn-block">Volver</a>
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
<script src="{{ asset('js/modulos/config.js?' . config('app.version')) }}"></script>