<div class="modal fade" id="modalCrearColeccion" tabindex="-1" role="dialog" aria-labelledby="modalcrearcoleccionLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalcrearcoleccionLabel">Crear nueva coleccion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-crearfoto" enctype="multipart/form-data" action="{{url($url)}}" method="POST" >
        @csrf
            <div class="form-group">
                <label for="">Nombre</label>
                    <input class="form-control" name="nombre" type="text">
            </div>

            <div class="form-group">
                <label for="">Descripción</label><br>
                   <textarea name="descripcion" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="">Fecha</label>
                    <input class="form-control" name="fecha" type="date">
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