<x-app-layout>
  <x-slot name="header">
    <div>
      <div style="width: 35%; float: right;margin-top: 20px"></div>

      <div style="width: 50%;float: right; margin-top: 30px;background-color: white">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
          <h6 class="border-bottom pb-2 mb-0">Recent updates</h6>

          @foreach($posts as $post)
            <div class="mb-8 md:w-3/5 md:mt-5 md:mb-0 float-left" style="width: 100%;border: solid gray .5px;">
              <!--usuario-->
              <div class="d-flex text-muted">
                <div style="float: left;" >
                  <a class="navbar-brand" href="#">
                  <img src="{{url('/')}}/img/user.png" class="card-img-top" alt="..." style="width: 40px; height: 40px">
                  </a>
                </div>

                <p class="pb-3 mb-0 small lh-sm border-bottom">
                  <strong class="d-block text-gray-dark md:ml-1 md:mt-4" style="font-size: 15px;color: black">{{$post->user->name}}</strong>
                </p>
              </div>
              <!--imagen-->
              <div align="center">
                <img src="{{url('/')}}/img/{{$post->image}}" style="width: 100%;height: 400px">
              </div>
              <!--reacciones-->
              <div style="float: left; width: 100%;margin-left: 10px">
                <div style="float: left;" >
                  <a class="navbar-brand" href="#">
                  <img src="{{url('/')}}/img/cora.png" class="card-img-top" alt="..." style="width: 20px; height: 20px; margin-top: 50%">
                  </a>
                </div>
                <div style="float: left;" >
                  <a class="navbar-brand" href="#">
                  <img src="{{url('/')}}/img/messenger.png" class="card-img-top" alt="..." style="width: 20px; height: 20px; margin-top: 50%">
                  </a>
                </div>
                <div style="float: left;" >
                  <a class="navbar-brand" href="#">
                  <img src="{{url('/')}}/img/gps.png" class="card-img-top" alt="..." style="width: 20px; height: 20px; margin-top: 50%">
                  </a>
                </div>
              </div>
              <div>
                <p style="font-weight: bolder; margin-left: 10px;font-size: 14px;margin-bottom: 0">
                  {{$post->likes}} Me gusta
                </p>
              </div>
              <div style="margin-top: 0">
                <a style="color: gray; margin-left: 10px;font-size: 13px" onclick="vista('{{$post}}')" href="#" data-toggle="modal" data-target="#viewMovie">
                  Ver los Comentarios {{ $post->id }}
                </a>
              </div>
              <div class="modal" tabindex="-1" id="viewMovie">
                <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-body">
                        <div class="card mb-3" style="align-items: center;">
                        <img src="" class="card-img-top" alt="..." id="imageview" style="width: 80%; height: 250px">
                        <h1 id="test">
                          
                        </h1>
                      </div>
                  </div>
                </div>
              </div>
            </div>
              <!--comentarios-->
              <!--<div>
                @foreach($comments as $comment)
                  @if($comment->post_id == $post->id)
                  <div>
                      comentarios
                    {{$comment->user->name}}<br>
                    {{$comment->text}}<br>
                    {{$comment->likes}}
                  </div>
                  @endif
                @endforeach
                <form method="get" action="{{ url('comments') }}" enctype="multipart/form-data">
                  <div>
                      hacer comentario
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
              </div>-->
            </div>
          @endforeach
        </div>
      </div>

      <div style="width: 15%; float: right;margin-top: 20px"></div>
    </div>
  </x-slot>
  <x-slot name="scripts">
    <script type="text/javascript">

      function vista(post){
        
        var postChingon = JSON.parse(post);

        document.getElementById("imageview").src = "{{url('/')}}/img/" + postChingon["image"];
        document.getElementById("test").innerHTML = postChingon["id"];
      }
    </script>
  </x-slot>
</x-app-layout>
