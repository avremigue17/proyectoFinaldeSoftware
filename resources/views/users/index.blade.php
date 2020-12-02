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
                                <a onclick="editLoan({{ $user->id }})" class="dropdown-item" data-toggle="modal" data-target="#editLoan" href="#">
                                  Editar Prestamo
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



   <div class="modal" tabindex="-1" id="viewMovie">
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <div class="card mb-3">
              <img src="..." class="card-img-top" alt="..." id="imageview" style="width: 100%; height: 250px">
              <div class="card-body">
                <h5 class="card-title" id="titleview"></h5>
              <p class="card-text" id="descriptionview"></p>
              <p class="card-text" >Clasificacion: <small id="classificationview" class="text-muted"></small></p>
              <p class="card-text" >Duracion: <small id="minutesview" class="text-muted"></small> minutos</p>
              <p class="card-text" >Año de Lanzamiento: <small id="yearview" class="text-muted"></small></p>
              <p class="card-text" >Trailer YouTube: <small id="trailerview" class="text-muted"></small></p>
              </div>
          </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="buttonDevolver" onclick="devolverMovie()">Devolver pelicula</button>
            </div>
        </div>
    </div>
  </div>



  <div style="display: none">
        <form id="form_edit_movie" method="post" action="{{ url('movies') }}" enctype="multipart/form-data" name="formDevolver">
          @csrf
          @method('PUT') 
            <input type="text" class="form-control" placeholder="Title example" aria-label="Title example" aria-describedby="basic-addon1" name="title" id="title" required="">
            <textarea class="form-control" rows="5" placeholder="description of de movie" id="description" name="description"></textarea>
            <select class="form-control" id="classification" name="classification">
              <option>AA</option>
              <option>A</option>
              <option>B</option>
              <option>B15</option>
              <option>C</option>
              <option>D</option>
            </select>
            <input type="number" id="minutes" class="form-control" placeholder="132" name="minutes" required="">
            <input type="number" id="year" class="form-control" placeholder="2000" name="year" required="">
            <input type="file" class="form-control" name="cover_file" >
            <input type="hidden" class="form-control" id="estatus" name="estatus">
            <input id="trailer" type="text" class="form-control" placeholder="youtube.com" name="trailer" required="">
            <select id="category_id" class="form-control" name="category_id">
              @if (isset($categories) && count($categories)>0)
              @foreach ($categories as $category)
                <option value="{{ $category->id}}">
                  {{ $category->name }}
                </option> 
              @endforeach
              @endif 
            </select>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              Cancelar
            </button>
            <button type="submit" class="btn btn-primary" id="idDevolver">
              Guardar
            </button>
          </div>
        </form>
  </div>  

  <div class="modal fade" id="editLoan" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <form  method="post" action="{{ url('loans') }}" enctype="multipart/form-data" name="EliminarPrestamo">
              @csrf
              @method('PUT') 

              <div class="modal-body">

                <div class="form-group">
                <label for="exampleInputEmail1">
                  No. Prestamo
                </label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                  </div>
                  <input type="text" class="form-control" placeholder="Title example" aria-label="Title example" aria-describedby="   basic-addon1" name="idloan" id="idloan" required="">
              </div>
            </div>

                
            <div class="form-group">
                <label for="exampleInputEmail1">
                  Fecha de Prestamo
                </label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                  </div>
                  <input type="text" class="form-control" placeholder="Title example" aria-label="Title example" aria-describedby="   basic-addon1" name="fecha_de_prestamo" id="fecha_de_prestamo" required="">
              </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">
                  Fecha de Devolucion
                </label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                  </div>
                  <input type="text" class="form-control" placeholder="Title example" aria-label="Title example" aria-describedby="   basic-addon1" name="fecha_de_devolucion" id="fecha_de_devolucion" required="">
              </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">
                  Estatus
                </label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                  </div>
                  <input type="text" class="form-control" placeholder="Title example" aria-label="Title example" aria-describedby="   basic-addon1" name="estatusLoan" id="estatusLoan" required="">
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
        

        function viewMovie(id,idLoan){
      axios.get('{{ url('movies-info') }}/'+id)
        .then(function (response) { 
          var data = response.data;
          if (data.code == 200) {
            var movie = data.movie;
            document.getElementById("imageview").src = "{{url('/')}}/img/"+movie.cover;
            document.getElementById("titleview").innerHTML = movie.title;
            document.getElementById("descriptionview").innerHTML = movie.description;
            document.getElementById("classificationview").innerHTML = movie.classification;
            document.getElementById("minutesview").innerHTML = movie.minutes;
            document.getElementById("yearview").innerHTML = movie.Year;
            document.getElementById("trailerview").innerHTML = movie.trailer;

            document.getElementById('buttonDevolver').setAttribute('onclick','devolverMovie('+movie.id+","+idLoan+');');


  
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

    function devolverMovie(id,idLoan){
      axios.get('{{ url('movies-info') }}/'+id)
        .then(function (response) { 
          var data = response.data;
          if (data.code == 200) {
            $("#form_edit_movie").attr('action', '{{ url('movies') }}/'+id);
            var movie = data.movie;
            $("#title").val(movie.title)
          $("#description").val(movie.description)
          $("#classification").val(movie.classification)
          $("#minutes").val(movie.minutes)
          $("#year").val(movie.Year)
          $("#estatus").val("libre")
          $("#trailer").val(movie.trailer)
          $("#category_id").val(movie.category_id)

          document.formDevolver.submit();
          desactivarLoan(idLoan);

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

    function editLoan(id){
      axios.get('{{ url('loans-info') }}/'+id)
        .then(function (response) { 
          var data = response.data;
          if (data.code == 200) {
            $("#form_edit_loan").attr('action', '{{ url('loans') }}/'+id);
            var loan = data.loan;
            $("#idloan").val(loan.id)
            $("#estatusLoan").val(loan.estatusLoan)
          $("#fecha_de_prestamo").val(loan.fecha_de_prestamo)
          $("#fecha_de_devolucion").val(loan.fecha_de_devolucion)
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

    function desactivarLoan(id){
      console.log(id);
      axios.get('{{ url('loans-info') }}/'+id)
        .then(function (response) { 
          var data = response.data;
          if (data.code == 200) {
            $("#form_edit_loan").attr('action', '{{ url('loans') }}/'+id);
            var loan = data.loan;
            var dia = new Date();
            $("#idloan").val(loan.id)
            $("#estatusLoan").val("inactivo")
          $("#fecha_de_prestamo").val(loan.fecha_de_prestamo)
          $("#fecha_de_devolucion").val(dia.getDate()+'/'+(dia.getMonth()+1)+'/'+dia.getFullYear())

          document.EliminarPrestamo.submit()

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

     </script>
    </x-slot>
</x-app-layout>