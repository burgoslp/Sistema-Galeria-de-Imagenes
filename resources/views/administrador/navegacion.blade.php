@extends('layouts.panel')
@section('contenido')
@include('layouts.partials.enlacesCms')  
@if(!is_null(session('error')))
<div class="row pl-md-5 pt-5">
    <div class="col pl-5 pr-5">
            <div class="alert alert-danger" role="alert">
                {{session('error')}}
            </div>            
    </div>
</div>
<div class="row pl-md-5 ">
@else
<div class="row pl-md-5 pt-5">
@endif 
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
                    <th scope="col">
                        Cantidad de fotos:
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
                @foreach($categorias as $categoria)
                   <tr>
                        <td>
                            {{$loop->iteration}}
                        </td>
                        <td>
                            {{$categoria->descripcion}}
                        </td>
                        <td>
                           @php 
                                $x=0;
                                foreach($categoria->fotos as $foto){
                                    if($foto->estatu_id == 1){
                                        $x++;
                                    }                                   
                                }
                                echo $x;
                           @endphp
                        </td>
                        <td>
                           @if($categoria->estatu_id == 2)
                           No visible
                           @elseif($categoria->estatu_id == 1)
                            visible
                           @endif
                        </td>
                        <td class="d-flex">                               
                            @if($categoria->estatu_id == 2)                            
                                <form action="{{url('/admin/cms/secciones/navegacion/publicar')}}" method="POST"  class="mr-2">
                                @csrf                            
                                <input type="hidden" name="id" value="{{$categoria->id}}">
                                <button class="btn btn-success" type="submit">                                
                                    Publicar
                                </button>
                            @else
                            <form action="{{url('/admin/cms/secciones/navegacion/quitar')}}" method="POST"  class="mr-2">
                                @csrf                            
                                <input type="hidden" name="id" value="{{$categoria->id}}">
                                <button class="btn btn-danger" type="submit">                                
                                    Quitar
                                </button>
                            @endif
                        </form>
                        </td>
                   </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

