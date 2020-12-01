<x-app-layout>
	<x-slot name="header">
		<div class="row">
			<div class="col-8">
				<h2 class="font-semibold text-xl text-gray-800  leading-tight " style="font-size: 50px; margin: 0">
		            {{ __('Categorias') }} 
		        </h2>
			</div>
			<div class="col-4">
				<button class="btn btn-primary float-right" data-toggle="modal" data-target="#addCategory">
		        	Agregar Categoria
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
				      <th scope="col">Nombre</th>
				      <th scope="col">Descripcion</th>
				      <th scope="col">Fecha de Creacion</th>
				      <th scope="col">No. de Peliculas</th>
				      <th scope="col">Acciones</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@if (isset($categories) && count($categories)>0)
				  	@foreach ($categories as $category)
				  	<tr>
				      <th scope="row">
				      	{{ $category->id }}
				      </th>
				      <td> {{ $category->name }} </td>
				      <td> {{ $category->description }} </td>
				      <td> {{ $category->created_at }} </td>
				      <td> {{ count($category->movie) }} </td>
				      <td>
				      	<div class="btn-group" role="group" aria-label="Button group with nested dropdown"> 

						  <div class="btn-group" role="group">
						    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						      Acciones
						    </button>
						    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
						      <a onclick="edit({{ $category->id }},'{{ $category->name }}','{{ $category->description }}')" data-toggle="modal" data-target="#editCategory" class="dropdown-item" href="#">
						      	Actualizar
						      </a>
						      <a onclick="remove({{ $category->id }},this)" class="dropdown-item" >
						      	Borrar
						      </a>
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

    <div class="modal fade" id="editCategory" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      <form method="post" action="{{ url('categories') }}" enctype="multipart/form-data" >
	      	@csrf
	      	@method('PUT')

	      	<div class="modal-body">

	      		<div class="form-group" hidden="">
				    <label for="exampleInputEmail1">
				    	id
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <input type="text" class="form-control" placeholder="Category example" aria-label="Category example" aria-describedby="basic-addon1" id="idcategory" name="idcategory" required="">
					</div>
				 </div>
		        
	      		<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Nombre
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <input type="text" class="form-control" placeholder="Nombre de la Categoria" aria-label="Category example" aria-describedby="basic-addon1" id="name" name="name" required="">
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
					  <textarea class="form-control" rows="5" placeholder="Descripcion de la Categoria" name="description" id="description"></textarea>
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

	<div class="modal fade" id="addCategory" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      <form method="post" action="{{ url('categories') }}" >
	      	@csrf 

	      	<div class="modal-body">
		        
	      		<div class="form-group">
				    <label for="exampleInputEmail1">
				    	Nombre
				    </label>
				    <div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">@</span>
					  </div>
					  <input type="text" class="form-control" placeholder="Nombre de la Categoria" aria-label="Category example" aria-describedby="basic-addon1" name="name" required="">
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
					  <textarea class="form-control" rows="5" placeholder="Descripcion de la Categoria" name="description"></textarea>
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
     	
     	function edit(id,name,description){
     		$("#name").val(name)
			$("#description").val(description)
			$("#idcategory").val(id)
     	}
     	function remove(id,target){
     		swal({
			  title: "Are you sure?",
			  text: "Once deleted, you will not be able to recover this record!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			  	axios({
				  method: 'delete',
				  url: '{{ url('categories') }}',
				  data: {
				    id: id,
				    _token: '{{ csrf_token() }}'
				  }
				}).then(function (response) { 
				    if(response.data.code==200){
				    	swal("Poof! Your record has been deleted!", {
					      icon: "success",
					    });
				    	$(target).parent().parent().parent().parent().parent().remove();
				    }else{
				    	swal("Error ocurred", {
					      icon: "error",
					    });
				    }
				});
			    
			  } else {
			    swal("Your record is safe!");
			  }
			});
     		console.log(id)
     	}
     </script>
    </x-slot>
</x-app-layout>