@extends('layouts.app')

@section('content')
  <div class="container">

    <div class="row justify-content-md-center">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">Agregar Switch</div>
            <div class="card-body">
                <form action="/add_switch" method="post" name="form">
                  {{ csrf_field() }}
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="serial">Nombre</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="modelo">Modelo</label> <a href="/modelos" target=_blank> + </a>
                        <select class="form-control" name="modelo">
                          <option value="">- - - Seleccione - - -</option>
                          @foreach ($modelos as $modelo)
                            <option value="{{$modelo->id}}">{{$modelo->name}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="serial">Serial</label>
                      <input type="text" class="form-control" id="serial" placeholder="" name="serial" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                    </div>
                  </div>
                  <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="mac_adress">Mac address</label>
                          <input type="text" class="form-control" id="mac_adress" placeholder="" name="mac_adress" pattern="^([0-9A-F]{2}[:-]){5}([0-9A-F]{2})$" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="ip_local">Ip local</label>
                          <input type="text" class="form-control" id="ip_local" placeholder=""  name="ip_local" pattern="((^|\.)((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))){4}$" required>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="acceso">Acceso</label>
                          <input type="text" class="form-control" id="ip_local" placeholder=""  name="acceso">
                        </div>
                  </div>

                  <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="user_1">Usuario</label>
                        <input type="text" class="form-control" id="user_1" placeholder="" name="user_1" >
                      </div>
                      <div class="form-group col-md-6">
                        <label for="pass_1">Password</label>
                        <input type="text" class="form-control" id="pass_1" placeholder="" name="pass_1" >
                      </div>
                  </div>

                  <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputEmail4">Afectado</label><select class="form-control" name="departament" required>
                            @foreach ($departaments as $departament)
                              <option value="{{$departament->id}}">D: {{$departament->name}} - D: {{$departament->cliente->name}}</option>
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
                  <button type="submit" class="btn btn-dark" >Agregar</button>
                </form>
              </div>
          </div>
      </div>

  </div>




@endsection
