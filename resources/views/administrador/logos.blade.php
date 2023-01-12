@extends('layouts.panel')
@section('contenido')
@include('layouts.partials.enlacesCms')  
<div class="row pl-md-5 pt-5">
    @if(count($logos) !=0)
        @foreach($logos as $logo)
        <div class="col-auto pl-5 pr-5">
            <div class="card" style="width: 18rem; ">
                <img class="card-img-top" style="height:15rem;" src="{{asset('images/cms/logos/'.$logo->url)}}" alt="Card image cap">
                <div class="card-body p-1">                                     
                @if($logo->estatu_id ==1)
                  
                    <button class="btn btn-info w-100" type="submit" disabled>Activo</button>
                @else
                    <form class="d-inline" action="{{url('/admin/cms/institucional/logo/publicar')}}" method="POST">
                         @csrf
                        <input type="hidden" value="{{$logo->id}}" name="id">
                        <button class="btn btn-success w-100" type="submit" >Seleccionar</button>
                    </form>
                @endif
                </div>
            </div>     
        </div>
        @endforeach
    @else
    <div class="col pl-5 pr-5">
        <div class="alert alert-danger p-5" role="alert">
            No se ha cargado ningun logo por los momentos.
        </div>
    </div>   
    @endif   
    
</div>
@endsection
@section('modales')
@include('layouts.partials.modalCrearLogo') 
@endsection