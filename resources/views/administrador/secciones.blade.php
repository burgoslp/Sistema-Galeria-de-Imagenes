@extends('layouts.panel')
@section('contenido')
@include('layouts.partials.enlacesCms')  
<div class="row pl-md-5 pt-5">
    <div class="col pl-5 pr-5 ">
            <div class="row m-0 bg-info mb-1 d-flex justify-content-center rounded">
                <a href="{{url('admin/cms/institucional/sociales')}}" class="w-100 h-100 p-2 d-block text-center">
                    <span class="lead">SOCIALES</span>
                </a>                
            </div>
        <div class="row m-0 mb-1 bg-info rounded">
            <div class="col-4 text-center">
                <a href="{{url('/admin/cms/institucional/logos')}}" class="w-100 h-100 p-5 d-block">
                    <span class="lead">LOGOTIPO</span>
                </a>      
            </div>
            
            <div class="col bg-success  text-center rounded">
               <a href="{{url('/admin/cms/secciones/encabezado')}}" class="w-100 h-100 p-5 d-block">
                    <span class="lead">ENCABEZADO</span>
               </a>
            </div>
        </div>
        <div class="row m-0 bg-info text-center rounded">
            <div class="col">
                <a href="{{url('/admin/cms/secciones/navegacion')}}" class="w-100 h-100 p-2 d-block">
                    <span class="lead">NAVEGACION</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection