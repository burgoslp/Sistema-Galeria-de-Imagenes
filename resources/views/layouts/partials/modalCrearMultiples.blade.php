<div class="modal fade" id="modalCargarcarpeta" tabindex="-1" role="dialog" aria-labelledby="modalCargarcarpeta" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCargarcarpeta">Cargar carpeta de fotos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-crearfotomultiple" enctype="multipart/form-data" action="{{url($url)}}" method="POST" >
        @csrf
        <input type="hidden" name="estatu_id" value="2">
            <span>Autor:</span>
            <select name="persona_id" class="form-control">
                <option value="-1">Seleccione</option>
                @foreach($fotografos as $fotografo)
                    <option value="{{$fotografo->id}}">{{$fotografo->nombre}}</option>
                @endforeach
            </select>
            <br>
            
            <span>Colección:</span>
            <select name="coleccione_id" class="form-control">
                <option>Seleccione</option>
                @foreach($colecciones as $coleccion)
                    <option value="{{$coleccion->id}}">{{$coleccion->nombre}}</option>
                @endforeach
            </select><br>

            <span>Categoria:</span>
            <select name="categoria_id" class="form-control">
                <option>Seleccione</option>
                @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->descripcion}}</option>
                @endforeach
            </select><br>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descripción</label>
                <textarea name="descripcion" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
            </div>

           

            <div class="form-group">

                <label for="">Locación</label>
                <input class="form-control" name="locacion" type="text" required>
            </div>

            <div class="form-group">
                <label for="">Fecha</label>
                <input class="form-control" name="fecha" type="text" required>
            </div>

            <div class="form-group">
                <label for="exampleFormControlFile1">Elige la fotografia</label>
                <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="" required accept="image/*">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button form="form-crearfotomultiple" type="submit" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>