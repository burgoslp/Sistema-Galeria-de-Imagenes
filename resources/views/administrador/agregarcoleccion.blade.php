@extends('layouts.panel')
@section('contenido')
<div class="row pl-md-5">
        @foreach($fotos as $foto)
            <div class="col-auto pt-4 pl-5">
                    <div class="card" style="width: 18rem; ">
                        <img class="card-img-top" style="height:18rem;" src="{{asset('images/fotografias/'.$foto->persona_id.'/'.$foto->url)}}" alt="Card image cap">
                        <div class="card-body">
                           
                        <form class="d-inline" action="{{url('/admin/coleccion/agregar')}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="put" />
                                <input type="hidden" value="{{$foto->id}}" name="id">
                                <input type="hidden" value="{{$id}}" name="coleccione_id">
                                <button class="btn btn-success w-100" type="submit">Agregar</button>
                            </form>
                        </div>
                    </div>
                </div>
        @endforeach
</div>
@endsection