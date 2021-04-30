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
          ['Cliente 4',  139],
          ['Cliente 5',  236]
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
          ['Analista',  13],
          
          ]);

        var options = {
          title : 'Solicitudes por cliente',
          vAxis: {title: 'otro'},
          hAxis: {title: 'Otro'},
          seriesType: 'bars',
          
        };

        var chart = new google.visualization.ComboChart(document.getElementById('usuarios'));
        chart.draw(data, options);
      }

      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities',
          is3D: false,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          [ 'Company','Pendiente', 'En progreso', 'Finalizadas'],
          [ 'cliente 1', 1,      2,         5,],
          [ 'cliente 2', 1,      2,         5,],
          [ 'cliente 3', 1,      2,         5,],
        ]);

        var options = {
          title : 'Seguimiento usuarios',
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
      <div class="card col-lg-6 col-md-12 mb-2">
        <div id="usuarios"></div>
      </div>
    </div>
  </div>
  @endsection
