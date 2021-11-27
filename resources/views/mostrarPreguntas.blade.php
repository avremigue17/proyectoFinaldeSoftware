<x-app-layout>

  <style type="text/css">

  </style>

  <x-slot name="header">
    
  </x-slot>

    <div class="container" style="float: left;">
    <div class="row row-cols-1 row-cols-md-2 g-4 p-5" style="text-align: center;">
      <div class="col-md-10 p-2 bg-dark me-md-3 pb-5 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden d-flex align-items-center" data-toggle="modal" data-target="#areaModal" style="border-radius: 21px">
        <div class="card" style="background-color: white">
          <div class="card-body text-left">
            <div class="w-full ">
              <h5 id="pregunta" class="pb-8" style="color: black; font-weight: bolder;">pregunta</h5>
            </div>
            <div class="w-1/2 float-left">
              <input class="float-left mr-3" onchange="radio()" type="radio" name="answer" value="0">
              <h5 id="respuesta1" class="pb-8" style="color: black">respuesta</h5>
            </div>
            <div class="w-1/2 float-right">
              <input class="float-left mr-3" onchange="radio()" type="radio" name="answer" value="1">
              <h5 id="respuesta2" class="pb-8" style="color: black">respuesta</h5>
            </div>
            <div class="w-1/2 float-left">
              <input class="float-left mr-3" onchange="radio()" type="radio" name="answer" value="2">
              <h5 id="respuesta3" class="pb-8" style="color: black">respuesta</h5>
            </div>
            <div class="w-1/2 float-right">
              <input class="float-left mr-3" onchange="radio()" type="radio" name="answer" value="3">
              <h5 id="respuesta4" class="pb-8" style="color: black">respuesta</h5>
            </div>
          </div>
        </div>
      </div>
        <button id="boton" onclick="siguiente()" class="btn btn-primary mt-6 float-right">siguinte</button>
        <form id="res" class="mb-2" method="get" action="{{ url('show-record') }}" enctype="multipart/form-data">
          <textarea class="form-control" hidden name="course_id">{{$course->id}}</textarea>
          <textarea class="form-control" hidden name="user_id">{{Auth::user()->id}}</textarea>
          <textarea class="form-control" hidden name="score" id="score"></textarea>
        </form>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
  <script type="text/javascript">
    var ele = document.getElementsByName("answer");
    var questions = [];
    var answer1 = [];
    var answer2 = [];
    var answer3 = [];
    var answer4 = [];
    var userAnswers = [];
    var correctAnswers = [];
    var iterador = 0;

    document.getElementById('boton').disabled = true;
    function radio(){
      for(var i=0;i<ele.length;i++){
        if(ele[i].checked)
          document.getElementById('boton').disabled = false;
      }
    }
    
    

    <?php foreach ($questions as $question): ?>
      questions.push('{{$question->question}}');
      var i = 0;
      <?php foreach ($answers as $answer): ?>
        <?php if ($answer->question_id == $question->id): ?>
        switch(i){
          case 0:answer1.push('{{$answer->answer}}');break;
          case 1:answer2.push('{{$answer->answer}}');break;
          case 2:answer3.push('{{$answer->answer}}');break;
          case 3:answer4.push('{{$answer->answer}}');break;
        }
        if('{{$answer->status}}' == 1)
          correctAnswers.push(i);
        if(i == 4)
          i = 0;
        i++;
      <?php endif ?>
      <?php endforeach ?>
    <?php endforeach ?>
    console.log(correctAnswers);
    document.getElementById('pregunta').innerHTML = questions[iterador];
    document.getElementById('respuesta1').innerHTML = answer1[iterador];
    document.getElementById('respuesta2').innerHTML = answer2[iterador];
    document.getElementById('respuesta3').innerHTML = answer3[iterador];
    document.getElementById('respuesta4').innerHTML = answer4[iterador];

    var total = questions.length;
    function siguiente(){
      document.getElementById('boton').disabled = true;
      if(iterador != total-1){
        iterador++;

        for(var i=0;i<ele.length;i++){
          if(ele[i].checked)
            userAnswers.push(ele[i].value);
        }
        
        for(var i=0;i<ele.length;i++)
          ele[i].checked = false;

        document.getElementById('pregunta').innerHTML = questions[iterador]; 
        document.getElementById('respuesta1').innerHTML = answer1[iterador];
        document.getElementById('respuesta2').innerHTML = answer2[iterador];
        document.getElementById('respuesta3').innerHTML = answer3[iterador];
        document.getElementById('respuesta4').innerHTML = answer4[iterador];
        if(iterador == total-1){
          document.getElementById('boton').innerHTML = 'Finalizar';
        }
      }else{
        var cont = 0;
        for(var i=0; i<userAnswers.length; i++){
          if(userAnswers[i] == correctAnswers[i])
            cont++;
        }
        var score = (cont*100)/total;
        document.getElementById('score').value = score;
        document.getElementById('res').submit();
      }
    }
  </script> 
</x-app-layout>