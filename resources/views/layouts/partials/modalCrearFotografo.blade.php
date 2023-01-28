<div class="modal fade" id="modalcrearfotografo" tabindex="-1" role="dialog" aria-labelledby="modalcrearfotografoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalcrearfotografoLabel">Crear nuevo fotografo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-crearfoto" enctype="multipart/form-data" action="{{url('/admin/fotografo')}}" method="POST" >
        @csrf
            <div class="form-group">
                <label for="">Nombre</label>
                <input class="form-control" name="nombre" type="text" required>
            </div>
            <div class="form-group">
                <label for="">Apellido</label>
                <input class="form-control" name="apellido" type="text" required>
            </div>
            
            <div class="form-group">
                <label for="">Cedula</label>
                <input class="form-control" name="cedula" type="text" required>
            </div>

            <div class="form-group">
                <label for="">Correo</label>
                <input class="form-control" name="correo" type="email" required>
            </div>

            <div class="form-group">
              <label for="">Datos civiles</label>
              <select name="dat_civile_id" id="" class="custom-select w-100">
                @foreach($civiles as $civil)
                  <option value="{{$civil->id}}">{{$civil->descripcion}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="">Tipo de sexo</label>
              <select name="dat_sexo_id" id="" class="custom-select w-100">
                @foreach($sexos as $sexo)
                  <option value="{{$sexo->id}}">{{$sexo->descripcion}}</option>
                @endforeach
              </select>
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