<x-app-layout>
	<style type="text/css">
		.element::-webkit-scrollbar { width: 0 !important }
	</style>
    <x-slot name="header">
    	<div>
	        <div style="margin-top: 60px">
	        	<div style="width: 30%; float: left; height: 150px">
	        		<img width="150px" height="150px" src="{{url('/')}}/img/{{ $user->profile_image }}" style="float: right; border-radius: 100px">
	        	</div>
	        	<div style="width: 65%; float: left; height: 20px;color: white">
	        		<h3 style="margin-left: 90px; margin-top: 10px">
	        		{{$user->name}}
	        		</h3>
					@if(Auth::user()->id == $user->id)
			        	<div style="width: 100%;float: left; margin-left: 90px">
			        		<button class="btn btn-primary float-left" data-toggle="modal" data-target="#addProfileImage" style="background-color: black; color: white; width: 235px;border-color: gray">
				        		<img src="{{url('/')}}/img/fotoPerfil1.png" class="card-img-top" alt="..." style="width: 20px; height: 20px; float: left; margin-left: 5px">
				        		<p style="float: left; width: 170px; margin-left: 10px; margin-bottom: 0">Cambiar foto de perfil</p>
			        		</button>
			        	</div>
			        @endif
			        <div style="width: 20%; float: left; height: 50px; margin-left: 90px;">
	        			<p style="float: left; margin-left: 10px;margin-top: 10px;">{{sizeOf($posts)}} Publicaciones</p>
	        		</div>
	        		<div style="width: 20%; float: left; height: 50px;margin-left: 10px;">
	        			<p style="float: left;  margin-left: 10px;margin-top: 10px;">Seguidores</p>
	        		</div>
	        		<div style="width: 20%; float: left; height: 50px;margin-left: 10px;">
	        			<p style="float: left; margin-left: 10px;margin-top: 10px;">Seguidos</p>
	        		</div>
	        	</div>
	        	<div style="width: 100%; float: left; margin-bottom: 0; margin-top: 20px">
	        		<div style="width: 100%; float: left;height: 50px">
		        		@if(Auth::user()->id == $user->id)
		        			<div style="width: 100%;float: left">
			        			<button class="btn btn-primary float-left" data-toggle="modal" data-target="#addMovie" style="margin-left: 40%; background-color: black; border-color: gray">
				        			<img src="{{url('/')}}/img/fotoPerfil1.png" class="card-img-top" alt="..." style="width: 20px; height: 20px; float: left; margin-left: 5px">
					        		<p style="float: left; margin-left: 10px; margin-bottom: 0">Agregar Foto al Album</p>
			        			</button>
		        			</div>
		        		@endif
	        		</div>
        		</div>
	        </div>
	     

		    <!-- POST -->
		    <div class="py-12" style="background-color: rgb(26,32,44); float: left;width: 100%;">
		        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
		            <div class=" shadow-xl sm:rounded-lg element" style="border: none; height: 490px; overflow-x: hidden; background-color:rgb(26,32,44)">
		 				<div class="row row-cols-2 row-cols-md-3 row-cols-lg-4" style="background-color: rgb(26,32,44);" >
				  			@foreach ($posts as $post)
								<div class="col mb-4 col">	
									<div class="card dropdown-item col-md-12" onclick="viewMovie('{{$post->id}}')" data-toggle="modal" data-target="#viewMovie" style="background-color: rgb(26,32,44);border:none">
				   						<img src="{{url('/')}}/img/{{ $post->image }}" class="card-img-top" alt="..." style="width: 100%; height: 200px">
									</div>
									@if(Auth::user()->id == $user->id)
										<button onclick="remove('{{$post->id}}',this)" class="btn btn-primary float-left" style="width: 82%;background-color: red; opacity: 70%; border: none; margin-left: 9%">
											<p style="float: right; margin-bottom: 0; width: 60%; text-align: left;">Eliminar</p>
											<img src="{{url('/')}}/img/basura.png" class="card-img-top" alt="..." style="width: 20px; height: 20px; float: right; margin-right: 5px">
										</button>
									@endif
								</div>	
							@endforeach
						</div>
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
					    	Agregar Foto al Album
					    </label>
					    <div class="input-group mb-3">
					    	<input hidden="" type="text" class="form-control" name="user_id" value="{{Auth::user()->id}}">
					    	<img id="blah" src="{{url('/')}}/img/upload.png" alt="your image" />
						  	<input type="file" id="imgInp" class="form-control" name="cover_file" required="" style="width: 50%; margin-left: 30%;border: none">	 
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

		<!-- MODAL foto de perfil -->
	    <div class="modal fade" id="addProfileImage" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      <form method="post" action="{{ url('users') }}" enctype="multipart/form-data" >
		      	@csrf 
		      	<div class="modal-body">

					<div class="form-group">
					    <label for="exampleInputEmail1">
					    	Foto de Perfil
					    </label>
					    <div class="input-group mb-3">
					    	<input hidden="" type="text" class="form-control" name="user_id" value="{{Auth::user()->id}}">
					    	<img id="blah2" src="{{url('/')}}/img/upload.png" alt="your image" />
						  	<input type="file" id="imgInp2" class="form-control" name="cover_file" required="" style="width: 50%; margin-left: 30%;border: none">
						 	 
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
	</x-slot>
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

	    function readURL2(input) {
	        if (input.files && input.files[0]) {
	            var reader = new FileReader();
	            
	            reader.onload = function (e) {
	                $('#blah2').attr('src', e.target.result);

	            }
	            
	            reader.readAsDataURL(input.files[0]);
	        }
	    }

	    $("#imgInp2").change(function(){
	        readURL2(this);
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

		function remove(id,target)
		{
        swal({
	        title: "¿Desea Eliminar la Imagen?",
	        icon: "warning",
	        buttons: true,
	        dangerMode: true,
	      }).then((willDelete) =>{
		        if (willDelete) {
		          axios({
		          method: 'delete',
		          url: '{{ url('post') }}',
		          data: {
		            id: id,
		            _token: '{{ csrf_token() }}'
		          }
		        }).then(function (response) { 
		            if(response.data.code==200){
		              swal("¡Imagen Eliminada Correctamente!", {
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
	</x-slot>

</x-app-layout> 