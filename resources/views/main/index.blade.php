<x-app-layout>
  <x-slot name="header">
    <div>
      <div style="width: 20%; float: right;margin-top: 20px"></div>

      <div style="width: 60%;float: right; margin-top: 30px;background-color: white">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
          <h6 class="border-bottom pb-2 mb-0">Recent updates</h6>

          @foreach($posts as $post)
            <div class="mb-8 md:w-3/5 md:mt-20 float-left" style="width: 100%">
              <!--usuario-->
              <div class="d-flex text-muted pt-3">
                <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

                <p class="pb-3 mb-0 small lh-sm border-bottom">
                  <strong class="d-block text-gray-dark" style="font-size: 20px">{{$post->user->name}}</strong>
                </p>
              </div>
              <!--imagen-->
              <div align="center">
                <img src="{{url('/')}}/img/{{$post->image}}" style="width: 70%;height: 300px">
              </div>
              <!--reacciones-->
              <div>
                <h1>
                  likes: {{$post->likes}}
                </h1>
              </div>
              <!--comentarios-->
              <div>
                @foreach($comments as $comment)
                  @if($comment->post_id == $post->id)
                  <div><!--comentarios-->
                    {{$comment->user->name}}<br>
                    {{$comment->text}}<br>
                    {{$comment->likes}}
                  </div>
                  @endif
                @endforeach
                <form method="get" action="{{ url('comments') }}" enctype="multipart/form-data">
                  <div><!--hacer comentario-->
                    <textarea class="form-control" rows="1" placeholder="Comment..." name="text"></textarea>
                    <input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" class="form-control" name="post_id" value="{{$post->id}}">
                    <input type="hidden" class="form-control" name="fecha_de_creacion" value="0">
                    <button type="submit" class="btn btn-primary">
                      Publicar
                    </button>
                  </div>
                </form>
                <div>fecha: {{$post->created_at}}</div>
              </div>
            </div>
          @endforeach
        </div>
      </div>

      <div style="width: 20%; float: right;margin-top: 20px"></div>
    </div>

    <div class="">
      <!-- div de la derecha con sugerencias-->
      <div class="mb-8 md:w-2/5 md:mt-20 float-right">
        sugerencias
      </div>

      <!-- div de la izquierda con posts-->
      @foreach($posts as $post)
        <div class="mb-8 md:w-3/5 md:mt-20 float-left">
          <!--usuario-->
          <div>
            <h1>
              {{$post->user->name}}
            </h1>
          </div>

          <!--imagen-->
          <div>
            <img src="{{url('/')}}/img/{{$post->image}}" style="width: 200px; height: 100px">
          </div>
          <!--reacciones-->
          <div>
            <h1>
              likes: {{$post->likes}}
            </h1>
          </div>
          <!--comentarios-->
          <div>
            @foreach($comments as $comment)
              @if($comment->post_id == $post->id)
              <div><!--comentarios-->
                {{$comment->user->name}}<br>
                {{$comment->text}}<br>
                {{$comment->likes}}
              </div>
              @endif
            @endforeach
            <div>fecha: {{$post->created_at}}</div>
          </div>
        </div>
      @endforeach
    </div>
  </x-slot>

  <x-slot name="scripts">
    <script type="text/javascript">
      function doComment(id){
      axios.get('{{ url('comments-info') }}/'+id)
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