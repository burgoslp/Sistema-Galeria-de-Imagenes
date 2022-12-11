@extends('layouts.panel')
@section('contenido')
@include('layouts.partials.enlacesReportes')  
<div class="row pl-md-5 pt-5">
    <div class="col  pl-5 pr-5">
        <form action="{{route('reportesFotografos')}}" method="GET">
            <table class="table table-bordered">
                <tr>
                    <td>
                        Desde:
                    </td>

                    <td>
                        Hasta:
                    </td>

                    <td>
                        Genero:
                    </td>

                    <td>
                        Estatus:
                    </td>
                    <td>
                        Nombre:
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
                        <select name="genero" class="custom-select name=" id="">
                            <option value="-1" selectd>
                                Seleccione
                            </option>
                            @foreach($generos as $genero)
                            <option value="{{$genero->id}}">
                                {{$genero->descripcion}}
                            </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select name="estatusCivil" class="custom-select name=" id="">
                            <option  value="-1" selectd>
                                Seleccione
                            </option>
                            @foreach($estatus as $estatu)
                            <option value="{{$estatu->id}}">
                                {{$estatu->descripcion}}
                            </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="text"  class="form-control" name="nombre">
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
        <h2>Historico de fotografos</h1>
        <table class="table">
            <thead class="thead-dark"> 
                <tr>
                    <th scope="col">
                        Nombre
                    </th>
                    <th>
                        Apellido
                    </th>
                    <th>
                        cedula:
                    </th>
                    <th>
                        correo:
                    </th>
                    <th>
                        Fecha de creación:
                    </th>
                    <th>
                        Estatus:
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr> 
                    @foreach($fotografos as $fotografo)
                    <tr>
                        <td>
                            {{$fotografo->nombre}}
                        </td>
                        <td>
                            {{$fotografo->apellido}}
                        </td>
                        <td>
                            {{$fotografo->cedula}}
                        </td>
                        <td>
                            {{$fotografo->correo}}
                        </td>
                        <td>
                            {{$fotografo->created_at}}
                        </td>
                        <td>
                            @if($fotografo->deleted_at <> null)
                            <div style="display:block; background-color:red; width:25px;height:25px; border-radius:80%;"> </div>
                            @else
                            <div style="display:block; background-color:green; width:25px;height:25px; border-radius:80%;"> </div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection