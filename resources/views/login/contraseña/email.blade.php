@extends('layouts.autentificacion')
@section('contenido')
<div class="row h-75">
    <div class="col d-flex flex-column justify-content-center align-items-center">
                    
        <div class="mb-4">
            <img src="{{asset('images/login-logo.png')}}" alt="">
        </div>
            
        <div class="w-75  mt-4">
            <form  method="POST" action="{{ route('password.email') }}" class="w-100">
            
                <input type="text" class="form-control mb-4 p-2" placeholder="Correo electronico">
                        
                <div class="d-flex justify-content-end mb-4">
                    <input class="btn btn-dark mb-4 mb-md-1" type="submit" value="Enviar correo">
                </div>

                <div>
                    <a href="{{ route('login') }}">Volver al login</a>
                </div>
            </form>
        </div>
    </div>
</div>    
@endsection