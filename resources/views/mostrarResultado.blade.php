<x-app-layout>

  <style type="text/css">

  </style>

  <x-slot name="header">
  </x-slot>

  <div class="container" style="float: left;">
    <div class="row row-cols-1 row-cols-md-2 g-4 p-5" style="text-align: center;">
      <div class="col-md-10 p-2" data-toggle="modal" data-target="#areaModal" style="overflow-y: scroll; height:730px;">
        <div class="card" style="background-color: #03989E">
          <h1 class="pb-8 pt-3" style="color: white">{{$course->name}}</h1>
          <h1 class="pb-8 pt-3" style="color: white">Score: {{$record->score}}</h1>
          @foreach($questions as $question)
            <div class="card-body text-left ml-10">
              <div class="w-full">
                <h5 id="pregunta" class="pb-8" style="color: white">{{$question->question}}</h5>
              </div>
              @foreach($answers as $answer)
              @if($answer->question_id == $question->id)
                <div class="w-1/2 float-left">
                  @if($answer->status == 0)
                  <h5 id="respuesta1" class="pb-8" style="color: white">{{$answer->answer}}</h5>
                  @else
                  <h5 id="respuesta1" class="pb-8" style="color: green">{{$answer->answer}}</h5>
                  @endif
                </div>
              @endif
              @endforeach
            </div>
          @endforeach
        </div>
      </div>
      <form action="{{route('test', Auth::user()->id)}}" style="width: 100%">
        <button type="submit" class="btn btn-primary mb-2" style="margin-top: 5px;width: 80%;font-weight: bolder;">Finalizar</button>
      </form>
    </div>
  </div>

</x-app-layout>