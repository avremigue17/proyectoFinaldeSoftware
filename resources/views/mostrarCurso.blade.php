<x-app-layout>

  <style type="text/css">

  </style>

  <x-slot name="header">
    
  </x-slot>

  <div class="container">
    @foreach($templates as $template)
    <h5 class="card-title mt-1" style="font-weight: bolder;float: left; color: white;width: 100%">plantilla 1</h5>
      @foreach($texts as $text)
       @if($text->template_id == $template->id)
       @if($text->type == 2)
          <div class="card-body" style="background-color: rgba(49,75,88,1);">
            <h5 class="card-title mt-1" style="font-weight: bolder;float: left; color: white;width: 100%">texto</h5>
          </div>
        @endif
        @endif
      @endforeach

    @endforeach
  </div>

  </x-app-layout>