<x-app-layout>

  <style type="text/css">

  </style>

  <x-slot name="header">
    
  </x-slot>
@if(Auth::user()->hasRole('Admin'))
  <div class="container" style="float: left;">
    <div class="row row-cols-1 row-cols-md-2 g-4 p-5" style="text-align: center;">
      <div class="col-md-10 p-2" data-toggle="modal" data-target="#areaModal" type="button">
        <div class="card" style="background-color: #03989E">
          <div class="card-body">
            <h1 style="color: white">Registrar un Area / Puesto</h1>
          </div>
        </div>
      </div>
      <div class="col-md-10 p-2" data-toggle="modal" data-target="#candidatoModal" type="button">
        <div class="card" style="background-color: #03989E">
          <div class="card-body">
            <h1 style="color: white">Registrar un Candidato</h1>
          </div>
        </div>
      </div>
      <div class="col-md-10 p-2" data-toggle="modal" data-target="#cursonuevoModal" type="button">
        <div class="card" style="background-color: #03989E">
          <div class="card-body">
            <!--<a href="{{ route('registrarCurso')}}">-->
              <h1 style="color: white">Registrar un Curso nuevo</h1>
            <!--</a>-->
          </div>
        </div>
      </div>
      <div class="col-md-10 p-2">
        <div class="card" style="background-color: #03989E">
          <div class="card-body">
            <a href="{{ route('dashboard')}}">
              <h1 style="color: white">Tablero de informacion</h1>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
@else
  <div class="container" style="float: left;">
    <div class="row row-cols-1 row-cols-md-4 g-4 p-5" style="text-align: center;">
      <div class="col-md-5 p-2">
        <div class="card" style="background-color: #03989E; height: 80vh">
          <div class="p-2 mt-2" style="float: left;">
            <h2 style="color: white">Cursos Disponibles</h2>
          </div>
          <div style="background-color: white; height: 85%; float: left; margin: 2%">
            <div class="card">
              <?php foreach($coursePosts as $key => $coursePost): $course = $courses[$key]; ?>
                @if($coursePost->post_id == $userPost->post_id) 
                  <div class="card-body">
                    <h5 class="card-title" style="font-weight: bolder;">{{$course['name']}}</h5>
                    <!--<p class="card-text">Descripcion del curso</p>-->
                    <a href="#" class="btn btn-primary">Comenzar</a>
                  </div>
                @endif
              <?php endforeach;?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5 p-2">
        <div class="card" style="background-color: #03989E; height: 80vh">
          <div class="p-2 mt-2" style="float: left;">
            <h2 style="color: white">Cursos Realizados</h2>
          </div>
          <div style="background-color: white; height: 85%; float: left; margin: 2%">
            <div class="card">
              @foreach($records as $key => $record)
                @if($record->user_id == Auth::user()->id)
                <div class="card-body">
                  <h5 class="card-title" style="font-weight: bolder;">{{$record->course->name}}</h5>
                  <!--<p class="card-text">Descripcion del curso</p>-->
                  <a href="#" class="btn btn-primary">Comenzar</a>
                </div>
                @endif
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endif


  <!-- Modal -->
  <div class="modal fade" id="areaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content items-center" style="background-color: rgba(255,255,255,.9);">
        <div class="modal-header">
          <h5 class="modal-title"  style="font-weight: bolder;color: black;font-size: 40px">
                Registrar un Area / Puesto
          </h5>
        </div>
        <div class="container mt-2">
          <div class="row" style="text-align: center;">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title" style="color: white; font-weight: bolder; background-color: #03989E; border-radius: 10px">Registrar Area</h2>
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title" style="font-weight: bolder;font-size: 25px">Nombre
                      </h5>
                      <form method="get" action="{{ url('create-area') }}" enctype="multipart/form-data">
                        <input type="text" class="form-control" id="name" required="" name="name">
                        <button type="submit" class="btn btn-primary" style="margin-top: 10px">Guardar
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 mb-2">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title" style="color: white; font-weight: bolder; background-color: #03989E; border-radius: 10px">Registrar Puesto</h2>
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title" style="font-weight: bolder;font-size: 25px">Seleccionar Area
                      </h5>
                      <form method="get" action="{{ url('create-post') }}" enctype="multipart/form-data">
                        <select class="form-select" name="area_id">
                          @foreach($areas as $area)
                            <option value="{{$area->id}}">{{ $area->name }}</option>
                          @endforeach
                        </select>
                        <h5 class="card-title" style="font-weight: bolder; margin-top: 10px;font-size: 25px">Nombre
                        </h5>
                        <input type="text" class="form-control" id="name" required="" name="name">
                        <button type="submit" class="btn btn-primary" style="margin-top: 10px">Guardar
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>  
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="candidatoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content items-center" style="background-color: rgba(255,255,255,.9);">
        <div class="modal-header">
          <h5 class="modal-title"  style="font-weight: bolder;color: black;font-size: 40px">
                Registrar un Candidato
          </h5>
        </div>
        <div class="container">
          <div class="container bg-white" style="margin-top:3px; margin-bottom: 3px">
            <form class="mb-2" method="get" action="{{ url('create-user') }}" enctype="multipart/form-data">
              <div>
                <label class="form-label" style="font-weight: bolder; margin-top: 5px;font-size: 20px">Nombre:</label>
                <input type="textarea" required class="form-control" id="" name="name">
              </div>
              <div>
                <label class="form-label" style="font-weight: bolder; margin-top: 5px;font-size: 20px">Apellido Paterno:</label>
                <input type="textarea" required class="form-control" id="" name="middle_name">
              </div>
              <div>
                <label class="form-label" style="font-weight: bolder; margin-top: 5px;font-size: 20px">Apellido Materno:</label>
                <input type="textarea" required class="form-control" id="" name="last_name">
              </div>
              <div >
                <label class="form-label" style="font-weight: bolder; margin-top: 5px;font-size: 20px">Correo:</label>
                <input type="textarea" required class="form-control" id="" name="email">
              </div>
              <!--<div >
                <label class="form-label" style="font-weight: bolder; margin-top: 5px;font-size: 20px">Apellido Materno:</label>
                <input type="textarea" class="form-control" id="">
              </div>-->
              <div >
                <label class="form-label" style="font-weight: bolder; margin-top: 10px;font-size: 20px">Area:</label>
                <select id="user-areas" name="area_id" onchange="userAreas()" class="form-select" required>
                  <option disabled selected value> -- select an option -- </option>
                  @foreach($areas as $area)
                    <option value="{{$area->id}}">{{ $area->name }}</option>
                  @endforeach
                </select>
              </div>
              <div >
                <label class="form-label" style="font-weight: bolder; margin-top: 10px;font-size: 20px">Puesto:</label>
                <select id="user-posts" name="post_id" class="form-select" required>
                </select>
              </div>
              <div >
                <label class="form-label" style="font-weight: bolder; margin-top: 5px;font-size: 20px">Nickname:</label>
                <input type="textarea" class="form-control" id="" name="nick_name" required>
              </div>
              <button type="submit" class="btn btn-primary mb-2" style="margin-top: 5px; margin-left: 41%">Guardar
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="cursonuevoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content items-center" style="background-color: rgba(255,255,255,.9);">
        <div class="modal-header">
          <h5 class="modal-title"  style="font-weight: bolder;color: black;font-size: 40px">
                Registrar un Curso Nuevo
          </h5>
        </div>
        <div class="container">
          <form class="mb-2" method="get" action="{{ url('create-course') }}" enctype="multipart/form-data">
            <label class="form-label" style="font-weight: bolder; margin-top: 5px;font-size: 20px">Puesto del Curso</label>
            <select class="form-select" name="post_id">
              @foreach($posts as $post)
                <option value="{{$post->id}}">{{ $post->name }}</option>
              @endforeach
            </select>
            <div >
              <label class="form-label" style="font-weight: bolder; margin-top: 5px;font-size: 20px">Titulo</label>
              <input type="textarea" class="form-control" id="" name="name" required >
            </div>
            <button type="submit" class="btn btn-primary mb-2" style="margin-top: 5px; margin-left: 41%;">Guardar
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
      

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
  <script type="text/javascript">

    function userAreas(){
      document.getElementById("user-posts").innerHTML = "";
      var select = document.getElementById('user-posts');

      <?php foreach ($posts as $post): ?>
        if("{{$post->area_id}}" == document.getElementById('user-areas').value)
        {
          option = document.createElement('option');
          option.setAttribute('value', "{{$post->id}}");
          option.appendChild(document.createTextNode("{{$post->name}}"));
          select.appendChild(option);
        }  
      <?php endforeach ?>
    }

    //remueve un area
    function removeArea(id,target)
    {
      swal({
        title: "¿Desea Eliminar el area?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) =>{
          if (willDelete) {
            axios({
            method: 'delete',
            url: '{{ url('delete-area') }}',
            data: {
              id: id,
              _token: '{{ csrf_token() }}'
            }
          }).then(function (response) { 
              if(response.data.code==200){
                swal("¡area Eliminada Correctamente!", {
                  icon: "success",
                });
                $(target).parent().remove();
              }else{
                swal("¡Ocurrio un Error!", {
                  icon: "error",
                });
              }
          });
            
          } else {
            swal("¡Solicitud Cancelada!");
          }
      });
    }

    //remove puesto
    function removePost(id,target)
    {
      swal({
        title: "¿Desea Eliminar el puesto?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) =>{
          if (willDelete) {
            axios({
            method: 'delete',
            url: '{{ url('delete-post') }}',
            data: {
              id: id,
              _token: '{{ csrf_token() }}'
            }
          }).then(function (response) { 
              if(response.data.code==200){
                swal("puesto Eliminado Correctamente!", {
                  icon: "success",
                });
                $(target).parent().remove();
              }else{
                swal("¡Ocurrio un Error!", {
                  icon: "error",
                });
              }
          });
            
          } else {
            swal("¡Solicitud Cancelada!");
          }
      });
    }

    //remove image
    function removeImage(id,target)
    {
      swal({
        title: "¿Desea Eliminar la imagen?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) =>{
          if (willDelete) {
            axios({
            method: 'delete',
            url: '{{ url('delete-image') }}',
            data: {
              id: id,
              _token: '{{ csrf_token() }}'
            }
          }).then(function (response) { 
              if(response.data.code==200){
                swal("imagen Eliminado Correctamente!", {
                  icon: "success",
                });
                $(target).parent().remove();
              }else{
                swal("¡Ocurrio un Error!", {
                  icon: "error",
                });
              }
          });
            
          } else {
            swal("¡Solicitud Cancelada!");
          }
      });
    }

    //remove texto
    function removeText(id,target)
    {
      swal({
        title: "¿Desea Eliminar el texto?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) =>{
          if (willDelete) {
            axios({
            method: 'delete',
            url: '{{ url('delete-text') }}',
            data: {
              id: id,
              _token: '{{ csrf_token() }}'
            }
          }).then(function (response) { 
              if(response.data.code==200){
                swal("texto Eliminado Correctamente!", {
                  icon: "success",
                });
                $(target).parent().remove();
              }else{
                swal("¡Ocurrio un Error!", {
                  icon: "error",
                });
              }
          });
            
          } else {
            swal("¡Solicitud Cancelada!");
          }
      });
    }

    //remove template
    function removeTemplate(id,target)
    {
      swal({
        title: "¿Desea Eliminar el template?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) =>{
          if (willDelete) {
            axios({
            method: 'delete',
            url: '{{ url('delete-template') }}',
            data: {
              id: id,
              _token: '{{ csrf_token() }}'
            }
          }).then(function (response) { 
              if(response.data.code==200){
                swal("texto Eliminado Correctamente!", {
                  icon: "success",
                });
                $(target).parent().remove();
              }else{
                swal("¡Ocurrio un Error!", {
                  icon: "error",
                });
              }
          });
            
          } else {
            swal("¡Solicitud Cancelada!");
          }
      });
    }
  </script>

</x-app-layout>