<x-app-layout >
    <x-slot name="header">
       @if(Auth::user()->hasRole('Admin'))

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               <h1>
                 
                  HOLI




               </h1>
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
