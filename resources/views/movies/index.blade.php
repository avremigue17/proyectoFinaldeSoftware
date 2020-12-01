<x-app-layout>
	
    <x-slot name="header">
        <div class="row">
        	<div class="col-md-8" >
        		<h2 class="font-semibold text-xl text-gray-800 leading-tight" style="font-size: 50px; margin: 0">
		            {{ __('Peliculas') }}
		        </h2>
        	</div>
        	@if(Auth::user()->hasRole('Admin'))
        	<div class="col-md-4">
        		<button class="btn btn-primary float-right" data-toggle="modal" data-target="#addMovie">
        			Agregar Pelicula
        		</button>
        	</div>
        	@endif
        </div>
    </x-slot> 

    @if(Auth::user()->hasRole('user'))
    <div class="py-12" style="background-color: rgb(26,32,44);">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
 				<div class="row row-cols-2 row-cols-md-3 row-cols-lg-4" style="background-color: rgb(26,32,44);" >
					@if (isset($movies) && count($movies)>0)
			  			@foreach ($movies as $movie)
			  				@if ($movie->estatus =='libre')
	  							<div class="col mb-4 col" >
	    							<div class="card dropdown-item col-md-12" onclick="viewMovie({{ $movie->id }})" data-toggle="modal" data-target="#viewMovie">
				   						<img src="{{url('/')}}/img/{{ $movie->cover }}" class="card-img-top" alt="..." style="width: 100%; height: 200px">
				    					<div class="card-body">
				      						<h5 class="card-title" style="text-align: center;">{{ $movie->title }}</h5>
				    					</div>
				    					<div class="card-footer" style="text-align: center;">
				      						<small class="text-muted"> {{ $movie->classification }} </small>
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
						    <th scope="col">Titulo</th>
						    <th scope="col">Clasificacion</th>
						    <th scope="col">Categoria</th>
						    <th scope="col">Estatus</th>

						    <th> Acciones </th>
				    	</tr>
				  	</thead>
				  	<tbody>
					  	@if (isset($movies) && count($movies)>0)
						  	@foreach ($movies as $movie)
						  	<tr>
								<td> {{ $movie->id}} </td>
						      	<td> {{ $movie->title }} </td>
						      	<td> {{ $movie->classification }} </td>
						      	<td> {{ $movie->category->name }} </td>
						      	<td> {{ $movie->estatus }} </td>

						
						      	<td>
						      	
						      		<div class="btn-group" role="group" aria-label="Button group with nested dropdown"> 

									  	<div class="btn-group" role="group">
									    	<button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									      		Acciones
									    	</button>
									   		<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
									      		<a onclick="editMovie({{ $movie->id }})" class="dropdown-item" data-toggle="modal" data-target="#editMovie" href="#">
									      			Editar Pelicula
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

    <div class="modal fade" id="addMovie" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">

	      <form method="post" action="{{ url('movies') }}" enctype="multipart/form-data" >
	      	@csrf 

	      	<div class="modal-body">
		        
	      		<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Titulo
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <input type="text" class="form-control" placeholder="Titulo" aria-label="Title example" aria-describedby="basic-addon1" name="title" required="">
					</div>
				</div>

				<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Descripcion
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <textarea class="form-control" rows="5" placeholder="Descripcion de la Pelicula" name="description"></textarea>
					</div>
				</div>

				<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Clasificacion
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <select class="form-control" name="classification">
					  	<option>AA</option>
					  	<option>A</option>
					  	<option>B</option>
					  	<option>B15</option>
					  	<option>C</option>
					  	<option>D</option>
					  </select>
					</div>
				</div>

				<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Duracion
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <input type="number" class="form-control" placeholder="132" name="minutes" required="">
					</div>
				</div>

				<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Año
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <input type="number" class="form-control" placeholder="2000" name="year" required="">
					</div>
				</div>

				<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Cover
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <input type="file" class="form-control" name="cover_file" required="">
					</div>
				</div>

				<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Trailer
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <input type="text" class="form-control" placeholder="youtube.com" name="trailer" required="">
					</div>
				</div>

				<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Categoria
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <select class="form-control" name="category_id">
					  	@if (isset($categories) && count($categories)>0)
					  	@foreach ($categories as $category)

					  		<option value="{{ $category->id}}">
					  			{{ $category->name }}
					  		</option> 
					  	@endforeach
					  	@endif 
					  </select>
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

	<div class="modal fade" id="editMovie" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  	<div class="modal-dialog modal-lg">
	    	<div class="modal-content">

	      		<form id="form_edit_movie" method="post" action="{{ url('movies') }}" enctype="multipart/form-data" name="formPrestar">
			      	@csrf
			      	@method('PUT') 

	      			<div class="modal-body">
		        
	      				<div class="form-group">
				    		<label for="exampleInputEmail1">
				    			Titulo
				    		</label>
				    		<div class="input-group mb-3">
					  			<div class="input-group-prepend">
							    	<span class="input-group-text" id="basic-addon1">@</span>
							  	</div>
							  	<input type="text" class="form-control" placeholder="Titulo" aria-label="Title example" aria-describedby="		basic-addon1" name="title" id="title" required="">
							</div>
						</div>

				<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Descripcion
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <textarea class="form-control" rows="5" placeholder="Descripcion de la Pelicula" id="description" name="description"></textarea>
					</div>
				</div>

				<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Clasificacion
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <select class="form-control" id="classification" name="classification">
					  	<option>AA</option>
					  	<option>A</option>
					  	<option>B</option>
					  	<option>B15</option>
					  	<option>C</option>
					  	<option>D</option>
					  </select>
					</div>
				</div>

				<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Duracion
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <input type="number" id="minutes" class="form-control" placeholder="132" name="minutes" required="">
					</div>
				</div>

				<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Año
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <input type="number" id="year" class="form-control" placeholder="2000" name="year" required="">
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
					  <input type="text" class="form-control" name="estatus" id="estatus" required="">
					</div>
				</div>

				<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Cover
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <input type="file" class="form-control" name="cover_file" >
					</div>
				</div>

				<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Trailer
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <input id="trailer" type="text" class="form-control" placeholder="youtube.com" name="trailer" required="">
					</div>
				</div>

				<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Categoria
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <select id="category_id" class="form-control" name="category_id">
					  	@if (isset($categories) && count($categories)>0)
					  	@foreach ($categories as $category)

					  		<option value="{{ $category->id}}">
					  			{{ $category->name }}
					  		</option> 

					  	@endforeach
					  	@endif 
					  </select>
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

	<div class="modal" tabindex="-1" id="viewMovie">
  		<div class="modal-dialog">
  		  	<div class="modal-content">
	      		<div class="modal-body">
	      			<div class="card mb-3" style="align-items: center;">
	  					<img src="..." class="card-img-top" alt="..." id="imageview" style="width: 80%; height: 250px">

	  					<form method="post" action="{{ url('loans') }}" enctype="multipart/form-data">
					      	@csrf 
		  					<div class="card-body">
		    					<h5 class="card-title" id="titleview"></h5>
								<p class="card-text" id="descriptionview"></p>
								<p class="card-text" >Clasificacion: <small id="classificationview" class="text-muted"></small></p>
								<p class="card-text" >Duracion: <small id="minutesview" class="text-muted"></small> minutos</p>
								<p class="card-text" >Año: <small id="yearview" class="text-muted"></small></p>
								<p class="card-text" >Trailer YouTube: <small id="trailerview" class="text-muted"></small></p>

								<input type="hidden" class="form-control" placeholder="Title example" aria-label="Title example" aria-describedby="basic-addon1" id="fecha_de_prestamo" name="fecha_de_prestamo" >
								<input type="hidden" class="form-control" placeholder="Title example" aria-label="Title example" aria-describedby="basic-addon1" id="fecha_de_devolucion" name="fecha_de_devolucion">
								<input type="hidden" class="form-control" placeholder="Title example" aria-label="Title example" aria-describedby="basic-addon1" id="estatusLoan" name="estatusLoan">
								<input type="hidden" class="form-control" placeholder="Title example" aria-label="Title example" aria-describedby="basic-addon1" id="user_id" name="user_id">
								<input type="hidden" class="form-control" placeholder="Title example" aria-label="Title example" aria-describedby="basic-addon1" id="movie_id" name="movie_id">
		  					</div>
	      					<div class="modal-footer">
				        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				        		<button type="submit" class="btn btn-primary" id="idPrestamo" onclick="">Solicitar Prestamo</button>
				      		</div>
	      				</form>
    				</div>
 				</div>
			</div>
		</div>
	</div>
	
	<x-slot name="scripts">
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
	<script type="text/javascript">
		
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

	</script> 
	</x-slot>

</x-app-layout> 