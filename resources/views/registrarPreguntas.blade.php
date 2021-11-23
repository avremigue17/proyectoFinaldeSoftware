<x-app-layout>

  <style type="text/css">

  </style>

  <x-slot name="header">
    
  </x-slot>

  <div class="container mt-20" style="float: left;">
    <div class="container" align="center">
      <h1 class="m-0" style="font-weight: bolder;">
         sdasdasdasd
      </h1>
    </div>
    <div class="container">
          <form method="get" action="" enctype="multipart/form-data">
            <div class="col-md-10 p-1">
              <label class="form-label " style="font-weight: bolder; margin-top: 5px;font-size: 20px">Ingresar Pregunta:</label>
              <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3"></textarea>
              <textarea class="form-control" hidden name=""></textarea>
            </div>
            <div class="input-group col-md-10 p-1">
              <span class="input-group-text">Respuesta Correcta</span>
              <textarea class="form-control" aria-label="With textarea" rows="1"></textarea>
            </div>
            <div class="input-group col-md-10 p-1">
              <span class="input-group-text">Respuesta Incorrecta</span>
              <textarea class="form-control" aria-label="With textarea" rows="1"></textarea>
            </div>
            <div class="input-group col-md-10 p-1">
              <span class="input-group-text">Respuesta Incorrecta</span>
              <textarea class="form-control" aria-label="With textarea" rows="1"></textarea>
            </div>
            <div class="input-group col-md-10 p-1">
              <span class="input-group-text">Respuesta Incorrecta</span>
              <textarea class="form-control" aria-label="With textarea" rows="1"></textarea>
            </div>
            <div style="width: 82%" align="center">
              <button type="submit" class="btn btn-primary mb-2" style="margin-top: 5px;">Agregar</button>
            </div>
          </form>
          <div class="container mt-3">
      <div style="width: 90%" class="">
        <div style="float: left; width: 50%">
          <button type="submit" onclick="" class="btn btn-primary mb-2" style="margin-top: 5px;width: 80%; background-color: red; font-weight: bolder;">Cancelar</button>
        </div>
        <div style="float: left; width: 50%">
          <form action="" style="width: 100%">
    <button type="submit" onclick="" id="finalizar" class="btn btn-primary mb-2" style="margin-top: 5px;width: 80%;font-weight: bolder;">Finalizar</button>
  </form>
        </div>
  
</div>
  </div>
        </div>
        
  </div>

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 

</x-app-layout>