<div class="modal fade" id="modalcrearCategoria" tabindex="-1" role="dialog" aria-labelledby="modalcrearCategoriaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalcrearCategoriaLabel">Cargar nueva categoría</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-crearfoto"  action="{{url('/admin/categoria')}}" method="POST" >
        @csrf
        <div class="form-group">
            <label for="">Nombre</label>
                <input class="form-control" id="descripcion" name="descripcion" required> 
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button form="form-crearfoto" type="submit" class="btn btn-primary">Crear</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>