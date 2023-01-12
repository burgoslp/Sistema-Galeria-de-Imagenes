<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/galeria.css')}}">
	<link rel="stylesheet" href="{{asset('css/buscador.css')}}">
    <title>Panel administrador</title>
</head>
<body>
    <div class="container-fluid">
		<div class="row visibleb  ml-0 pr-2 panel-top justify-content-between">
            <div class="col-auto align-self-center">
                <a href="{{url('/')}}" class="logotipo pl-0">
					<img src="{{asset('images/login-logo.png')}}" width="60%">
				</a>
            </div>
            <nav class="col-auto">
                    <ul class="nav justify-content-end">
						@if(Route::is('index'))
                        <li class="nav-item">
                           <a id="boton-panel-create" class="nav-link" href="{{url('galeria/create')}}" data-toggle="modal" data-target="#exampleModal"><!-- enlace hacia formulario para crear fotos-->
                                <svg class="bi bi-plus-square icon" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                                    <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                                    <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                </svg>
                           </a>
                        </li>

						<li class="nav-item">
                           <a id="boton-panel-create" class="nav-link" href="{{url('galeria/create')}}" data-toggle="modal" data-target="#modalCargarcarpeta"><!-- enlace hacia formulario para crear fotos-->
						   		<svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
									<path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z"/>
									<path d="M13.5 10a.5.5 0 0 1 .5.5V12h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V13h-1.5a.5.5 0 0 1 0-1H13v-1.5a.5.5 0 0 1 .5-.5z"/>
								</svg>
                           </a>
                        </li>
						@endif
						<li class="nav-item">
							@guest
							<a class="nav-link" href="{{ route('login') }}">
                                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-door-open" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M1 15.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5zM11.5 2H11V1h.5A1.5 1.5 0 0 1 13 2.5V15h-1V2.5a.5.5 0 0 0-.5-.5z"/>
                                    <path fill-rule="evenodd" d="M10.828.122A.5.5 0 0 1 11 .5V15h-1V1.077l-6 .857V15H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117z"/>
                                    <path d="M8 9c0 .552.224 1 .5 1s.5-.448.5-1-.224-1-.5-1-.5.448-.5 1z"/>
                                    </svg>
                            </a>
							@endguest
							@auth
							<form id="logout-form" action="{{ route('logout') }}" method="POST">
                                 @csrf
								<a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-door-closed" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2zm1 0v13h8V2H4z"/>
									<path d="M7 9a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
									<path fill-rule="evenodd" d="M1 15.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z"/>
									</svg>  
                           		</a>	
                            </form> 
							@endauth
                        </li>
                    </ul>
                   
            </nav>
       </div>
        <div class="row" style="padding-top:55px;"><!--estilo en linea para serparar la columna horizontal del contenido principal-->
        	<div class="col-auto pt-3 visible hidden-sm-down panel-left"><!--columna del panel de navegacion vertical-->
				<div class="row m-0 pb-1" >
					<div class="col {{! Route::is('galeria.index') ?: 'iconpanelSelected'}}" >
						@if(Auth::user()->roles[0]['nombre']!='Admin')
 							<a href="{{url('operador/')}}" class="d-flex align-items-center">
						@else
							<a href="{{url('admin/')}}" class="d-flex align-items-center">
						@endif
						 <span class="icon-monitor {{! Route::is('galeria.index') ? 'iconpanel': ' '}} mr-4" style="">
						 	<svg class="bi bi-files-alt icon" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M12.002 4h-10a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1zm-10-1a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-10z"/>
                                    <path d="M10.648 8.646a.5.5 0 0 1 .577-.093l1.777 1.947V14h-12v-1l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71z"/>
                                    <path fill-rule="evenodd" d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM4 2h10a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1v1a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2h1a1 1 0 0 1 1-1z"/>
                            </svg>
						 </span>Galeria 
						</a>	
					</div>
				</div>
				<div class="row m-0 pb-1" >
					<div class="col {{! Route::is('galeria.index') ?: 'iconpanelSelected'}}" >
						@if(Auth::user()->roles[0]['nombre']!='Admin')
 							<a href="{{url('operador/publicado')}}" class="d-flex align-items-center">
						@else
							<a href="{{url('admin/publicado')}}" class="d-flex align-items-center">
						@endif
						 <span class="icon-monitor {{! Route::is('galeria.index') ? 'iconpanel': ' '}} mr-4" style="">
						 	<svg class="bi bi-files-alt icon" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							 <path d="M8.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
  							<path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v8l-2.083-2.083a.5.5 0 0 0-.76.063L8 11 5.835 9.7a.5.5 0 0 0-.611.076L3 12V2z"/></svg>
						 </span>Publicado 
						</a>	
					</div>
				</div>
				<div class="row m-0 pb-1">
					<div class="col  {{! Route::is('colecciones.index') ?: 'iconpanelSelected'}}">
						@if(Auth::user()->roles[0]['nombre']!='Admin')
						<a href="{{url('/operador/colecciones')}}" class="d-flex align-items-center">
						@else
						<a href="{{url('/admin/colecciones')}}" class="d-flex align-items-center">
						@endif
							<span class="icon-user-plus  {{! Route::is('colecciones.index') ? 'iconpanel': ' '}} mr-4" >
								<svg class="bi bi-plus-square icon" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path d="M4 1h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1H2a2 2 0 0 1 2-2z"/>
  									<path d="M2 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H2zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H2zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H2zm3-6.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1-.5-.5v-5z"/>
  									<path fill-rule="evenodd" d="M6 11.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5z"/>
								</svg>
							</span>Colecciones
						</a>
					</div>
				</div>
				@if(Auth::user()->roles[0]['nombre']=='Admin')
				<div class="row m-0 pb-1">
					<div class="col {{! Route::is('privado') ?: 'iconpanelSelected'}}">
						<a href="{{url('admin/fotografos')}}" class="d-flex align-items-center">
							<span class="icon-user-plus mr-4 {{! Route::is('privado') ? 'iconpanel': ' '}}" >
							<svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" fill="currentColor" class="bi bi-camera" viewBox="0 0 16 16">
								<path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"/>
								<path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
							</svg>
							</span>Fotografos 
						</a>
					</div>
				</div>
				@endif
				@if(Auth::user()->roles[0]['id']!=1)
				<div class="row m-0 pb-1" >
					<div class="col {{! Route::is('galeria.papelera') ?: 'iconpanelSelected'}}" >
 						<a href="{{url('admin/categorias')}}" class="d-flex align-items-center">
						 <span class="icon-monitor {{! Route::is('galeria.papelera') ? 'iconpanel': ' '}} mr-4" style="">
						 	<svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" fill="currentColor" class="bi bi-tags" viewBox="0 0 16 16">
								<path d="M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z"/>
								<path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z"/>
							</svg>
						 </span>categorias 
						</a>	
					</div>
				</div>
				@endif

				@if(Auth::user()->roles[0]['id']!=1)
				<div class="row m-0 pb-1" >
					<div class="col {{! Route::is('galeria.papelera') ?: 'iconpanelSelected'}}" >
 						<a href="{{url('admin/generos')}}" class="d-flex align-items-center">
						 <span class="icon-monitor {{! Route::is('galeria.papelera') ? 'iconpanel': ' '}} mr-4" style="">
						 	<svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" fill="currentColor" class="bi bi-gender-ambiguous" viewBox="0 0 16 16">
								<path fill-rule="evenodd" d="M11.5 1a.5.5 0 0 1 0-1h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-3.45 3.45A4 4 0 0 1 8.5 10.97V13H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V14H6a.5.5 0 0 1 0-1h1.5v-2.03a4 4 0 1 1 3.471-6.648L14.293 1H11.5zm-.997 4.346a3 3 0 1 0-5.006 3.309 3 3 0 0 0 5.006-3.31z"/>
							</svg>
						 </span>Generos 
						</a>	
					</div>
				</div>
				@endif

				@if(Auth::user()->roles[0]['id']!=1)
				<div class="row m-0 pb-1" >
					<div class="col {{! Route::is('galeria.papelera') ?: 'iconpanelSelected'}}" >
 						<a href="{{url('admin/estatus')}}" class="d-flex align-items-center">
						 <span class="icon-monitor {{! Route::is('galeria.papelera') ? 'iconpanel': ' '}} mr-4" style="">
						 	<svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" fill="currentColor" class="bi bi-device-ssd" viewBox="0 0 16 16">
								<path d="M4.75 4a.75.75 0 0 0-.75.75v3.5c0 .414.336.75.75.75h6.5a.75.75 0 0 0 .75-.75v-3.5a.75.75 0 0 0-.75-.75h-6.5ZM5 8V5h6v3H5Zm0-5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Zm7 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM4.5 11a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1Zm7 0a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1Z"/>
								<path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2Zm11 12V2a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1v-2a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2a1 1 0 0 0 1-1Zm-7.25 1v-2H5v2h.75Zm1.75 0v-2h-.75v2h.75Zm1.75 0v-2H8.5v2h.75ZM11 13h-.75v2H11v-2Z"/>
							</svg>
						 </span>Estatus civil 
						</a>	
					</div>
				</div>
				@endif

				@if(Auth::user()->roles[0]['id']!=1)
				<div class="row m-0 pb-1" >
					<div class="col {{! Route::is('galeria.papelera') ?: 'iconpanelSelected'}}" >
 						<a href="{{url('admin/usuarios')}}" class="d-flex align-items-center">
						 <span class="icon-monitor {{! Route::is('galeria.papelera') ? 'iconpanel': ' '}} mr-4" style="">
						 	<svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
								<path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
							</svg>
						 </span>Usuarios 
						</a>	
					</div>
				</div>
				@endif

				@if(Auth::user()->roles[0]['id']!='1')
				<div class="row m-0 pb-1" >
					<div class="col {{! Route::is('galeria.papelera') ?: 'iconpanelSelected'}}" >
 						<a href="{{url('admin/cms/institucional')}}" class="d-flex align-items-center">
						 <span class="icon-monitor {{! Route::is('galeria.papelera') ? 'iconpanel': ' '}} mr-4" style="">
						 	<svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" fill="currentColor" class="bi bi-apple" viewBox="0 0 16 16">
								<path d="M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282z"/>
								<path d="M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282z"/>
							</svg>
						 </span>CMS 
						</a>	
					</div>
				</div>
				@endif

				@if(Auth::user()->roles[0]['id']!='1')
				<div class="row m-0 pb-1" >
					<div class="col {{! Route::is('galeria.papelera') ?: 'iconpanelSelected'}}" >
 						<a href="{{url('admin/reportes')}}" class="d-flex align-items-center">
						 <span class="icon-monitor {{! Route::is('galeria.papelera') ? 'iconpanel': ' '}} mr-4" style="">
						 	<svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" fill="currentColor" class="bi bi-bar-chart-line" viewBox="0 0 16 16">
							<path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2zm1 12h2V2h-2v12zm-3 0V7H7v7h2zm-5 0v-3H2v3h2z"/>
							</svg>
						 </span>Reportes 
						</a>	
					</div>
				</div>
				@endif

				@if(Auth::user()->roles[0]['id']!=1)
				<div class="row m-0 pb-1" >
					<div class="col {{! Route::is('galeria.papelera') ?: 'iconpanelSelected'}}" >
 						<a href="{{url('/admin/papelera')}}" class="d-flex align-items-center">
						 <span class="icon-monitor {{! Route::is('galeria.papelera') ? 'iconpanel': ' '}} mr-4" style="">
						 	<svg class="bi bi-files-alt icon" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							 	<path fill-rule="evenodd" d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717L5.07 1.243zM3.5 10.5a.5.5 0 0 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 0 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 0 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 0 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 0 0-1 0v3a.5.5 0 0 0 1 0v-3z"/>
                            </svg>
						 </span>Papelera
						</a>	
					</div>
				</div>	
				@endif
			</div><!--fin columna del panel de navegacion vertical -->


			<div class="col-12">
				@yield('contenido')
			</div>
        </div>
    </div>
@yield('modales')

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
 <script src="{{asset('js/funcionalidad.js')}}"> </script>
</body>
</html>