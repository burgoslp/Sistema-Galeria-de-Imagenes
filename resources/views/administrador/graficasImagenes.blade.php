@extends('layouts.panel')
@section('contenido')
@include('layouts.partials.enlacesReportes')  
<div class="row pl-md-5 pt-5">
    <div class="col  pl-5 pr-5">
        <form action="{{route('graficasImagenes')}}" method="GET">
            <table class="table table-bordered">
                <tr>
                    <td>
                        Desde:
                    </td>

                    <td>
                        Hasta:
                    </td>
                    <td>
                        Publicado:
                    </td>
                    <td>
                        Eliminado:
                    </td>
                </tr>
                <tr> 
                    <td class="mr-3">
                        <input name="fechaInicial" class="form-control" type="date">
                    </td>
                    <td>
                        <input name="fechafinal" class="form-control" type="date">
                    </td>
                    <td>
                        <select name="id_estatusPublicado" class="custom-select " id="">
                            <option  value="-1" selectd>
                                Seleccione
                            </option>
                           <option value="1">
                                Sí
                           </option>
                           <option value="2">
                                No
                           </option>
                        </select>
                    </td>
                    <td>
                        <select name="id_estatusEliminado" class="custom-select" id="">
                            <option  value="-1" selectd>
                                Seleccione
                            </option>
                            <option value="1">
                                Sí
                           </option>
                           <option value="2">
                                No
                           </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Coleccion:
                    </td>
                   <td>
                        Autor:
                    </td>
                    <td>
                        Tipo de grafica
                    </td>
                    <td>
                        Acción
                    </td>
                </tr>               

                <tr>
                    <td>
                        <select name="id_coleccion" class="custom-select " id="">
                            <option  value="-1" selectd>
                                Seleccione
                            </option>
                            @foreach($colecciones as $coleccion)
                            <option  value="{{$coleccion->id}}">
                                {{$coleccion->descripcion}}
                            </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select name="autor" id="autor" class="custom-select ">
                            <option value="-1">Seleccione</option>
                            @foreach($fotografos as $fotografo)
                            <option  value="{{$fotografo->id}}">
                                {{$fotografo->nombre}} {{$fotografo->apellido}}
                            </option>
                            @endforeach
                        </select>
                    </td>

                    <td>
                        <select name="tipoGrafica" id="tipoGrafica" class="custom-select ">
                        <option value="-1">Seleccione</option>
                            <option value="1">lineal</option>
                            <option value="2">Barra</option>
                            <option value="3">Dona</option>
                           
                        </select>
                    </td>
                    <td>
                        <button class="btn btn-success" type="submit">Generar</button>
                    </td>
                </tr>
            </table>
        </form>       
    </div>
</div>



<div class="row pl-md-5 pt-5">
    <div class="col  pl-5 pr-5">
        <h2>Grafica de productividad </h1>
        @if(!empty($stringfotosCant))
            <canvas id="myChart"></canvas>
        @else
        
        <div class="alert alert-info p-5" role="alert">
            INGRESE ALGUNO DE LOS CRITERIOS PARA OBTENER LA GRAFICA DESEADA
        </div>
        @endif
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');
@php
    if(!empty($stringfotosCant)){
        if(strpos($stringfotosCant,',')){
           echo sprintf('let arrayMeses="%s",arrayCantFotos="%s",tipoGrafica="%s"; arrayMeses=arrayMeses.split(","); arrayCantFotos=arrayCantFotos.split(",");',$stringArrayMeses,$stringfotosCant,$tipoGrafica);
        }else{
            echo sprintf('let arrayMeses=["%s"],arrayCantFotos=[%s],tipoGrafica="%s";',$stringArrayMeses,$stringfotosCant,$tipoGrafica);
        }
    }else{
        echo sprintf('let ArrayMeses=["ningun mes para mostrar"],arrayCantFotos[0];');
    }
@endphp
  new Chart(ctx, {
    type: tipoGrafica,
    data: {
      labels: arrayMeses,
      datasets: [{
        label: '# cantidad de fotos en el rango seleccionado',
        data: arrayCantFotos,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

@endsection