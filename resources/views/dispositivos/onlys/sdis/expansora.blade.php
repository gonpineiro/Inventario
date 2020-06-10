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
              <div class="form-group col-md-4">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" value="{{$host->name}}" readonly>
              </div>
              <div class="form-group col-md-4">
                <label for="modelo">Modelo</label>
                <input type="text" class="form-control" value="{{$host->modelo->name}}" readonly>
              </div>
              <div class="form-group col-md-4">
                <label for="serial">Serial</label>
                <input type="text" class="form-control" value="{{$host->serial}}" readonly>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-5">
                <label for="cctv">Conectado</label>
                <input type="text" class="form-control"
                  value="{{$host->host->id}} - AB: {{$host->host->abonado->numero}} - C: {{$host->host->abonado->departament->cliente->name}}"
                  name="zona" readonly>
              </div>
              <div class="form-group col-md-5">
                <label for="cctv">Ubicacion</label>
                <input type="text" class="form-control" value="{{$host->zona}}" name="zona" readonly>
              </div>
              <div class="form-group col-md-2">
                <label for="valor">Valor</label>
                <input type="text" class="form-control" value="{{$host->valor}}" name="valor" readonly>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md">
                <label for="comentario">Observaciónes</label>
                <textarea rows="10" cols="50" type="text" class="form-control"
                  readonly>{{$host->comentario}} </textarea>
              </div>
            </div>

            @can ('expansoras.edit') <button class="btn btn-dark">Modificar</button> @endcan
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
