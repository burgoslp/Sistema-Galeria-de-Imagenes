<div class="modal fade" id="modalCrearLogos" tabindex="-1" role="dialog" aria-labelledby="modalCrearLogosLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCrearLogosLabel">Cargar nuevo logo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-agregarLogo" enctype="multipart/form-data" action="{{url('/admin/cms/institucional/logo')}}" method="POST" >
        @csrf
        <div class="form-group">
                <label for="exampleFormControlFile1">Archivo</label>
                <input type="file" name="file" class="form-control-file" >
        </div>
        <span>Estatus:</span>
        <select name="estatu_id" class="form-control">
                <option value="-1">Seleccione</option>
                <option value="1">Activo</option>                    
                <option value="2">Inactivo</option>                    
         </select>
         <input type="hidden" name="user_id" class="form-control" value="{{auth()->id()}}">

      </div>
      <div class="modal-footer">
        <button form="form-agregarLogo" type="submit" class="btn btn-primary">Crear</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>