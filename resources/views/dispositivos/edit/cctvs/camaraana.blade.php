@extends('layouts.app')

@section('content')
  <div class="container">

    <div class="row justify-content-md-center">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">Modificando {{$host->name}}</div>
            <div class="card-body">
               <form action="/update_camaraana/{{$host->id}}" method="post" name="form">
                   {{ csrf_field() }}
                   <div class="form-row">
                     <div class="form-group col-md-4">
                       <label for="serial">Nombre</label>
                       <input type="text" class="form-control" id="name" name="name" value="{{$host->name}}" required>
                     </div>
                     <div class="form-group col-md-4">
                       <label for="modelo_id">Modelo</label> <a href="/modelos" target=_blank> + </a>
                         <select class="form-control" name="modelo_id">
                           <option value="{{$host->modelo_id}}">{{$host->modelo->name}}</option>
                           @foreach ($modelos as $modelo)
                             <option value="{{$modelo->id}}">{{$modelo->name}}</option>
                           @endforeach
                         </select>
                     </div>
                     <div class="form-group col-md-4">
                       <label for="serial">Serial</label>
                       <input type="text" class="form-control" id="serial" value="{{$host->serial}}" name="serial" style="text-transform:uppercase;"required>
                     </div>
                   </div>
                   <div class="form-row">
                     <div class="form-group col-md-12">
                       <label for="estado">Grabando en...</label>
                       <select class="form-control" name="cctv" required>
                         @if (is_null($host->cctv_id))
                           <option > - </option>
                           @foreach ($cctvss as $cctvs)
                             <option value="{{$cctvs->id}}">{{$cctvs->name}} - D: {{$cctvs->departament->name}} - C: {{$cctv->departament->cliente->name}}</option>
                           @endforeach
                         @else
                           <option value="{{$cctv->id}}">{{$cctv->name}} - D: {{$cctv->departament->name}} - C: {{$cctv->departament->cliente->name}}</option>
                           @foreach ($cctvss as $cctvs)
                             <option value="{{$cctvs->id}}">{{$cctvs->name}} - D: {{$cctvs->departament->name}}</option>
                           @endforeach
                         @endif

                       </select>
                     </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="estado">Grabando en...</label> <a href="/form_dvr" target=_blank> + </a>
                      <select class="form-control" name="cctv" required>
                        @if (is_null($host->cctv_id))
                          <option > - </option>
                          @foreach ($cctvss as $cctvs)
                            <option value="{{$cctvs->id}}">{{$cctvs->name}} - D: {{$cctvs->departament->name}} - C: {{$cctv->departament->cliente->name}}</option>
                          @endforeach
                        @else
                          <option value="{{$cctv->id}}">{{$cctv->name}} - D: {{$cctv->departament->name}}</option>
                          @foreach ($cctvss as $cctvs)
                            <option value="{{$cctvs->id}}">{{$cctvs->name}} - D: {{$cctvs->departament->name}}</option>
                          @endforeach
                        @endif
                      </select>
                    </div>
                      <div class="form-group col-md-6">
                        <label for="valor">Ubicacion/Zona</label>
                        <input type="text" class="form-control" id="zona" value="{{$host->zona}}" name="zona" required>
                      </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="inputEmail4">Afectado</label>
                      <select class="form-control" name="departament" required>
                        <option value="{{$host->departament_id}}">D: {{$host->departament->name}} - C: {{$host->departament->cliente->name}}</option>
                        @foreach ($departaments as $departament)
                          <option value="{{$departament->id}}">D: {{$departament->name}} - C: {{$departament->cliente->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="valor">Valor</label>
                      <input type="number" min="10" class="form-control" id="valor" value="{{$host->valor}}" name="valor" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="valor">Estado</label>
                      <select class="form-control" name="estado" required>
                        <option value="{{$host->estado->id}}">{{$host->estado->name}}</option>
                        @foreach ($estados as $estado)
                          <option value="{{$estado->id}}">{{$estado->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                   <div class="form-row">
                     <div class="form-group col-md">
                       <label for="comentario">Observaciónes</label>
                       <textarea rows="10" cols="50" type="text" class="form-control" id="comentario" name="comentario" >{{$host->comentario}} </textarea>
                     </div>
                   </div>
                     <button type="submit" class="btn btn-dark" >Agregar</button>
                 </form>
               </div>
         </div>

      </div>
  </div>
@endsection
