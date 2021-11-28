<x-app-layout>

  <style type="text/css">

  </style>

  <x-slot name="header">
    
  </x-slot>

    <div class="container" style="float: left;">
    <div class="row row-cols-1 row-cols-md-2 g-4 p-5" style="text-align: center;">
      <div class="col-md-10 p-2" data-toggle="modal" data-target="#areaModal" style="overflow-y: scroll; height: 80vh">
        <div class="card" style="background-color: white">
          <div class="card-body">
             <div class="pb-3">
    <div class="bg-dark me-md-3 pb-10 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden" style="border-radius: 21px">
      <div class="my-3 py-3">
        <h1 class="display-5" style="font-size: 70px">{{$course->name}}</h1>
      </div>
      <div class="bg-light shadow-sm mx-auto d-flex align-items-center" style="width: 80%; height: 250px; border-radius: 21px 21px 21px 21px;">
        <h1 class="lead" style="color: black; margin-left: 20%;font-size: 50px; bolder">Comencemos.</h1>
      </div>
    </div>
  </div>
            @foreach($templates as $template)
              @foreach($texts as $text)
                @if($text->template_id == $template->id)
                  @if($text->type == 1)
                    <p class="bg-dark me-md-3 pb-5 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden d-flex align-items-center" style="border-radius: 21px;height:500px; font-size: 20px; word-wrap: break-word;">{{$text->text}}</p>
                  @endif
                  @if($text->type == 2)
                    <img src="{{url('/')}}/img/{{$text->text}}" class="card-img-top px-auto pb-8" style="height: 500px; border-radius: 21px">
                  @endif
                @endif
              @endforeach
            @endforeach
          </div>
        </div>
        <div style="margin-left: 40%">
          <form method="get" action="{{ url('show-question') }}" enctype="multipart/form-data" style="width: 100%">
        <textarea class="form-control" hidden name="course_id">{{$course->id}}</textarea>
        <button type="submit" class="btn btn-primary mt-6 float-left">Comenzar Evaluacion</button>
      </form>
        </div>
      </div>
    </div>
  </div>
  </x-app-layout>