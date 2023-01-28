<div class="modal fade" id="modalCrearSociales" tabindex="-1" role="dialog" aria-labelledby="modalCrearSocialesLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCrearSocialesLabel">Cargar nueva red social</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-crearfoto" enctype="multipart/form-data" action="{{url('/admin/cms/institucional/sociales/')}}" method="POST" >
        @csrf
        <div class="form-group">
            <label for="">url</label>
                <input class="form-control" name="descripcion" type="text" required>
            </div>
            <span>Empresa:</span>
            <select name="empresa" class="form-control">
                <option value="-1">Seleccione</option>
                <option value="Facebook">Facebook</option>
                <option value="Linkedin">Linkedin</option>
                <option value="Instagram">Instagram</option>               
                <option value="Twitter">Twitter</option>               
            </select>
            <span>Estatus:</span>
            <select name="estatu_id" class="form-control">
                <option value="-1">Seleccione</option>
                <option value="1">Activo</option>               
                <option value="2">Inactivo</option>               
            </select>
            <input type="hidden" name="user_id" value="{{auth()->id()}}">
        </form>
      </div>
      <div class="modal-footer">
        <button form="form-crearfoto" type="submit" class="btn btn-primary">Crear</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>