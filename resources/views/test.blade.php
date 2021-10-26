<x-app-layout>

  <style type="text/css">

  </style>

  <x-slot name="header">
    <div>
      <div id="divIzquierda" style="width: 27%; float: right;margin-top: 20px"></div>

      <div id="divCentral" style="width: 50%;float: right; margin-top: 30px;background-color:white">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
          @if(Auth::user()->hasRole('Admin'))
            <h1 class="border-bottom pb-2 mb-0" style="color: black">Espacio administrador</h1>
          @else
            <h1 class="border-bottom pb-2 mb-0" style="color: black">Espacio Usuario</h1>
          @endif
        </div>

        <form method="get" action="{{ url('create-area') }}" enctype="multipart/form-data">
          <div>
            <textarea class="form-control" rows="2" placeholder="area" name="name" style="margin:  5px; width: 97%"></textarea>
            <button type="submit" class="btn btn-primary" style="background-color: black; border: none; height:35px; margin: 5px; float:left;">
              guardar area
            </button>
            
          </div>
        </form>
        <div class="mt-20">
          <h1>Areas:</h1>
          @foreach($areas as $area)
            <p>{{ $area->name }} <button onclick="removeArea('{{$area->id}}',this)">X</button></p>
          @endforeach
        </div>
        <p>-----------------------------</p>
        <form method="get" action="{{ url('create-post') }}" enctype="multipart/form-data">
          <div>
            <textarea class="form-control" rows="1" placeholder="puesto" name="name" style="margin:  5px; width: 50%"></textarea>
            <textarea class="form-control" rows="1" placeholder="area" name="area_id" style="margin:  5px; width: 50%"></textarea>
            <button type="submit" class="btn btn-primary" style="background-color: black; border: none; height:35px; margin: 5px; float:left;">
              guardar puesto
            </button>
          </div>
        </form>
        <div class="mt-20">
          <h1>puestos:</h1>
          @foreach($posts as $post)
            <p>{{ $post->name }} <button onclick="removePost('{{$post->id}}',this)">X</button></p>
          @endforeach
        </div>
        <p>-----------------------------</p>
        <form method="get" action="{{ url('create-image') }}" enctype="multipart/form-data">
          <div>
            <textarea class="form-control" rows="1" placeholder="imagen" name="img" style="margin:  5px; width: 50%"></textarea>
            <textarea class="form-control" rows="1" placeholder="template" name="template_id" style="margin:  5px; width: 50%"></textarea>
            <button type="submit" class="btn btn-primary" style="background-color: black; border: none; height:35px; margin: 5px; float:left;">
              guardar imagen
            </button>
          </div>
        </form>
        <div class="mt-20">
          <h1>imagenes:</h1>
          @foreach($images as $image)
            <p>{{ $image->img }} <button onclick="removeImage('{{$image->id}}',this)">X</button></p>
          @endforeach
        </div>
        <p>-----------------------------</p>
        <form method="get" action="{{ url('create-text') }}" enctype="multipart/form-data">
          <div>
            <textarea class="form-control" rows="1" placeholder="texto" name="text" style="margin:  5px; width: 50%"></textarea>
            <textarea class="form-control" rows="1" placeholder="template" name="template_id" style="margin:  5px; width: 50%"></textarea>
            <button type="submit" class="btn btn-primary" style="background-color: black; border: none; height:35px; margin: 5px; float:left;">
              guardar texto
            </button>
          </div>
        </form>
        <div class="mt-20">
          <h1>textos:</h1>
          @foreach($texts as $text)
            <p>{{ $text->text }} <button onclick="removeText('{{$text->id}}',this)">X</button></p>
          @endforeach
        </div>
        <p>-----------------------------</p>
        <form method="get" action="{{ url('create-template') }}" enctype="multipart/form-data">
          <div>
            <textarea class="form-control" rows="1" placeholder="course" name="course_id" style="margin:  5px; width: 50%"></textarea>
            <button type="submit" class="btn btn-primary" style="background-color: black; border: none; height:35px; margin: 5px; float:left;">
              guardar template
            </button>
          </div>
        </form>
        <div class="mt-20">
          <h1>templates:</h1>
          @foreach($templates as $template)
            <p>{{ $template->course_id }} <button onclick="removeTemplate('{{$template->id}}',this)">X</button></p>
            @foreach($images as $image)  
            <p>
              @if($image->template_id == $template->id)
              {{ $image->img }}
              @endif
            </p>
            @endforeach
          @endforeach
        </div>
      </div>

      <div id="divDerecha" style="width: 23%; float: right;margin-top: 20px"></div>
    </div>
  </x-slot>

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
  <script type="text/javascript">

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