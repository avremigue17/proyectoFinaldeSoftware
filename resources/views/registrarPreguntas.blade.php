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
    <div class="container">
      <form method="get" action="{{ url('create-question') }}" enctype="multipart/form-data">
        <div class="col-md-10 p-1">
          <label class="form-label " style="font-weight: bolder; margin-top: 5px;font-size: 20px">Ingresar Pregunta:</label>
          <textarea class="form-control" hidden name="course_id">{{$course->id}}</textarea>
          <textarea class="form-control" name="question" id="exampleFormControlTextarea1" rows="3"></textarea>
          <textarea class="form-control" hidden name=""></textarea>
        </div>
        <div class="input-group col-md-10 p-1">
          <span class="input-group-text">Respuesta Correcta</span>
          <textarea class="form-control" hidden name="status1">1</textarea>
          <textarea class="form-control" name="answer1" aria-label="With textarea" rows="1"></textarea>
        </div>
        <div class="input-group col-md-10 p-1">
          <span class="input-group-text">Respuesta Incorrecta</span>
          <textarea class="form-control" hidden name="status2">0</textarea>
          <textarea class="form-control" name="answer2" aria-label="With textarea" rows="1"></textarea>
        </div>
        <div class="input-group col-md-10 p-1">
          <span class="input-group-text">Respuesta Incorrecta</span>
          <textarea class="form-control" hidden name="status3">0</textarea>
          <textarea class="form-control" name="answer3" aria-label="With textarea" rows="1"></textarea>
        </div>
        <div class="input-group col-md-10 p-1">
          <span class="input-group-text">Respuesta Incorrecta</span>
          <textarea class="form-control" hidden name="status4">0</textarea>
          <textarea class="form-control" name="answer4" aria-label="With textarea" rows="1"></textarea>
        </div>
        <div style="width: 82%" align="center">
          <button type="submit" class="btn btn-primary mb-2" style="margin-top: 5px;">Agregar</button>
        </div>
      </form>
      <div class="container mt-3">
        <div style="width: 90%" class="">
          <div style="float: left; width: 50%">
            <button type="submit" onclick="removeCourse('{{$course->id}}')" class="btn btn-primary mb-2" style="margin-top: 5px;width: 80%; background-color: red; font-weight: bolder;">Cancelar</button>
          </div>
          <div style="float: left; width: 50%">
            <form action="{{route('test', Auth::user()->id)}}" style="width: 100%">
              <button type="submit" id="finalizar" class="btn btn-primary mb-2" style="margin-top: 5px;width: 80%;font-weight: bolder;">Finalizar</button>
            </form>
          </div>
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