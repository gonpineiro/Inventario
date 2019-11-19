@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">Agregar Camara Analogica</div>
            <div class="card-body">
                <form action="/add_camaraana" method="post" name="form">
                  {{ csrf_field() }}
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="serial">Nombre</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="modelo">Modelo</label>
                        <select class="form-control" name="modelo">
                          <option value="">- - - Seleccione - - -</option>
                          @foreach ($modelos as $modelo)
                            <option value="{{$modelo->id}}">{{$modelo->name}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="serial">Serial</label>
                      <input type="text" class="form-control" id="serial" placeholder="" name="serial" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="ip_publica">Grabando en...</label>
                      <select class="form-control" name="cctv" >
                        <option value="">- - - Seleccione - - -</option>
                        @foreach ($cctvs as $cctv)
                          <option value="{{$cctv->id}}">{{$cctv->name}} - D: {{$cctv->departament->name}} - C: {{$cctv->departament->cliente->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="departament">Afectado</label>
                          <select class="form-control" name="departament" required>
                            <option value="">- - - Seleccione - - -</option>
                            @foreach ($departaments as $departament)
                              <option value="{{$departament->id}}">D: {{$departament->name}} - C: {{$departament->cliente->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="valor">Ubicacion/Zona</label>
                          <input type="text" class="form-control" id="zona" placeholder="" name="zona">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="valor">Valor</label>
                          <input type="number" min="10" class="form-control" id="valor" placeholder="" name="valor" required>
                        </div>
                  </div>
                  <div class="form-row">
                        <div class="form-group col-md">
                          <label for="comentario">Observacion</label>
                          <textarea rows="10" cols="50" type="text" min="10" class="form-control" id="comentario" placeholder="" name="comentario" > </textarea>
                        </div>
                  </div>
                  <button type="submit" class="btn btn-dark" >Agregar</button>
                </form>
              </div>
          </div>
      </div>
  </div>

@endsection
