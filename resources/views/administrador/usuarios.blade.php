@extends('layouts.panel')
@section('contenido')
<div class="row pl-md-5 pt-5">
    <div class="col pl-5 pr-5">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#">Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" href="#" data-toggle="modal" data-target="#modalcrearUsuario">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                    </svg> 
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="row pl-md-5 pt-5">
    <div class="col pl-5 pr-5">
        <table class="table table-striped ">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Contraseña</th>
                <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
               @foreach($usuarios as $usuario)
               <tr>
                    <th scope="row">1</th>
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>{{$usuario->password}}</td>
                    <td class="d-flex justify-content-center">
                        @if($usuario->id != Auth::user()->id)
                        <form action="{{url('admin/usuarios')}}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="delete" />
                            <input type="hidden" name="id" value="{{$usuario->id}}">
                            <button type="submit" class="btn btn-danger d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </button>
                        </form>
                        @else
                        <div style="display:block; background-color:green; width:25px;height:25px; border-radius:80%;"> </div>
                        @endif
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('layouts.partials.modalCrearUsuario')
@endsection