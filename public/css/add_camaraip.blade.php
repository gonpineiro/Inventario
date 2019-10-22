@extends('layouts.app')

@section('content')
  <div class="container">

    <div class="row justify-content-md-center">
      <div class="col-md-8 ">
        <form action="/add_camaraip" method="post" name="form">
          {{ csrf_field() }}
          <h1>Agregar Camara IP</h1>
          </br>
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
              <label for="estado">Estado</label>
              <select class="form-control" name="estado" required>
                @foreach ($estados as $estado)
                  <option value="{{$estado->id}}">{{$estado->name}}</option>
                @endforeach
              </select>
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
                  <label for="ip_publica">Ip publica</label>
                  <input type="text" class="form-control" id="ip_publica" placeholder=""  name="ip_publica" pattern="((^|\.)((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))){4}$">
                </div>
          </div>

          <div class="form-row">
              <div class="form-group col-md-2">
                <label for="user_1">Usuario 1</label>
                <input type="text" class="form-control" id="user_1" placeholder="" name="user_1" >
              </div>
              <div class="form-group col-md-2">
                <label for="pass_1">Password 1</label>
                <input type="text" class="form-control" id="pass_1" placeholder="" name="pass_1" >
              </div>
              <div class="form-group col-md-2">
                <label for="user_2">Usuario 2</label>
                <input type="text" class="form-control" id="user_2" placeholder="" name="user_2" >
              </div>
              <div class="form-group col-md-2">
                <label for="pass_2">Password 2</label>
                <input type="text" class="form-control" id="pass_2" placeholder="" name="pass_2" >
              </div>
              <div class="form-group col-md-2">
                <label for="user_3">Usuario 3</label>
                <input type="text" class="form-control" id="user_3" placeholder="" name="user_3" >
              </div>
              <div class="form-group col-md-2">
                <label for="pass_3">Password 3</label>
                <input type="text" class="form-control" id="pass_3" placeholder="" name="pass_3" >
              </div>
          </div>

          <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="tcp">TCP</label>
                  <input type="number" class="form-control" id="tcp" placeholder="" name="tcp" min="1" max="65535">
                </div>
                <div class="form-group col-md-3">
                  <label for="udp">UDP</label>
                  <input type="number" class="form-control" id="udp" placeholder=""  name="udp" min="1" max="65535">
                </div>
                <div class="form-group col-md-3">
                  <label for="http">HTTP</label>
                  <input type="number" class="form-control" id="http" placeholder=""  name="http" min="1" max="65535">
                </div>
                <div class="form-group col-md-3">
                  <label for="https">HTTPs</label>
                  <input type="number" class="form-control" id="https" placeholder=""  name="https" min="1" max="65535">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="rtsp">RTSP</label>
                  <input type="number" class="form-control" id="rtsp" placeholder=""  name="rtsp">
                </div>
                <div class="form-group col-md-5">
                  <label for="acceso">Acceso</label>
                  <input type="text" class="form-control" id="acceso" placeholder=""  name="acceso">
                </div>
                <div class="form-group col-md-4">
                  <label for="ip_publica">Grabando en...</label>
                  <select class="form-control" name="cctv" required>
                    @foreach ($cctvs as $cctv)
                      <option value="{{$cctv->id}}">{{$cctv->name}} - {{$cctv->departament->name}}</option>
                    @endforeach
                  </select>
                </div>
            </div>


            <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="departament">Afectado</label><select class="form-control" name="departament" required>
                      @foreach ($departaments as $departament)
                        <option value="{{$departament->id}}">{{$departament->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="valor">Valor</label>
                    <input type="number" min="10" class="form-control" id="valor" placeholder="" name="valor" required>
                  </div>
            </div>








          <button type="submit" class="btn btn-dark" >Agregar Camara</button>
        </form>
      </div>

  </div>




@endsection
