<x-app-layout >
    <x-slot name="header">
       @if(Auth::user()->hasRole('Admin'))

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               <?php
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $database = "menutron";

    $conexion = new mysqli($servidor,$usuario,$password,$database);
    $conexion->set_charset("utf8");

    $viewRollos = $conexion->prepare("select * from rolloMasPedido");
    $viewRollos->execute();
    $viewResultrollos = $viewRollos->get_result();

    $entradas = $conexion->prepare("select fecha, sum(total) as total from venta where MONTH(fecha) = MONTH(CURRENT_DATE()) and Year(fecha) = Year(CURRENT_DATE()) group by fecha");
    $entradas->execute();
    $resultentradas = $entradas->get_result();

    $entradas2 = $conexion->prepare("select year(fecha) as año, sum(total) as total from venta group by YEAR(fecha)  order by año desc limit 6");
    $entradas2->execute();
    $resultentradas2 = $entradas2->get_result();

    $viewRollos->close();
    $entradas->close();
    $entradas2->close();

    $nombre = array();
    $cantidad= array();
    $fecha = array();
    $total = array();
    $año = array();
    $totalaño = array();

    
    foreach ($viewResultrollos as $indice => $fila)
    {
        array_push($nombre, $fila["nombre"]);
        array_push($cantidad, $fila["ventas"]);
    }

    foreach ($resultentradas as $indice => $fila)
    {
        array_push($fecha, $fila["fecha"]);
        array_push($total, $fila["total"]);
    }

    foreach ($resultentradas2 as $indice => $fila)
    {
        array_push($año, $fila["año"]);
        array_push($totalaño, $fila["total"]);
    }
?>

  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title></title>
    <!-- header -->
  <link href="css/bootstrap4-alpha3.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>

</head>

<body>

  <!-- sidebar -->
  <div class="sidebar-toggle" id="sidebar">
    <ul class="nav nav-sidebar">
      <li>
        <a>class="active">
          <i class="fa fa-clock-o fa-lg fa-fw" aria-hidden="true"></i>
          <span>Real Time</span>
        </a>
      </li>
      <li role="separator" class="divider"></li>
      <li>
        <a>
          <i class="fa fa-newspaper-o fa-lg fa-fw" aria-hidden="true"></i>
          <span>Overview</span>
        </a>
      </li>
      <li role="separator" class="divider"></li>
    </ul>
  </div>
  <!-- /sidebar -->

  <!-- page-content-wrapper -->
  <div class="page-content-toggle" id="page-content-wrapper">
    <div class="container-fluid">

    <!-- 1st row -->
      <!-- Primera Grafica-->
      <div class="row m-b-2">
        <div class="col-lg-4">
          <div class="card card-block">
            <h4 class="card-title">Los 5 Rollos Mas Vendidos</h4>
            <div id="users-device-doughnut-chart">
              <canvas id="myChart2" width="400" height="400"></canvas>
            </div>
          </div>
        </div>
      <!-- Primera Grafica-->
      <!-- Segunda Grafica-->
        <div class="col-lg-4">
          <div class="card card-block">
            <h4 class="card-title">Ventas de Mes</h4>
            <div id="users-medium-pie-chart">
              <canvas id="myChart" width="400" height="400"></canvas>
            </div>
          </div>
        </div>
      <!-- Segunda Grafica-->
      <!-- Tercera Grafica-->
        <div class="col-lg-4">
          <div class="card card-block">
            <h4 class="card-title">Año Actual vs Años Anteriores</h4>
            <div id="users-category-pie-chart">
              <canvas id="myChart3" width="400" height="400"></canvas>
            </div>
          </div>
        </div>
      </div>
      <!-- Tercera Grafica-->
    <!-- /1st row -->
</body>

<script>
//Segunda Grafica-->
var $fechas=<?php echo json_encode($fecha);?>;
var $totales=<?php echo json_encode($total);?>;

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: $fechas,
        datasets: [{
            label: 'Ventas por Día',
            data: $totales,
            backgroundColor:'rgba(54, 162, 235, 0.2)',
            borderColor:'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
//Segunda Grafica-->

//Primera Grafica-->
var $nombres=<?php echo json_encode($nombre);?>;
var $cantidades=<?php echo json_encode($cantidad);?>;

var ctx2 = document.getElementById('myChart2').getContext('2d');
var pieChart = new Chart(ctx2, {
    type: 'doughnut',
    data:{  labels:$nombres,
    datasets: [
        {
            data:$cantidades,
            backgroundColor: [
                "#FF6384",
                "#63FF84",
                "#84FF63",
                "#8463FF",
                "#6384FF"
            ]
        }]},
     options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
//Segunda Grafica-->

//Tercera Grafica-->
var $años=<?php echo json_encode($año);?>;
var $totalesaño=<?php echo json_encode($totalaño);?>;

var ctx3 = document.getElementById('myChart3').getContext('2d');
var myChart = new Chart(ctx3, {
    type: 'line',
    data: {
        labels: $años,
        datasets: [{
            label:"Ventas por Año",
            data: $totalesaño,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
//Segunda Grafica-->
</script>
            </div>
        </div>
    </div>

    @else
    <div class="py-12" style="background-color: rgb(26,32,44);">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{url('/')}}/img/cover_movie_fondo1.jpg" class="d-block w-100" alt="..." style="width: 200px; height: 65vh">
      <div class="carousel-caption d-none d-md-block" style="background-color: rgb(26,32,44);">
        <h5>MovieClub</h5>
        <p>Tus Peliculas y Series Favoritas.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{url('/')}}/img/cover_movie_fondo2.jpg" class="d-block w-100" alt="..." style="width: 200px; height: 65vh">
      <div class="carousel-caption d-none d-md-block" style="background-color: rgb(26,32,44);">
        <h5>Estrenos</h5>
        <p>Lo Mas Nuevo lo Encuentras en #MovieClub</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
            </div>
        </div>
    </div>


    @endif




    </x-slot>
</x-app-layout>
