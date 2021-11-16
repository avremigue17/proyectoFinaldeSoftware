<x-app-layout>

  <style type="text/css">

  </style>

  <x-slot name="header">
    
  </x-slot>

  <div class="container mt-20" style="float: left;">
    <div class="container" align="center">
      <h1 class="m-0" style="font-weight: bolder;">
         {{$course->name}}
      </h1>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4 p-20">
    <div class="col" align="center" data-toggle="modal" data-target="#plantilla1Modal" type="button">
      <div class="card items-center">
        <img src="{{url('/')}}/img/plantilla1.png" class="card-img-top mt-3" style="width: 100px; height: 100px;">
        <div class="card-body">
          <h5 class="card-title">Plantilla texto</h5>
          <p class="card-text">Al seleccionar esta plantilla se ingresara solo contenido en texto</p>
        </div>
      </div>
    </div>
    <div class="col" align="center" data-toggle="modal" data-target="#plantilla2Modal" type="button">
      <div class="card items-center">
        <img src="{{url('/')}}/img/plantilla2.png" class="card-img-top mt-3" style="width:100px; height: 100px;">
        <div class="card-body">
          <h5 class="card-title">Plantilla Mixta</h5>
          <p class="card-text">Al seleccionar esta plantilla se ingresara una imagen y contenido en texto</p>
        </div>
      </div>
    </div>
    <div class="col" align="center" data-toggle="modal" data-target="#plantilla3Modal" type="button">
      <div class="card items-center">
        <img src="{{url('/')}}/img/plantilla3.png" class="card-img-top mt-3" style="width: 100px; height: 100px; ">
        <div class="card-body">
          <h5 class="card-title">Plantilla Mixta doble</h5>
          <p class="card-text">Al seleccionar esta plantilla se ingresaran dos imagenes y dos contenidos en texto</p>
        </div>
      </div>
    </div>
  </div> 
  <button type="submit" onclick="removeCourse('{{$course->id}}')" class="btn btn-primary mb-2" style="margin-top: 5px;">cancelar</button>
  <form action="{{route('test', Auth::user()->id)}}">
    <button type="submit" onclick="" id="finalizar" class="btn btn-primary mb-2" style="margin-top: 5px;">finalizar</button>
  </form>
</div>

<div class="modal fade" id="plantilla1Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content items-center" style="background-color: rgba(255,255,255,.9);">
        <div class="modal-header">
          <h5 class="modal-title"  style="font-weight: bolder;color: black;font-size: 40px">
                {{$course->name}}
          </h5>
        </div>
        <div class="container">
          <form method="get" action="{{ url('create-template') }}" enctype="multipart/form-data">
            <div>
              <label class="form-label" style="font-weight: bolder; margin-top: 5px;font-size: 20px">Ingresar Contenido:</label>
              <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="8"></textarea>
              <textarea class="form-control" hidden name="course_id">{{$course->id}}</textarea>
            </div>
            <div style="width: 100%" align="center">
              <button type="submit" class="btn btn-primary mb-2" style="margin-top: 5px;">Agregar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="plantilla2Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content items-center" style="background-color: rgba(255,255,255,.9);">
        <div class="modal-header">
          <h5 class="modal-title"  style="font-weight: bolder;color: black;font-size: 40px">
                {{$course->name}}
          </h5>
        </div>
        <div class="container">
          <form method="post" action="{{ url('create-templateMix') }}" enctype="multipart/form-data">
            @csrf 
            <div>
              <label class="form-label mr-3" style="font-weight: bolder; margin-top: 5px;font-size: 20px">Ingresar Imagen:</label>
              <input class="form-control" type="file" name="img" /><br>
                <label class="form-label" style="font-weight: bolder; margin-top: 5px;font-size: 20px">Ingresar Contenido:</label>
                <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="8"></textarea>
                <textarea class="form-control" hidden name="course_id">{{$course->id}}</textarea>
              </div>
              <div style="width: 100%" align="center">
                <button type="submit" class="btn btn-primary mb-2" style="margin-top: 5px;">Agregar
              </button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="plantilla3Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content items-center" style="background-color: rgba(255,255,255,.9);">
        <div class="modal-header">
          <h5 class="modal-title"  style="font-weight: bolder;color: black;font-size: 40px">
                {{$course->name}}
          </h5>
        </div>
        <div class="container">
          <form method="post" action="{{ url('create-templateMixDoble') }}" enctype="multipart/form-data">
            @csrf 
            <div>
              <label class="form-label mr-3" style="font-weight: bolder; margin-top: 5px;font-size: 20px">Ingresar Imagen:</label>
              <input class="form-control" type="file" name="img" /><br>
                <label class="form-label" style="font-weight: bolder; margin-top: 5px;font-size: 20px">Ingresar Contenido:</label>
                <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="8"></textarea>
                <textarea class="form-control" hidden name="course_id">{{$course->id}}</textarea>
              </div>
              <div>
              <label class="form-label mr-3" style="font-weight: bolder; margin-top: 5px;font-size: 20px">Ingresar Imagen:</label>
              <input class="form-control" type="file" name="img2" /><br>
                <label class="form-label" style="font-weight: bolder; margin-top: 5px;font-size: 20px">Ingresar Contenido:</label>
                <textarea class="form-control" name="text2" id="exampleFormControlTextarea1" rows="8"></textarea>
              </div>
              <div style="width: 100%" align="center">
                <button type="submit" class="btn btn-primary mb-2" style="margin-top: 5px;">Agregar
              </button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
  <script type="text/javascript">

    <?php if ($finaly->count() == 0): ?>
      document.getElementById('finalizar').disabled = true;
    <?php endif ?>

    //remove template
    function removeCourse(id)
    {
      swal({
        title: "¿Desea Eliminar el curso?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) =>{
          if (willDelete) {
            axios({
            method: 'delete',
            url: '{{ url('delete-course') }}',
            data: {
              id: id,
              _token: '{{ csrf_token() }}'
            }
          }).then(function (response) { 
              if(response.data.code==200){
                swal("Curso Eliminado Correctamente!", {
                  icon: "success",
                });
                window.location.href = "{{route('test', Auth::user()->id)}}"
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