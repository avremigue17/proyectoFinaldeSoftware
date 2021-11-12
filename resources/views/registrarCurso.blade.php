<x-app-layout>

  <style type="text/css">

  </style>

  <x-slot name="header">
    
  </x-slot>

  <div class="container mt-10" style="float: left;">
    <div class="container" align="center">
      <h1 class="m-0">
         {{$course->name}}
      </h1>
    </div>

  	<div class="row row-cols-1 row-cols-md-2 g-4 p-5">
  <div class="col" align="center" data-toggle="modal" data-target="#plantilla1Modal" type="button">
    <div class="card">
      <img src="{{url('/')}}/img/plantilla.png" class="card-img-top" style="width: 100px; height: 100px; margin-left: 37%">
      <div class="card-body">
        <h5 class="card-title">Plantilla texto</h5>
        <p class="card-text">Al seleccionar esta plantilla se ingresara solo contenido en texto</p>
      </div>
    </div>
  </div>
  <div class="col" align="center">
    <div class="card">
      <img src="{{url('/')}}/img/plantilla.png" class="card-img-top" style="width: 100px; height: 100px; margin-left: 37%">
      <div class="card-body">
        <h5 class="card-title">Plantilla Mixta</h5>
        <p class="card-text">Al seleccionar esta plantilla se ingresara una imagen y contenido en texto</p>
      </div>
    </div>
  </div>
  <div class="col mt-3" align="center">
    <div class="card">
      <img src="{{url('/')}}/img/plantilla.png" class="card-img-top" style="width: 100px; height: 100px; margin-left: 37%">
      <div class="card-body">
        <h5 class="card-title">Plantilla Mixta doble</h5>
        <p class="card-text">Al seleccionar esta plantilla se ingresaran dos imagenes y dos contenidos en texto</p>
      </div>
    </div>
  </div>
  <div class="col mt-3" align="center">
    <div class="card">
      <img src="{{url('/')}}/img/plantilla.png" class="card-img-top" style="width: 100px; height: 100px; margin-left: 37%">
      <div class="card-body">
        <h5 class="card-title">Texto</h5>
        <p class="card-text">Al seleccionar esta plantilla se ingresara solo texto</p>
      </div>
    </div>
  </div>
</div> 	
</div>

<div class="modal fade" id="plantilla1Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content items-center" style="background-color: rgba(255,255,255,.9);">
        <div class="modal-header">
          <h5 class="modal-title"  style="font-weight: bolder;color: black;font-size: 40px">
                Nombre del curso
          </h5>
        </div>
        <div class="container">
          <form>
            <div>
                <label class="form-label" style="font-weight: bolder; margin-top: 5px;font-size: 20px">contenido</label>
                <input type="textarea" class="form-control" id="" name="titulocurso" required style="width: 100%; height: 200px">
              </div>
              <button type="submit" class="btn btn-primary mb-2" style="margin-top: 5px; margin-left: 41%">Agregar
              </button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 

</x-app-layout>