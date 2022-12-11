@extends('layouts.panel')
@section('contenido')
<div class="row pl-md-5">
        @foreach($fotografos as $fotografo)
            @foreach($fotografo->foto as $fotos)
                <div class="col-auto pt-4 pl-5">
                    <div class="card" style="width: 18rem; ">
                        <img class="card-img-top" style="height:18rem;" src="{{asset('images/fotografias/'.$fotografo->id.'/'.$fotos->url)}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Author <br>{{$fotografo->nombre}} {{$fotografo->apellido}}</h5>
                            <p class="card-text">Fecha <br>{{$fotos->fecha}} </p>
                            <p  class="card-text">Descripción: <br> {{$fotos->descripcion}}</p>
                            <p  class="card-text">lugar: <br> {{$fotos->locacion}}</p>
                            @if($fotos->estatu_id==2)
                                <form class="d-inline" action="{{url('/admin/fotografia/publicar')}}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{$fotos->id}}" name="id">
                                    <button class="btn btn-primary" type="submit">Publicar</button>
                                </form>
                            @else
                                <form class="d-inline" action="{{url('/admin/fotografia/publicar')}}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{$fotos->id}}" name="id">
                                    <button class="btn btn-primary" type="submit">Ocultar</button>
                                </form>
                            @endif
                            <form class="d-inline" action="{{url('/admin/fotografia/eliminar')}}" method="POST">
                                @csrf
                                <input type="hidden" value="{{$fotos->id}}" name="id">
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
</div>
@endsection

@section('modales')

<!--Modales para crear fotografias-->
@include('layouts.partials.modalCrear',['url'=>'admin/fotografia'])
@include('layouts.partials.modalCrearMultiples',['url'=>'admin/fotografiaMultiples'])
@endsection