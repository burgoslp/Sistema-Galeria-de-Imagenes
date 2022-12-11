@extends('layouts.panel')
@section('contenido')
@include('layouts.partials.enlacesReportes')  
<div class="row pl-md-5 pt-5">
    <div class="col  pl-5 pr-5">
        <form action="{{route('reportesImagenes')}}" method="GET">
            <table class="table table-bordered">
                <tr>
                    <td>
                        Desde:
                    </td>

                    <td>
                        Hasta:
                    </td>

                    <td>
                        Categoria:
                    </td>

                    <td>
                        Publicado:
                    </td>
                    <td>
                        Eliminado:
                    </td>
                </tr>
                <tr> 
                    <td class="mr-3">
                        <input name="fechaInicial" class="form-control" type="date">
                    </td>
                    <td>
                        <input name="fechafinal" class="form-control" type="date">
                    </td>
                    <td>
                        <select name="id_categoria" class="custom-select " id="">
                            <option value="-1" selectd>
                                Seleccione
                            </option>
                            @foreach($categorias as $categoria)
                           <option  value="{{$categoria->id}}" selectd>
                                {{$categoria->descripcion}}
                            </option>
                           @endforeach
                        </select>
                    </td>
                    <td>
                        <select name="id_estatusPublicado" class="custom-select " id="">
                            <option  value="-1" selectd>
                                Seleccione
                            </option>
                           <option value="1">
                                Sí
                           </option>
                           <option value="2">
                                No
                           </option>
                        </select>
                    </td>
                    <td>
                        <select name="id_estatusEliminado" class="custom-select" id="">
                            <option  value="-1" selectd>
                                Seleccione
                            </option>
                            <option value="1">
                                Sí
                           </option>
                           <option value="2">
                                No
                           </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Coleccion:
                    </td>
                   <td>
                        Ubicación:
                    </td>
                   <td colspan="2">
                        Autor:
                    </td>
                   
                </tr>               

                <tr>
                    <td>
                        <select name="id_coleccion" class="custom-select " id="">
                            <option  value="-1" selectd>
                                Seleccione
                            </option>
                           @foreach($colecciones as $coleccion)
                           <option  value="{{$coleccion->id}}" selectd>
                                {{$coleccion->nombre}}
                            </option>
                           @endforeach
                        </select>
                    </td>
                    <td>
                        <select name="id_ubicacion" class="custom-select " id="">
                            <option  value="-1" selectd>
                                Seleccione
                            </option>
                           
                        </select>
                    </td>
                    <td colspan="2">
                        <select name="autor" id="autor" class="custom-select ">
                            <option value="-1">Seleccione</option>
                            @foreach ($fotografos as $fotografo)
                                <option value="{{$fotografo->id}}">
                                    {{$fotografo->nombre}} {{$fotografo->apellido}}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <button class="btn btn-success" type="submit">Generar</button>
                    </td>
                </tr>
            </table>
        </form>       
    </div>
</div>



<div class="row pl-md-5 pt-5">
    <div class="col  pl-5 pr-5">
        <h2>Historico de la galeria</h1>
        <table class="table">
            <thead class="thead-dark"> 
                <tr>
                    <th>
                        autor
                    </th>
                    <th scope="col">
                        descripcion
                    </th>
                    <th>
                        ubicación
                    </th>
                    <th>
                        fecha de subida:
                    </th>
                    <th>
                        url:
                    </th>
                    <th>
                        última modificación:
                    </th>
                    <th>
                        Estatus:
                    </th>
                </tr>
            </thead>
            <tbody>
               @foreach($fotos as $foto)
               <tr> 
                    <td>
                        {{$foto->nombre}}   
                    </td>
                    <td>
                        {{$foto->descripcion}}
                    </td>
                    <td>
                        {{$foto->locacion}}
                    </td>
                    <td>
                        {{$foto->fecha}}
                    </td>
                    <td>
                        {{$foto->url}}
                    </td>
                    <td>
                        {{$foto->updated_at}}
                    </td>
                    <td>
                        @if($foto->deleted_at <> null)
                        <div style="display:block; background-color:red; width:25px;height:25px; border-radius:80%;"> </div>
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
@endsection