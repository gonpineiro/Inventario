@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">{{$host->name}}</div>
            <div class="card-body">
                <form action="/edit_sensor/{{$host->id}}" method="get" name="form-edit">
                  <div class="form-row">
                      <div class="form-group col-md-4">
                          <label for="name">Nombre</label>
                          <input type="text" class="form-control" id="name" placeholder={{$host->name}} disabled>
                      </div>
                      <div class="form-group col-md-4">
                          <label for="modelo">Modelo</label>
                          <input type="text" class="form-control" id="modelo" placeholder={{$host->modelo->name}} disabled>
                      </div>
                      <div class="form-group col-md-4">
                          <label for="serial">Serial</label>
                          <input type="text" class="form-control" id="serial" placeholder={{$host->serial}} disabled>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-5">
                        <label for="cctv">Conectado</label>
                        @if ($host->host->host_type_id == 40)
                          <input type="text" class="form-control" id="cctv" placeholder="P: {{$host->host->id}} - AB: {{$host->host->abonado->numero}} - C: {{$host->host->abonado->cliente->name}}"  name="zona" disabled>
                        @endif
                        @if ($host->host->host_type_id == 41)
                          <input type="text" class="form-control" id="cctv" placeholder="E: {{$host->host->id}} - P: {{$host->host->host["id"]}} - AB: {{$host->host->host["abonado"]["numero"]}} - C: {{$host->host->host["abonado"]["cliente"]["name"]}}"  name="zona" disabled>
                        @endif
                        @if ($host->host->host_type_id == 44)
                          <input type="text" class="form-control" id="cctv" placeholder="T: {{$host->host->id}} - P: {{$host->host->host["id"]}} - AB: {{$host->host->host["abonado"]["numero"]}} - C: {{$host->host->host["abonado"]["cliente"]["name"]}}"  name="zona" disabled>
                        @endif
                      </div>
                      <div class="form-group col-md-5">
                        <label for="cctv">Ubicacion</label>
                        <input type="text" class="form-control" id="cctv" placeholder="{{$host->zona}}"  name="zona" disabled>
                      </div>
                      <div class="form-group col-md-2">
                        <label for="valor">Valor</label>
                        <input type="text" class="form-control" id="valor" placeholder="{{$host->valor}}"  name="valor" disabled>
                      </div>
                    </div>
                    <div class="form-row">
                          <div class="form-group col-md">
                            <label for="comentario">Observaciónes</label>
                            <textarea rows="10" cols="50" type="text" class="form-control" id="comentario" disabled >{{$host->comentario}} </textarea>
                          </div>
                    </div>
                <button type="" href="/edit/{{$host->id}}" class="btn btn-dark">Modificar</button>
                </form>
             </div>
           </div>
      </div>


@endsection
