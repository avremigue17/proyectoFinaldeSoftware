<x-app-layout>

  <style type="text/css">

  </style>

  <x-slot name="header">
    
  </x-slot>

    <div class="container" style="float: left;">
    <div class="row row-cols-1 row-cols-md-2 g-4 p-5" style="text-align: center;">
      <div class="col-md-10 p-2" data-toggle="modal" data-target="#areaModal" style="overflow-y: scroll; height:730px;">
        <div class="card" style="background-color: #03989E">
          <div class="card-body">
            <h1 class="mb-20" style="color: white">{{$course->name}}</h1>
            @foreach($templates as $template)
              @foreach($texts as $text)
                @if($text->template_id == $template->id)
                  @if($text->type == 1)
                    <h5 class="pb-8" style="color: white">{{$text->text}}</h5>
                  @endif
                  @if($text->type == 2)
                    <img src="{{url('/')}}/img/{{$text->text}}" class="card-img-top px-auto pb-8">
                  @endif
                @endif
              @endforeach
            @endforeach
          </div>
        </div>
      </div>
      <form method="get" action="{{ url('show-question') }}" enctype="multipart/form-data">
        <textarea class="form-control" hidden name="course_id">{{$course->id}}</textarea>
        <button type="submit" class="btn btn-primary mt-6 float-left">Comenzar</button>
      </form>
    </div>
  </div>
  </x-app-layout>