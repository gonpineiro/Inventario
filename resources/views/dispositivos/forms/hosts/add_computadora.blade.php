@extends('layouts.app')

@section('content')
  <div class="container">

    <div class="row justify-content-md-center">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">Agregar Computadora</div>
            <div class="card-body">
                <form action="/add_computadora" method="post" name="form">
                  {{ csrf_field() }}
                  <div class="form-row">

                    <div class="form-group col-md-3">
                      <label for="serial">Nombre</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="" required>
                    </div>

                    <div class="form-group col-md-3">
                      <label for="modelo">Modelo</label>
                        <select class="form-control" name="modelo">
                          @foreach ($modelos as $modelo)
                            <option value="{{$modelo->id}}">{{$modelo->name}}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                      <label for="serial">Serial</label>
                      <input type="text" class="form-control" id="serial" placeholder="" name="serial" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                    </div>

                    <div class="form-group col-md-3">
                      <label for="mac_adress">Clase</label>
                      <select class="form-control" name="class" required>
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                      </select>
                    </div>
                  </div>



                  <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="mac_adress">Usuario</label>
                            <select class="form-control" name="user_host_id" disabled>
                              <option value="">- - - Seleccione - - -</option>
                            @foreach ($userhosts as $userhost)
                              <option value="{{$userhost->id}}">{{$userhost->name}} {{$userhost->apellido}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="mac_adress">Mac address</label>
                          <input type="text" class="form-control" id="mac_adress" placeholder="" name="mac_adress" pattern="^([0-9A-F]{2}[:-]){5}([0-9A-F]{2})$" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="ip_local">Ip local</label>
                          <input type="text" class="form-control" id="ip_local" placeholder=""  name="ip_local" pattern="((^|\.)((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))){4}$" required>
                        </div>
                  </div>

                  <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputEmail4">Afectado</label>
                            <select class="form-control" name="departament" disabled>
                              <option value="">- - - Seleccione - - -</option>
                              @foreach ($departaments as $departament)
                                <option value="{{$departament->id}}">{{$departament->name}} - {{$departament->cliente->name}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="valor">Valor</label>
                          <input type="number" min="10" class="form-control" id="valor" placeholder="" name="valor" required>
                        </div>
                  </div>
                  <div class="form-row">
                        <div class="form-group col-md">
                          <label for="comentario">Observaciónes</label>
                          <textarea rows="10" cols="50" type="text" min="10" class="form-control" id="comentario" placeholder="" name="comentario" > </textarea>
                        </div>
                  </div>
                  <button type="submit" class="btn btn-dark">Agregar</button>
                </form>
              </div>
        </div>
      </div>
  </div>

@endsection
