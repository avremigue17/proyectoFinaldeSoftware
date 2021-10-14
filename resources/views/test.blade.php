<x-app-layout>

  <style type="text/css">

  </style>

  <x-slot name="header">
    <div>
      <div id="divIzquierda" style="width: 27%; float: right;margin-top: 20px"></div>

      <div id="divCentral" style="width: 50%;float: right; margin-top: 30px;background-color: black">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
          @if(Auth::user()->hasRole('Admin'))
            <h6 class="border-bottom pb-2 mb-0" style="color: white">admin</h6>
          @else
            <h6 class="border-bottom pb-2 mb-0" style="color: white">no admin</h6>
          @endif
        </div>
      </div>

      <div id="divDerecha" style="width: 23%; float: right;margin-top: 20px"></div>
    </div>
  </x-slot>

</x-app-layout>