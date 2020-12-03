<x-app-layout >
    <x-slot name="header">
       @if(Auth::user()->hasRole('Admin'))
       <h1 style="text-align: center;">
         KPI's Prioritarios
       </h1>

    <div class="py-12" >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               <?php
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $database = "laravel";

    $conexion = new mysqli($servidor,$usuario,$password,$database);
    $conexion->set_charset("utf8");

    $grafica1 = $conexion->prepare("select movies.estatus, count(estatus) as cantidad from movies group by movies.estatus");
    $grafica1->execute();
    $viewResulgrafica1 = $grafica1->get_result();
    $grafica1->close();

    $estatus = array();
    $cantidad= array();

    $grafica2 = $conexion->prepare("select movies.title, count(estatusLoan) as total from loans join movies on movies.id=loans.movie_id group by movies.title limit 3");
    $grafica2->execute();
    $viewResulgrafica2 = $grafica2->get_result();
    $grafica2->close();

    $masPedida = array();
    $total= array();

    $grafica3 = $conexion->prepare("select users.name as nombre, count(estatusLoan) as numero from loans join users on users.id=loans.user_id group by users.name limit 3");
    $grafica3->execute();
    $viewResulgrafica3 = $grafica3->get_result();
    $grafica3->close();

    $usuarioMas = array();
    $numeroPrestamos= array();

    
    foreach ($viewResulgrafica1 as $indice => $fila)
    {
        array_push($estatus, $fila["estatus"]);
        array_push($cantidad, $fila["cantidad"]);
    }

    foreach ($viewResulgrafica2 as $indice => $fila)
    {
        array_push($masPedida, $fila["title"]);
        array_push($total, $fila["total"]);
    }

    foreach ($viewResulgrafica3 as $indice => $fila)
    {
        array_push($usuarioMas, $fila["nombre"]);
        array_push($numeroPrestamos, $fila["numero"]);
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

  <!-- page-content-wrapper -->
  <div class="page-content-toggle" id="page-content-wrapper">
    <div class="container-fluid">

    <!-- 1st row -->
      <!-- Primera Grafica-->
      <div class="row m-b-2" >
        <div class="col-lg-4">
          <div class="card card-block">
            <h4 class="card-title" style="text-align: center;">Estatus de Peliculas</h4>
            <div id="users-device-doughnut-chart" >
              <canvas id="myChart2" width="400" height="350"></canvas>
            </div>
          </div>
        </div>
      <!-- Primera Grafica-->
      <!-- Segunda Grafica-->
        <div class="col-lg-4">
          <div class="card card-block">
            <h4 class="card-title" style="text-align: center;">Top Peliculas Mas Pedidas</h4>
            <div id="users-medium-pie-chart">
              <canvas id="myChart" width="400" height="350"></canvas>
            </div>
          </div>
        </div>
      <!-- Segunda Grafica-->
      <!-- Tercera Grafica-->
        <div class="col-lg-4">
          <div class="card card-block">
            <h4 class="card-title" style="text-align: center;">Top Clientes</h4>
            <div id="users-category-pie-chart">
              <canvas id="myChart3" width="400" height="350"></canvas>
            </div>
          </div>
        </div>
      </div>
      <!-- Tercera Grafica-->
    <!-- /1st row -->
</body>

<script>
//Segunda Grafica-->
var $masPedida=<?php echo json_encode($masPedida);?>;
var $total=<?php echo json_encode($total);?>;

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: $masPedida,
        datasets: [{
            label: 'Veces Pedida',
            data: $total,
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
var $estatus=<?php echo json_encode($estatus);?>;
var $cantidad=<?php echo json_encode($cantidad);?>;

var ctx2 = document.getElementById('myChart2').getContext('2d');
var pieChart = new Chart(ctx2, {
    type: 'doughnut',
    data:{  labels:$estatus,
    datasets: [
        {
            data:$cantidad,
            backgroundColor: [
                "#63FF84",
                "#FF6384"
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
//Primera Grafica-->

//Tercera Grafica-->
var $usuarioMas=<?php echo json_encode($usuarioMas);?>;
var $numeroPrestamos=<?php echo json_encode($numeroPrestamos);?>;

var ctx2 = document.getElementById('myChart3').getContext('2d');
var pieChart = new Chart(ctx2, {
    type: 'doughnut',
    data:{  labels:$usuarioMas,
    datasets: [
        {
            data:$numeroPrestamos,
            backgroundColor: [
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
//Tercera Grafica-->
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
