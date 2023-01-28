<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de banco de imagenes de ciudad caracas</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <style>
         ul li a{
            color:white;
            width:100px;
            text-align:center;
            border-bottom:3px solid transparent;
            transition:0.5s ease all;

        }
        ul li a:hover{
            background-color:white;
            color:black;
            border-bottom:3px solid red;
            transition:0.5s ease all;
        }

        .titulo-mark{
            background-color:black;
            color:white;
            padding:5px;
        }

        .border-mark{
            border-bottom:5px solid black;
        }



        .nav-item-h{
            padding:0;
            width:100%;

        }

        .nav-item-h a{
           width: 100%;
           border-left:5px solid transparent;
           padding:10px;
           border-bottom:0;
            text-align:left;
            color:black;
           display: block;
           transition:0.3s ease all;
            text-decoration:none;
        }

        .nav-item-h a span{
           
            text-align:right;
           

        }

        .nav-item-h a:hover{
            border-left:5px solid red;
            background-color:black;
            border-bottom:0;

            color:white;
            transition:0.3s ease all;

        }
        
    </style>
</head>
<body>
    <div class="container">
        <!-- seccion de redes sociales, inicio del login, fecha-->
        <div class="row justify-content-between align-items-center" style="background-color:rgb(237,237,237); color:gray;">
            <div class="col-auto p-1">
                <span>Caracas, </span> 
                @php 
                   echo date('F j, Y')
                @endphp
            </div>
            <div class="col-auto">
                @if(Auth::user())
                    @if(Auth::user()->hasRole('admin'))
                    
                    <a class="mr-1" href="{{url('admin/cms/institucional')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </a>
                    @else
                    
                    <a  class="mr-1" href="{{url('/operador')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </a>
                    
                    @endif
                @else
                    <a class="mr-1" href="{{url('/login')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16">
                            <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                            <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"/>
                        </svg>
                        
                    </a>
                @endif
                @if(count($sociales)!=0)
                    @foreach($sociales as $social)
                        @switch($social->empresa)
                            @case('Facebook')
                            <a href="#" class="mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                </svg>
                            </a>                   
                            @break
                            @case('Linkedin')
                            <a href="#" class="mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                                </svg>
                            </a>
                            @break
                            @case('Instagram')
                            <a href="#" class="mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                                </svg>
                            </a>                  
                            @break
                            @case('Twitter')
                            <a href="#" class="mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                                </svg>
                            </a>
                            @break
                        @endswitch
                    @endforeach
                @endif
            </div>
        </div>
        <!--fin seccion de redes sociales, inicio del login, fecha-->
        <!--seccion de cabezera slider de imagenes, logo-->
        <header class="row">
            @foreach($logo as $logotipo)
            <div class="col-auto">
                <img src="{{asset('images/cms/logos/'.$logotipo->url)}}" width="300px" height="300px">
            </div>
            @endforeach
            <div class="col p-0">
                @if(count($fotosEncabezado) != 3)
            
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                <img class="d-block w-100" src="{{asset('images/login-carousel1.jpg')}}"  style="height:300px;" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('images/login-carousel2.jpg')}}" style="height:300px;" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="{{asset('images/login-carousel3.jpg')}}" style="height:300px;" alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"  height="50%" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                @else
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @for ($i = 0; $i < count($fotosEncabezado); $i++)
                                @if($i == 0)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="active"></li>
                                @else
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>
                                @endif
                            @endfor
                        </ol>
                        <div class="carousel-inner">
                            @foreach($fotosEncabezado as $item)
                                @if($loop->first)
                                    <div class="carousel-item active">
                                @else
                                    <div class="carousel-item">
                                @endif
                                    <img class="d-block" style="height:300px; width:100%;" src="{{asset('images/fotografias/'.$item->persona_id.'/'.$item->url)}}" alt="{{$item->img}}">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>{{$item->locacion}}</h5>
                                        <p>{{$item->descripcion}}</p>
                                    </div>
                                </div>
                            @endforeach
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" height="50%" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </header>
        <!--fin seccion de cabezera slider de imagenes, logo-->
        <nav class="row mb-5" style="background-color:black;">
            <div class="col p-0">
                <ul class="nav">
                    @if(count($categorias) !=0)
                        @foreach($categorias as $categoria)
                        <li class="nav-item">
                            <a href="#" name="{{$categoria->descripcion}}" class="nav-link ">{{$categoria->descripcion}}</a>
                        </li>
                        @endforeach
                    @else
                    <li class="nav-item">
                        <a href="#" class="nav-link w-100">No hay navegación configurada</a>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
        @foreach($categorias as $categoria)
            <section class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <h1>{{$categoria->descripcion}}</h1>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($fotosPublicadas as $publicadas)
                            @if($publicadas->categoria_id == $categoria->id)   
                                    <div class="col-4 mb-3">
                                        <img src="{{asset('images/fotografias/'.$publicadas->persona_id.'/'.$publicadas->url)}}" alt="" width="100%" height="100%">
                                    </div>
                            @endif
                        @endforeach  
                    </div>
                </div>
            </section>
        @endforeach
        
        
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
</body>
</html>
