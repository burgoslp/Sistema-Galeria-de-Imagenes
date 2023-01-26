@extends('layouts.panel')
@section('contenido')
@include('layouts.partials.enlacesCms')  
<div class="row pl-md-5 pt-5">
    <div class="col pl-5 pr-5 ">
    <table class="table table-bordered">
            <thead class="thead-dark"> 
                <tr>
                    <th>
                        #
                    </th>
                    <th scope="col">
                        descripción:
                    </th>
                    <th>
                        url:
                    </th>
                    <th>
                        fecha subida:
                    </th>
                    <th>
                        seccion:
                    </th>
                    <th>
                        acción:
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($fotosPublicadas as $publicadas)
                   <tr>
                        <td>
                            {{$loop->iteration}}
                        </td>
                        <td>
                            {{$publicadas->descripcion}}
                        </td>
                        <td>
                            {{$publicadas->url}}
                        </td>
                        <td>
                            {{$publicadas->created_at}}
                        </td>
                        <td>
                           @if($publicadas->seccion_id == null)
                            Sin sección
                           @elseif($publicadas->seccion_id == 1)
                            Encabezado
                           @endif
                        </td>
                        <td class="d-flex">    
                           
                            @if($publicadas->seccion_id == null)                            
                                <form action="{{url('/admin/cms/secciones/encabezado/conectar')}}" method="POST"  class="mr-2">
                                @csrf                            
                                <input type="hidden" name="id" value="{{$publicadas->id}}">
                                <button class="btn btn-success" type="submit">                                
                                    Conectar
                                </button>
                            @else
                            <form action="{{url('/admin/cms/secciones/encabezado/quitar')}}" method="POST"  class="mr-2">
                                @csrf                            
                                <input type="hidden" name="id" value="{{$publicadas->id}}">
                                <button class="btn btn-danger" type="submit">                                
                                    quitar
                                </button>
                            @endif
                            <button class="btn btn-info mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                </svg>
                            </button>
                        </form>
                        </td>
                   </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection