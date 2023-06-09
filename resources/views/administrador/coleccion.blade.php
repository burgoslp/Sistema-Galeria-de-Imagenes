@extends('layouts.panel')
@section('contenido')
<div class="row pl-md-5">
        @foreach($coleccion->fotos as $fotos)
            <div class="col-auto pt-4 pl-5">
                    <div class="card" style="width: 18rem; ">
                        <img class="card-img-top" style="height:18rem;" src="{{asset('images/fotografias/'.$fotos->persona_id.'/'.$fotos->url)}}" alt="Card image cap">
                        <div class="card-body">
                           
                            @if($fotos->estatu_id==2)
                                <form class="d-inline" action="{{url('/admin/coleccion/modificaEstatusFoto')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="put" />
                                    <input type="hidden" value="{{$fotos->id}}" name="id">
                                    <button class="btn btn-primary" type="submit">Publicar</button>
                                </form>
                            @else
                                <form class="d-inline" action="{{url('/admin/coleccion/modificaEstatusFoto')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="put" />
                                    <input type="hidden" value="{{$fotos->id}}" name="id">
                                    <button class="btn btn-primary" type="submit">Ocultar</button>
                                </form>
                            @endif
                            <form class="d-inline" action="{{url('/admin/coleccion')}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="put" />
                                <input type="hidden" value="{{$fotos->id}}" name="id">
                                <input type="hidden" value="{{$fotos->coleccione_id}}" name="coleccione_id">
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
        @endforeach
</div>
@endsection