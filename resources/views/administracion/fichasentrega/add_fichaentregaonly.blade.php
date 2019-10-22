@extends('layouts.administracion')

@section('content')
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">Generar entrega de equipamiento tecnologico <span style="float:right;color:red;font-weight: bold;">{{$last}}</span></div>
            <div class="card-body">
                <form action="/add_ficha_entrega" method="post" name="form">
                  {{ csrf_field() }}
                  <div class="form-row">
                    <div class="form-group col-md-9">
                      <label for="user_host_id">Usuario</label>
                      <select class="form-control" name="user_host_id">
                        @foreach ($userhosts as $userhost)
                          <option value="{{$userhost->id}}">{{$userhost->name}} {{$userhost->apellido}} | {{$userhost->departament->name}} - {{$userhost->departament->cliente->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="serial">Fecha de entrega</label>
                      <input type="date" class="form-control" id="fecha" name="fecha" required>
                    </div>
                  </div>
                  <div class="card-header">Detalle de la entrega</div>
                  <table class="table" style="width:100%">
                    <thead>
                      <tr>
                        <th scope="col" style="width:10%">Cant</th>
                        <th scope="col"style="width:50%">Marca/Modelo/SN</th>
                        <th scope="col"style="width:55%">Observaciones</th>
                      </tr>
                    </thead>
                    <tbody>

                          <tr>
                            <td><input type="number" class="form-control" value= 1 name="" disabled></td>
                                <input type="number" class="form-control"  value= 1 name="detalle[0][cantidad]" hidden>
                            <td><input type="text" class="form-control"  value="{{$host->modelo->marca}} - {{$host->modelo->name}} - {{$host->serial}}"disabled></td>
                                <input type="text" class="form-control" value="{{$host->id}}" name="detalle[0][host_id]" hidden>
                            <td><input type="text" class="form-control"  placeholder="" name="detalle[0][obs]" ></td>
                          </tr>
                    </tbody>
                  </table>
                  <input type="text" class="form-control" value=0 name="reddi" hidden>
                  <button type="submit" class="btn btn-dark">Agregar</button>
                </form>
              </div>
        </div>
      </div>
  </div>
@endsection
