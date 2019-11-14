@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-9">
          <div class="card">
            <div class="card-header">{{$host->name}}</div>
              <div class="card-body">
                <form action="/edit_televisor/{{$host->id}}" method="get" name="form-edit">
                  <div class="form-row">
                      <div class="form-group col-md-4">
                          <label for="modelo">Modelo</label>
                          <input type="text" class="form-control" id="modelo" placeholder="{{$host->modelo->name}}" disabled>
                      </div>
                      <div class="form-group col-md-4">
                          <label for="serial">Serial</label>
                          <input type="text" class="form-control" id="serial" placeholder="{{$host->serial}}" disabled>
                      </div>
                      <div class="form-group col-md-4">
                         <label for="inputPassword4">Estado</label>
                         <input type="text" class="form-control" id="estad" placeholder="{{$host->estado->name}}" disabled>
                      </div>
                    </div>
                    <div class="form-row">
                    @if (is_null($host->cctv_id))
                      <div class="form-group col-md-12">
                        <label for="cctv">Instalado en...</label>
                        <input type="text" class="form-control" id="cctv" placeholder="  "  name="cctv" disabled>
                      </div>
                    @else
                      <div class="form-group col-md-12">
                        <label for="cctv">Instalado en...</label>
                        <input type="text" class="form-control" id="cctv" placeholder=
                        "{{$host->host->name}} @if (!is_null($host->host->user_host)) U: {{$host->host->user_host->apellido}} {{$host->host->user_host->name}} - D: {{$host->host->user_host->departament->name}} - C: {{$host->host->user_host->departament->cliente->id}}  @endif "name="cctv" disabled>
                      </div>
                    @endif
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md">
                        <label for="comentario">Observaciónes</label>
                        <textarea rows="10" cols="50" type="text" class="form-control" id="comentario" disabled >{{$host->comentario}} </textarea>
                      </div>
                    </div>
                    @can ('televisors.edit') <button class="btn btn-dark">Modificar</button> @endcan
                </form>
             </div>
           </div>
      </div>


@endsection
