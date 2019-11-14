@extends('layouts.app')

@section('content')
  <div class="container">

    <div class="row justify-content-md-center">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">Modificando {{$host->name}}</div>
            <div class="card-body">
                <form action="/update_mouse/{{$host->id}}" method="post" name="form">
                    {{ csrf_field() }}
                    </br>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="serial">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$host->name}}" required>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="serial">Serial</label>
                        <input type="text" class="form-control" id="serial" value="{{$host->serial}}" name="serial" style="text-transform:uppercase;"required>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="estado">Estado</label>
                        <select class="form-control" name="estado" required>
                          <option value="{{$host->estado_id}}">{{$host->estado->name}}</option>
                          @foreach ($estados as $estado)
                            <option value="{{$estado->id}}">{{$estado->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="estado">Instalado en...</label>
                        <select class="form-control" name="cctv" required>
                            <option value="{{$cctv->id}}">{{$cctv->name}} @if (!is_null($cctv->user_host)) - U: {{$cctv->user_host->apellido}} {{$cctv->user_host->name}} - D: {{$cctv->user_host->departament->name}} - C: {{$cctv->user_host->departament->cliente->name}}@endif </option>
                            @foreach ($computadors as $computador)
                              <option value="{{$computador->id}}">{{$computador->name}} @if (!is_null($computador->user_host)) - U: {{$computador->user_host->apellido}} {{$computador->user_host->name}} - D: {{$computador->user_host->departament->name}} - C: {{$computador->user_host->departament->cliente->name}}@endif</option>
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
                    <button type="submit" class="btn btn-dark">Aceptar</button>
                  </form>
                </div>
          </div>
      </div>
  </div>
@endsection
