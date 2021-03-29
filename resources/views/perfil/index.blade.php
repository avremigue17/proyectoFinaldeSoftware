<x-app-layout>
	
    <x-slot name="header">
        <div class="row" style="margin-top: 20px">
        	<div class="col-md-8" >
        		<h2 class="font-semibold text-xl text-gray-800 leading-tight" style="font-size: 50px; margin: 0">
		            {{ __('Perfilechon') }}
		        </h2>
		        @foreach ($users as $user)
		        @if($user->id == Auth::user()->id)
		        	<h3>
		        		{{$user->name}}<br>
		        		{{$user->email}}
		        	</h3>
		        @endif
		        @endforeach
        	</div>
        	<button class="btn btn-primary float-right" data-toggle="modal" data-target="#addMovie">
        			Agregar Imagen
        		</button>
        </div>
    </x-slot> 

    <!-- POST -->
    <div class="py-12" style="background-color: rgb(26,32,44);">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
 				<div class="row row-cols-2 row-cols-md-3 row-cols-lg-4" style="background-color: rgb(26,32,44);" >
		  			@foreach ($posts as $post)
			  			@if($post->user_id == Auth::user()->id)
  							<div class="col mb-4 col">
    							<div class="card dropdown-item col-md-12" onclick="viewMovie({{$post->id}})" data-toggle="modal" data-target="#viewMovie">
			   						<img src="{{url('/')}}/img/{{ $post->image }}" class="card-img-top" alt="..." style="width: 100%; height: 200px">
			    					<div class="card-body">
			      						<h5 class="card-title" style="text-align: center;">{{$post->id}}</h5>
			    					</div>
			    					<div class="card-footer" style="text-align: center;">
			      						<small class="text-muted">{{$post->id}} </small>
		    						</div>
								</div>
 							</div>
 						@endif
					@endforeach
				</div>
			</div>
        </div>
    </div>

    <!-- MODAL subir post -->
    <div class="modal fade" id="addMovie" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">

	      <form method="post" action="{{ url('post') }}" enctype="multipart/form-data" >
	      	@csrf 

	      	<div class="modal-body">

				<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Image
				    </label>
				    <div class="input-group mb-3">
				    	<input hidden="" type="text" class="form-control" name="user_id" value="{{Auth::user()->id}}">
					  	<input type="file" id="imgInp" class="form-control" name="cover_file" required="">
					 	 <img id="blah" src="#" alt="your image" />
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

		 function readURL(input) {
	        if (input.files && input.files[0]) {
	            var reader = new FileReader();
	            
	            reader.onload = function (e) {
	                $('#blah').attr('src', e.target.result);
	            }
	            
	            reader.readAsDataURL(input.files[0]);
	        }
	    }
	    
	    $("#imgInp").change(function(){
	        readURL(this);
	    });
		
		function editMovie(id){
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
					$("#estatus").val(movie.estatus)
					$("#trailer").val(movie.trailer)
					$("#category_id").val(movie.category_id)
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

		function viewMovie(id){
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
					$("#category_id").val(movie.category_id);

					var dia = new Date();

					document.getElementById("fecha_de_prestamo").value = dia.getDate()+'/'+(dia.getMonth()+1)+'/'+dia.getFullYear();
					document.getElementById("fecha_de_devolucion").value = "sin devolver";
					document.getElementById("estatusLoan").value = "activo";
					document.getElementById("user_id").value = "{{auth()->user()->id}}";
					document.getElementById("movie_id").value = id;

					document.getElementById('idPrestamo').setAttribute('onclick','prestarMovie('+movie.id+');');
					

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

		function prestarMovie(id){
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
					$("#estatus").val("prestado")
					$("#trailer").val(movie.trailer)
					$("#category_id").val(movie.category_id)

					document.formPrestar.submit()
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
        title: "¿Desea Eliminar Pelicula?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          axios({
          method: 'delete',
          url: '{{ url('movies') }}',
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          }
        }).then(function (response) { 
            if(response.data.code==200){
              swal("¡Pelicula Eliminada Correctamente!", {
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