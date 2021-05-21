@extends('layouts.appb')
@section('content')
<script>
    google.charts.load('current', {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawVisualization1);

    function drawVisualization1() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Cliente', 'Solicitudes'],
          ['Cliente 1',  265],
          ['Cliente 2',  35],
          ['Cliente 3',  557],
          ]);

        var options = {
          title : 'Solicitudes por cliente global',
          seriesType: 'bars',
          
        };

        var chart = new google.visualization.ComboChart(document.getElementById('global'));
        chart.draw(data, options);
      }
      google.charts.load('current', {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawVisualization2);

    function drawVisualization2() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['role', 'cantidad'],
          ['Admin',  2,],
          ['Analista de información',  13],
          ['Analista de campo',  7],
          ['Analista de verificación',  5],
          ['Clientes',  21],
          
          ]);

        var options = {
          title : 'Usuarios activos',
          vAxis: {title: 'otro'},
          hAxis: {title: 'Otro'},
          seriesType: 'bars',
          
        };

        var chart = new google.visualization.ComboChart(document.getElementById('usuarios'));
        chart.draw(data, options);
      }

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          [ 'Company','Pendiente', 'En progreso', 'Finalizadas'],
          [ 'Colpensiones', 1,      12,         21,],
          [ 'Adecco', 3,      1,         15,],
          [ 'Ejercito', 7,      8,         19,],
        ]);

        var options = {
          title : 'Seguimiento de solicitudes',
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('solicitudes'));
        chart.draw(data, options);
      }

    </script>
    
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12 mx-auto text-center">
			<h1>Bienvenido, {{ Auth::user()->name }} {{ Auth::user()->lastname }}</h1>
		</div>
	</div>
    <!-- Identify where the chart should be drawn. -->
    <div class="row justify-content-center">
    	<!-- Grafica 1 -->
    
    	<div class="card col-lg-12 col-md-12 mb-2">
    		<div id="global"></div>
    	</div>
      
      <div class="card col-lg-12 col-md-12 mb-2">
        <div id="solicitudes"></div>
      </div>
    	<!-- Grafica 2 -->
    	<!-- <div class="card col-lg-6 col-md-12 mb-2">
    		<div id="piechart"></div>
    	</div> -->
      <div class="card col-lg-12 col-md-12 mb-2">
        <div id="usuarios"></div>
      </div>
    </div>
  </div>
  @endsection
