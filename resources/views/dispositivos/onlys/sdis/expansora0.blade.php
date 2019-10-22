@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">{{$host->name}}</div>
            <div class="card-body">
                <form action="/edit_expansora/{{$host->id}}" method="get" name="form-edit">
                  <div class="form-row">
                      <div class="form-group col-md-3">
                          <label for="name">Nombre</label>
                          <input type="text" class="form-control" id="name" placeholder={{$host->name}} disabled>
                      </div>
                      <div class="form-group col-md-3">
                          <label for="modelo">Modelo</label>
                          <input type="text" class="form-control" id="modelo" placeholder={{$host->modelo->name}} disabled>
                      </div>
                      <div class="form-group col-md-3">
                          <label for="serial">Serial</label>
                          <input type="text" class="form-control" id="serial" placeholder={{$host->serial}} disabled>
                      </div>
                      <div class="form-group col-md-3">
                         <label for="inputPassword4">Estado</label>
                         <input type="text" class="form-control" id="estado" placeholder="{{$host->estado->name}}" disabled>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-5">
                        <label for="cctv">Expandiendo...</label>
                        <input type="text" class="form-control" id="cctv" placeholder="P: {{$host->host->id}} - AB: {{$host->host->abonado->id}} - C: {{$host->host->abonado->cliente->name}}"  name="zona" disabled>
                      </div>
                      <div class="form-group col-md-5">
                        <label for="cctv">Ubicacion</label>
                        <input type="text" class="form-control" id="cctv" placeholder="{{$host->zona}}"  name="zona" disabled>
                      </div>
                      <div class="form-group col-md-2">
                        <label for="valor">Ubicacion</label>
                        <input type="text" class="form-control" id="valor" placeholder="{{$host->valor}}"  name="valor" disabled>
                      </div>
                    </div>
                    <div class="form-row">
                          <div class="form-group col-md">
                            <label for="comentario">Observaciónes</label>
                            <textarea rows="10" cols="50" type="text" class="form-control" id="comentario" disabled placeholder="{{$host->comentario}}"> </textarea>
                          </div>
                    </div>
                <button type="" href="/edit/{{$host->id}}" class="btn btn-dark">Modificar</button>
                </form>
             </div>
           </div>
      </div>


@endsection
