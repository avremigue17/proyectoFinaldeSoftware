<x-app-layout>
    <x-slot name="header">
        <div class="row">
        	<div class="col-md-8">
        		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
		            {{ __('Movies') }}
		        </h2>
        	</div>
        	<div class="col-md-4">
        		<button class="btn btn-primary float-right" data-toggle="modal" data-target="#addMovie">
        			Add Movie
        		</button>
        	</div>
        </div>
    </x-slot> 

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
				<table class="table table-striped table-bordered">
				  <thead class="thead-dark ">
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Title</th>
				      <th scope="col">Classification</th>
				      <th scope="col">Category</th>
				      <th> Actions </th>
				    </tr>
				  </thead>
				  <tbody>
				  	@if (isset($movies) && count($movies)>0)
				  	@foreach ($movies as $movie)
				  	<tr>
				      <th scope="row">
				      	{{ $movie->id }}
				      </th>
				      <td> {{ $movie->title }} </td>
				      <td> {{ $movie->classification }} </td>
				      <td> {{ $movie->category->name }} </td>
				      <td>
				      	
				      	<div class="btn-group" role="group" aria-label="Button group with nested dropdown"> 

						  <div class="btn-group" role="group">
						    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						      Actions
						    </button>
						    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
						      <a onclick="editMovie({{ $movie->id }})" class="dropdown-item" data-toggle="modal" data-target="#editMovie" href="#">
						      	Edit Movie
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

    <div class="modal fade" id="addMovie" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="staticBackdropLabel">
	        	Add new movie
	        </h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <form method="post" action="{{ url('movies') }}" enctype="multipart/form-data" >
	      	@csrf 

	      	<div class="modal-body">
		        
	      		<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Title
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <input type="text" class="form-control" placeholder="Title example" aria-label="Title example" aria-describedby="basic-addon1" name="title" required="">
					</div>
				</div>

				<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Description
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <textarea class="form-control" rows="5" placeholder="description of de movie" name="description"></textarea>
					</div>
				</div>

				<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Classification
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
				    	Minutes
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
				    	Year
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
				    	Category
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
		        	Cancel
		        </button>
		        <button type="submit" class="btn btn-primary">
		        	Save data
		        </button>
		      </div>

	      </form>

	    </div>
	  </div>
	</div> 

	<div class="modal fade" id="editMovie" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="staticBackdropLabel">
	        	Edit movie
	        </h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <form id="form_edit_movie" method="post" action="{{ url('movies') }}" enctype="multipart/form-data" >
	      	@csrf
	      	@method('PUT') 

	      	<div class="modal-body">
		        
	      		<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Title
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <input type="text" class="form-control" placeholder="Title example" aria-label="Title example" aria-describedby="basic-addon1" name="title" id="title" required="">
					</div>
				</div>

				<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Description
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <textarea class="form-control" rows="5" placeholder="description of de movie" id="description" name="description"></textarea>
					</div>
				</div>

				<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Classification
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
				    	Minutes
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
				    	Year
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
				    	Category
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
		        	Cancel
		        </button>
		        <button type="submit" class="btn btn-primary">
		        	Save data
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
					$("#year").val(movie.year)
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
	</script> 
	</x-slot>

</x-app-layout> 