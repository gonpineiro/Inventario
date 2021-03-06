@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">{{$host->name}}</div>
            <div class="card-body">
                <form action="/edit_tracker/{{$host->id}}" method="get" name="form-edit">
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
                      <div class="form-group col-md-4">
                          <label for="name">SIM I</label>
                          <input type="text" class="form-control" id="name" placeholder=@if (!is_null($host->sim_i)) {{$host->sim_i->line_phone}} @else "" @endif disabled>
                      </div>
                      <div class="form-group col-md-4">
                          <label for="modelo">SIM II</label>
                          <input type="text" class="form-control" id="modelo" placeholder=@if (!is_null($host->sim_ii)) {{$host->sim_ii->line_phone}} @else "" @endif disabled>
                      </div>
                      <div class="form-group col-md-4">
                          <label for="serial">SIM III</label>
                          <input type="text" class="form-control" id="serial" placeholder=@if (!is_null($host->sim_iii)) {{$host->sim_iii->line_phone}} @else "" @endif disabled>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-5">
                        <label for="cctv">Abonado</label>
                        <input type="text" class="form-control" id="abonado" placeholder="{{$host->abonado->numero}}"  name="abonado" disabled>
                      </div>
                      <div class="form-group col-md-5">
                        <label for="cctv">Ubicacion</label>
                        <input type="text" class="form-control" id="zona" placeholder="{{$host->zona}}"  name="zona" disabled>
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
                    @can ('trackers.edit') <button class="btn btn-dark">Modificar</button> @endcan
                </form>
             </div>
           </div>
      </div>


@endsection
