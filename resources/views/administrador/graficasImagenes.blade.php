@extends('layouts.panel')
@section('contenido')
@include('layouts.partials.enlacesReportes')  
<div class="row pl-md-5 pt-5">
    <div class="col  pl-5 pr-5">
        <form action="{{route('reportesImagenes')}}" method="GET">
            <table class="table table-bordered">
                <tr>
                    <td>
                        Desde:
                    </td>

                    <td>
                        Hasta:
                    </td>

                    <td>
                        Categoria:
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
                        <select name="id_categoria" class="custom-select " id="">
                            <option value="-1" selectd>
                                Seleccione
                            </option>
                           
                        </select>
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
                        Ubicación:
                    </td>
                   <td>
                        Autor:
                    </td>
                    <td>
                        Tipo de grafica
                    </td>
                   
                </tr>               

                <tr>
                    <td>
                        <select name="id_coleccion" class="custom-select " id="">
                            <option  value="-1" selectd>
                                Seleccione
                            </option>
                          
                        </select>
                    </td>
                    <td>
                        <select name="id_ubicacion" class="custom-select " id="">
                            <option  value="-1" selectd>
                                Seleccione
                            </option>
                           
                        </select>
                    </td>
                    <td>
                        <select name="autor" id="autor" class="custom-select ">
                            <option value="-1">Seleccione</option>
                           
                        </select>
                    </td>

                    <td>
                        <select name="tipoGrafica" id="tipoGrafica" class="custom-select ">
                        <option value="-1">Seleccione</option>
                            <option value="1">lineal</option>
                            <option value="2">Barra</option>
                            <option value="2">Dona</option>
                           
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
        <h2>Grafica de productividad</h1>
        <canvas id="myChart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ["{{$trimestre[0]}}", '{{$trimestre[1]}}', '{{$trimestre[2]}}'],
      datasets: [{
        label: '# of Votes',
        data: [{{$canTrimestre[0]}}, {{$canTrimestre[1]}}, {{$canTrimestre[2]}}],
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