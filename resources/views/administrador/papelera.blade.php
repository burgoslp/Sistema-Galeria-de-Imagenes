@extends('layouts.panel')
@section('contenido')
<div class="row pl-md-5">
    <div class="col-12 pl-5 pr-5 pt-4">
        <div class="row justify-content-between align-items-center">
            <div class="col">
                <h1>
                    PAPELERA 
                </h1>
            </div>
            <div class="col-1">
                <form action="{{url('/admin/papelera/vaciar')}}" method="POST" class="d-inline-block">
                @csrf
                    <button type="submit" class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                            <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                    </button>
                </form>
            </div> 
        </div>
        <hr>
    </div>
</div>
<div class="row pl-md-5">
        
            @foreach($fotos as $fotos)
                <div class="col-auto pt-4 pl-5 ">
                    <div class="card" style="width: 18rem; ">
                        <img class="card-img-top" style="height:15rem;" src="{{asset('images/fotografias/'.$fotos->persona_id.'/'.$fotos->url)}}" alt="Card image cap">
                        <form action="{{url('/admin/papelera/restaurar')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$fotos->id}}">
                            <button class="btn btn-success w-100" type="submit">Resctaurar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        
</div>
@endsection