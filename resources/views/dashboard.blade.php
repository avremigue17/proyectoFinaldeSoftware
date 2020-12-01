<x-app-layout >
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" align="center" style="font-size: 50px; margin: 0">
            -{{ __('MovieClub') }}-
        </h2>
    </x-slot>

    @if(Auth::user()->hasRole('Admin'))

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
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
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{url('/')}}/img/cover_movie_fondo1.jpg" class="d-block w-100" alt="..." style="width: 200px; height: 55vh">
    </div>
    <div class="carousel-item">
      <img src="{{url('/')}}/img/cover_movie_fondo2.jpg" class="d-block w-100" alt="..." style="width: 200px; height: 55vh">
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
</x-app-layout>
