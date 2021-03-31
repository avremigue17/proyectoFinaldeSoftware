<x-app-layout>
  <x-slot name="header">
    <div>
      <div style="width: 27%; float: right;margin-top: 20px"></div>

      <div style="width: 50%;float: right; margin-top: 30px;background-color: black">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
          <h6 class="border-bottom pb-2 mb-0" style="color: white">Recent updates</h6>

          @foreach($posts as $post)
            <div class="mb-8 md:w-3/5 md:mt-5 md:mb-0 float-left" style="width: 100%;border: solid gray .5px;">
              <!--usuario-->
              <div class="d-flex text-muted">
                <div style="float: left;" >
                  <a class="navbar-brand" href="#">
                  <img src="{{url('/')}}/img/{{$post->user->profile_image}}" class="card-img-top" alt="..." style="width: 40px; height: 40px; margin-left: 5px; margin-top: 1px">
                  </a>
                </div>

                <p class="pb-3 mb-0 small lh-sm border-bottom">
                  <strong class="d-block text-gray-dark md:ml-1 md:mt-4" style="font-size: 15px;color: black; margin-left: -10px">{{$post->user->name}}</strong>
                </p>
              </div>
              <!--imagen-->
              <div align="center">
                <img src="{{url('/')}}/img/{{$post->image}}" style="width: 100%;height: 600px; margin-top: -10px">
              </div>
              <!--reacciones-->
              <div style="float: left; width: 100%;margin-left: 10px">
                <div style="float: left;" >
                  @if(sizeof($postLikes->where('user_id', Auth::user()->id)->where('post_id', $post->id)) != 0)
                    <a class="navbar-brand">
                      <img id="cora-{{$post->id}}" onclick="likazo('{{$post->id}}','{{Auth::user()->id}}')" src="{{url('/')}}/img/cora2.png" class="card-img-top" alt="..." style="width: 20px; height: 20px; margin-top: 50%">
                    </a>
                  @else
                    <a class="navbar-brand">
                      <img id="cora-{{$post->id}}" onclick="likazo('{{$post->id}}','{{Auth::user()->id}}')" src="{{url('/')}}/img/cora.png" class="card-img-top" alt="..." style="width: 30px; height: 30px; margin-top: 50%">
                    </a>
                  @endif
                </div>
                <div style="float: left;" >
                  <a class="navbar-brand">
                  <img src="{{url('/')}}/img/messenger.png"  class="card-img-top" alt="..." style="width: 20px; height: 20px; margin-top: 50%">
                  </a>
                </div>
                <div style="float: left;" >
                  <a class="navbar-brand">
                  <img src="{{url('/')}}/img/gps.png" class="card-img-top" alt="..." style="width: 20px; height: 20px; margin-top: 50%">
                  </a>
                </div>
              </div>
              <div>
                <p style="font-weight: bolder; margin-left: 10px;font-size: 14px;margin-bottom: 0">
                    {{ $post->likes }} Me gusta
                </p>
              </div>
              <div style="margin-top: 0">
                <a style="color: gray; margin-left: 10px;font-size: 13px" onclick="vista('{{$post}}','{{$comments}}')" href="#" data-toggle="modal" data-target="#viewMovie">
                  Ver los Comentarios
                </a>
              </div>


              <div class="modal" tabindex="-1" id="viewMovie">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-body">
                        <div class="card mb-3" style="align-items: center;width: 55%; float: left; height: 480px">
                        <img src="" class="card-img-top" alt="..." id="imageview" style="width: 80%; height: 100%">
                      </div>
                      <div style="width: 40%;float: right; height: 400px; overflow-y: scroll;" id="myDIV">
                        
                      </div>
                      <div style="float: right; width: 40%">
                        <form method="get" action="{{ url('comments') }}" enctype="multipart/form-data">
                          <div>
                            hacer comentario
                          <textarea class="form-control" rows="1" placeholder="Comment..." name="text"></textarea>
                          <input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}">
                          <input type="hidden" id="comentario" class="form-control" name="post_id">
                          <input type="hidden" class="form-control" name="fecha_de_creacion" value="0">
                          <button type="submit" class="btn btn-primary">
                            Publicar
                          </button>
                        </div>
                      </form>
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

      <div style="width: 23%; float: right;margin-top: 20px"></div>
    </div>
  </x-slot>
  <x-slot name="scripts">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script type="text/javascript">

      function vista(post,comments){
        
        var postChingon = JSON.parse(post);
        var comentarios = JSON.parse(comments);

        document.getElementById("imageview").src = "{{url('/')}}/img/" + postChingon["image"];
        document.getElementById("myDIV").innerHTML="";
        document.getElementById("comentario").value = postChingon["id"];

        <?php foreach ($comments as $comment): ?>
          if("{{$comment->post_id}}" == postChingon["id"])
          {
            var img = document.createElement("img");
            var p1 = document.createElement("P");
            var p2 = document.createElement("P");
            p1.style.fontWeight="bolder";
            p1.style.marginBottom="0";
            p1.style.float="left";
            p1.style.width="92%";
            img.style.width="20px";
            img.style.height="20px";
            img.style.float="left";

            img.src ="{{url('/')}}/img/" + "{{$comment->user->profile_image}}";
            var u = document.createTextNode("{{$comment->user->name}}");
            var t = document.createTextNode("{{$comment->text}}");      
            p1.appendChild(u);    
            p2.appendChild(t);
            document.getElementById("myDIV").appendChild(img);                                           
            document.getElementById("myDIV").appendChild(p1);
            document.getElementById("myDIV").appendChild(p2);  
          }  
        <?php endforeach ?>
      }

      function likazo(id,user_id){

        var salsa = document.getElementById("cora-"+id).src;
                
        if(salsa.substr(salsa.length - 9).includes("2"))
          document.getElementById("cora-"+id).src = "{{url('/')}}/img/cora.png";
        else
          document.getElementById("cora-"+id).src = "{{url('/')}}/img/cora2.png";

        axios({
          method: 'post',
          url: '{{ url('postLikes') }}',
          data: {
            post_id: id,
            user_id: user_id,
          }
        }).then(function (response) { 
            if(response.data.code == 500)
            {
              axios({
                method: 'delete',
                url: '{{ url('postLikes') }}',
                data: {
                  id: response.data.id[0].id,
                }
              }).then(function (response) {
                console.log(response.data.message);
                location.reload();
              });
            }
            else
            {
              console.log(response.data.message);
              location.reload();
            }
        });
      }
    </script>
  </x-slot>
</x-app-layout>
