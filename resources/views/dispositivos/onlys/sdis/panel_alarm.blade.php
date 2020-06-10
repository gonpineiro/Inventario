@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header">{{$host->name}}</div>
        <div class="card-body">
          <form action="/edit_panel_alarm/{{$host->id}}" method="get" name="form-edit">
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" value="{{$host->name}}" readonly>
              </div>
              <div class="form-group col-md-3">
                <label for="modelo">Modelo</label>
                <input type="text" class="form-control" value="{{$host->modelo->name}}" readonly>
              </div>
              <div class="form-group col-md-3">
                <label for="serial">Serial</label>
                <input type="text" class="form-control" value="{{$host->serial}}" readonly>
              </div>
              <div class="form-group col-md-3">
                <label for="inputPassword4">Estado</label>
                <input type="text" class="form-control" value="{{$host->estado->name}}" readonly>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="cctv">Abonado/Cliente</label>
                <input type="text" class="form-control"
                  value="{{$host->abonado->numero}} - C: {{$host->abonado->departament->cliente->name}}" name="zona"
                  readonly>
              </div>
              <div class="form-group col-md-4">
                <label for="cctv">Ubicación</label>
                <input type="text" class="form-control" value="{{$host->zona}}" name="zona" readonly>
              </div>
              <div class="form-group col-md-2">
                <label for="cctv">Valor</label>
                <input type="text" class="form-control" value="{{$host->valor}}" name="value" readonly>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md">
                <label for="comentario">Observaciónes</label>
                <textarea rows="10" cols="50" type="text" class="form-control" id="comentario"
                  readonly>{{$host->comentario}} </textarea>
              </div>
            </div>
            @can ('panelalarms.edit') <button class="btn btn-dark">Modificar</button> @endcan
          </form>
        </div>
      </div>
    </div>


    @endsection