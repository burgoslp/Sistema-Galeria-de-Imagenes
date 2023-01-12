@extends('layouts.panel')
@section('contenido')
@include('layouts.partials.enlacesCms')  
<div class="row pl-md-5 pt-5">
    @if(count($direcciones) !=0)
    <div class="col pl-5 pr-5">
        <table class="table table-bordered">
            <thead class="thead-dark"> 
                <tr>
                    <th>
                        #
                    </th>
                    <th scope="col">
                        dirección
                    </th>                    
                    <th>
                        estatus:
                    </th>
                    <th>
                        acción:
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($direcciones as $direccion)
                <tr>
                    <td>
                        {{$loop->iteration}}
                    </td>
                    <td>
                        {{$direccion->descripcion}}
                    </td>
                    <td>
                        @if($direccion->estatu_id !=1)
                            Inactivo
                        @else
                            Activo
                        @endif
                    </td>
                    <td class="d-flex">
                        @if($direccion->estatu_id !=1)
                        <form action="{{url('/admin/cms/institucional/direcciones/publicar')}}" method="POST"  class="mr-2">
                            @csrf
                            
                            <input type="hidden" name="id" value="{{$direccion->id}}">
                            <button class="btn btn-success" type="submit">                                
                                Activar
                            </button>
                        </form>
                        @endif
                        <form action="{{url('/admin/cms/institucional/direcciones')}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="delete" />
                            <input type="hidden" name="id" value="{{$direccion->id}}">
                            <button class="btn btn-danger" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                </svg>
                            </button>
                        </form>                        
                    </td>
                </tr>
                @endforeach 
            </tbody>
        </table>
    </div>
    @else
    <div class="col pl-5 pr-5">
        <div class="alert alert-danger p-5" role="alert">
            No se ha cargado ninguna dirección por los momentos.
        </div>
    </div>  
   @endif
</div>
@endsection
@section('modales')
@include('layouts.partials.modalCrearDirecciones') 
@endsection