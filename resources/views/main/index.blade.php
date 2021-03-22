<x-app-layout >
  <x-slot name="header">
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
                  {{$post->user_id}}
            </h1>
          </div>

          <!--imagen-->
          <div>
            <img src="{{url('/')}}/img/{{$post->image}}">
          </div>
          <!--reacciones-->
          <div>
            <h1>
                  likes: {{$post->likes}}
            </h1>
          </div>
          <!--comentarios-->
          <div>
            <div><!--likes--></div>
            <div><!--comentarios--></div>
            <div><!--fecha--></div>
          </div>
        </div>
      @endforeach
    </div>
  </x-slot>
</x-app-layout>