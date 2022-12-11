<div class="modal fade" id="modalcrearUsuario" tabindex="-1" role="dialog" aria-labelledby="modalcrearUsuarioLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalcrearUsuarioLabel">Crear nuevo usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-crearfoto" enctype="multipart/form-data" action="{{url('/admin/usuarios')}}" method="POST" >
        @csrf
            <div class="form-group">
                <label for="">Tipo de usuario</label><br>
                <select name="id_role" id="" class="custom-select w-100">
                   @foreach($roles as $role)
                    <option value="{{$role->id}}">{{$role->nombre}}</option>
                   @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Nombre</label>
                    <input class="form-control" name="name" type="text">
            </div>
            <div class="form-group">
                <label for="">Correo</label>
                    <input class="form-control" name="email" type="text">
            </div>
            <div class="form-group">
                <label for="">Contraseña</label>
                    <input class="form-control" name="password" type="password">
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