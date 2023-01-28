@extends('layouts.autentificacion')
@section('contenido')

<div class="row h-75">
    <div class="col d-flex flex-column justify-content-center align-items-center">
                    
        <div class="mb-4">
            <img src="{{asset('images/login-logo.png')}}" width="400px" height="70px">
        </div>

        <div class="w-75  mt-4">
            <form class="w-100 " method="POST" action="{{ route('login') }}">
            @csrf
                <input id="email"  name="email" type="text" class="form-control mb-4 p-2 @error('email') is-invalid @enderror" placeholder="Usuario" aria-label="Username" aria-describedby="basic-addon1">
                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

                <input  id="password" name="password" type="password" class="form-control mb-4 p-2 @error('password') is-invalid @enderror" placeholder="Contraseña" aria-label="Username" aria-describedby="basic-addon1">
                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <div class="d-flex justify-content-end mb-4">
                    <input class="btn btn-dark mb-4 mb-md-1" type="submit" value="Iniciar sesion">
                </div>
                <!--
                <div>
                    <a href="{{ route('password.request') }}">olvidaste tu contraseña?</a>
                </div>-->
            </form>
        </div>
    </div>
</div>
@endsection