<x-app-layout >
  <x-slot name="header">
    <div class="">
      <!-- div de la derecha con sugerencias-->
      <div class="mb-8 md:w-2/5 md:mt-20 float-right">
        sugerencias
      </div>

      <!-- div de la izquierda con posts-->
      <div class="mb-8 md:w-3/5 md:mt-20 float-left">
        <!--usuario-->
        <div></div>
        <!--imagen-->
        <div></div>
        <!--reacciones-->
        <div></div>
        <!--comentarios-->
        <div>
          <div><!--likes--></div>
          <div><!--comentarios--></div>
          <div><!--fecha--></div>
        </div>
      </div>
      
    </div>
  </x-slot>
</x-app-layout>
