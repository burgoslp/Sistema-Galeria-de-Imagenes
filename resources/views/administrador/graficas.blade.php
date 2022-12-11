@extends('layouts.panel')
@section('contenido')
@include('layouts.partials.enlacesReportes')    
<div class="row pl-md-5 pt-5">
    <div class="col  pl-5 pr-5">
        <h2>Grafica de Productividad General Trimestral</h1>
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
        label: 'Fotografias',
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