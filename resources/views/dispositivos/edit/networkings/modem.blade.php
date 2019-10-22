@extends('layouts.app')

@section('content')
  <div class="container">

    <div class="row justify-content-md-center">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">Modificando {{$host->name}}</div>
            <div class="card-body">
                  <form action="/update_modem/{{$host->id}}" method="post" name="form">
                    {{ csrf_field() }}
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="serial">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$host->name}}" required>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="modelo_id">Modelo</label>
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
                          <div class="form-group col-md-6">
                            <label for="mac_adress">Mac address</label>
                            <input type="text" class="form-control" id="mac_adress" value="{{$host->mac_adress}}" name="mac_adress" pattern="^([0-9A-F]{2}[:-]){5}([0-9A-F]{2})$" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="ip_local">Ip publica</label>
                            <input type="text" class="form-control" id="ip_publica" value="{{$host->ip_publica}}"  name="ip_publica" required>
                          </div>
                    </div>

                    <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="departament">Afectado</label>
                            <select class="form-control" name="departament" required>
                              <option value="{{$host->departament_id}}">{{$host->departament->name}} - {{$host->departament->cliente->name}}</option>
                              @foreach ($departaments as $departament)
                                <option value="{{$departament->id}}">{{$departament->name}} - {{$departament->cliente->name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="valor">Valor</label>
                            <input type="number" min="10" class="form-control" id="valor" value="{{$host->valor}}" name="valor" required>
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
