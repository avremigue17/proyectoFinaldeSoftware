<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-8">
                <h2 class="font-semibold text-xl text-gray-800  leading-tight " style="font-size: 50px; margin: 0">
                    {{ __('Usuarios') }} 
                </h2>
            </div>
        </div>  
    </x-slot>
    @if(Auth::user()->hasRole('user'))
    <div class="py-12" style="background-color: rgb(26,32,44);">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4" style="background-color: rgb(26,32,44);">
                  @if (isset($loans) && count($loans)>0)
                      @foreach ($loans as $loan)
                        @if ($loan->estatusLoan=="activo")
                          <div class="col mb-4 col" >
                              <div class="card dropdown-item col-md-12" onclick="viewMovie({{ $loan->movie->id }},{{ $loan->id }})" data-toggle="modal" data-target="#viewMovie">
                                  <img src="{{url('/')}}/img/{{ $loan->movie->cover }}" class="card-img-top" alt="..." style="width: 100%; height: 200px">
                                  <div class="card-body">
                                    <h5 class="card-title" style="text-align: center;">{{ $loan->movie->title }}</h5>
                                  </div>
                                  <div class="card-footer">
                                    <small class="text-muted" style="text-align: center;">Fecha de Prestamo: {{ $loan->fecha_de_prestamo }} </small>
                                  </div>
                              </div>
                           </div>
                           @endif 
                      @endforeach
                  @endif 
              </div>    
            </div>
        </div>
    </div>
    @endif 
    @if(Auth::user()->hasRole('Admin'))
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <table class="table table-striped table-bordered">
              <thead class="thead-dark ">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Correo</th>
                  <th scope="col">Rol</th>
                  <th> Acciones </th>
                </tr>
              </thead>
              <tbody>
                @if (isset($users) && count($users)>0)
                  @foreach ($users as $user)
                    <tr>
                      <td> {{ $user->id}} </td>
                      <td> {{ $user->name }} </td>
                      <td> {{ $user->email }} </td>
                      @if ($user->role_id==1)
                      <td> Administrador</td>
                      @endif 
                      @if ($user->role_id==2)
                      <td> Cliente</td>
                      @endif 
                      <td>
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown"> 
                          <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Acciones
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a onclick="editUser({{ $user->id }})" class="dropdown-item" data-toggle="modal" data-target="#editUser" href="#">
                                  Editar Usuario
                                </a>
                                <a onclick="remove({{ $user->id }},this)" class="dropdown-item" href="#">
                                  Borrar
                                </a>
                                {{-- <a class="dropdown-item" href="#">Dropdown link</a> --}}
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr> 
                  @endforeach
                @endif 
              </tbody>
            </table>
          </div>
        </div>
      </div>
    @endif 

  <div class="modal fade" id="editUser" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <form  method="post" action="{{ url('users') }}" enctype="multipart/form-data" name="EliminarPrestamo">
              @csrf
              @method('PUT') 

              <div class="modal-body">

                  <input type="hidden" class="form-control" placeholder="Title example" aria-label="Title example" aria-describedby="   basic-addon1" name="id" id="iduser" required="">


                <div class="form-group">
                <label for="exampleInputEmail1">
                  Nombre
                </label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                  </div>
                  <input type="text" class="form-control" placeholder="Title example" aria-label="Title example" aria-describedby="   basic-addon1" name="name" id="nombreUsuario" required="">
              </div>
            </div>

                
            <div class="form-group">
                <label for="exampleInputEmail1">
                  Correo
                </label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                  </div>
                  <input type="text" class="form-control" placeholder="Title example" aria-label="Title example" aria-describedby="   basic-addon1" name="email" id="correoUsuario" required="">
              </div>
            </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              Cancelar
            </button>
            <button type="submit" class="btn btn-primary">
              Guardar
            </button>
          </div>

        </form>

      </div>
    </div>
  </div>  



    <x-slot name="scripts">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script type="text/javascript">

    function editUser(id){
      axios.get('{{ url('users-info') }}/'+id)
        .then(function (response) { 
          var data = response.data;
          if (data.code == 200) {
            $("#form_edit_user").attr('action', '{{ url('Users') }}/'+id);
            var user = data.user;
            $("#iduser").val(user.id)
            $("#nombreUsuario").val(user.name)
            $("#correoUsuario").val(user.email)
          }else{
            //$("#editMovie").modal('hide')
            swal("Record not found", {
              icon: "error",
            });
          }
          console.log(data);
      })
        .catch(function (error) { 
          console.log(error);
      });
    }

    function remove(id,target){
        swal({
        title: "¿Desea Elminar Usuario?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          axios({
          method: 'delete',
          url: '{{ url('users') }}',
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          }
        }).then(function (response) { 
            if(response.data.code==200){
              swal("¡Usuario Eliminado Correctamente!", {
                icon: "success",
              });
              $(target).parent().parent().parent().parent().parent().remove();
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
        console.log(id)
      }

     </script>
    </x-slot>
</x-app-layout>