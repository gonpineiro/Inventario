@extends('layouts.app')

@section('content')
  <div class="container">

    <div class="row justify-content-md-center">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">Agregar DVR</div>
            <div class="card-body">
                <form action="/add_dvr" method="post" name="form">
                  {{ csrf_field() }}
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="serial">Nombre</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="modelo">Modelo</label>
                        <select class="form-control" name="modelo"> <a href="/modelos" target=_blank> + </a>
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
                      <label for="ip_publica">Mascara</label>
                      <input type="text" class="form-control" id="mascara" value="255.255.255.0"  name="mascara" pattern="((^|\.)((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))){4}$">
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-3">
                      <label for="mac_adress">Publica</label>
                      <input type="text" class="form-control" id="ip_publica" placeholder=""  name="ip_publica" >
                    </div>
                    <div class="form-group col-md-3">
                      <label for="mac_adress">Gateway</label>
                      <input type="text" class="form-control" id="gateway" placeholder=""  name="gateway" pattern="((^|\.)((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))){4}$">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="ip_local">DNS Primario</label>
                      <input type="text" class="form-control" id="primarydns" placeholder=""  name="primarydns" pattern="((^|\.)((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))){4}$" >
                    </div>
                    <div class="form-group col-md-3">
                      <label for="ip_publica">DNS Secundario</label>
                      <input type="text" class="form-control" id="secondarydns" placeholder=""  name="secondarydns" pattern="((^|\.)((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))){4}$">
                    </div>
                  </div>


                  <div class="form-row">
                        <div class="form-group col-md-3">
                          <label for="tcp">TCP</label>
                          <input type="number" min=0 max=65536  class="form-control" id="tcp" placeholder="" name="tcp">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="udp">UDP</label>
                          <input type="number" min=0 max=65536  class="form-control" id="udp" placeholder=""  name="udp">
                        </div>
                        <div class="form-group col-md-2">
                          <label for="http">HTTP</label>
                          <input type="number" min=0 max=65536  class="form-control" id="http" placeholder=""  name="http">
                        </div>
                        <div class="form-group col-md-2">
                          <label for="https">HTTPs</label>
                          <input type="number" min=0 max=65536  class="form-control" id="https" placeholder=""  name="https">
                        </div>
                        <div class="form-group col-md-2">
                          <label for="rtsp">RTSP</label>
                          <input type="number" min=0 max=65536  class="form-control" id="rtsp" placeholder=""  name="rtsp">
                        </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label for="tcp">TCP (ext)</label>
                        <input type="number" min=0 max=65536  class="form-control" id="tcp" placeholder="" name="tcp_ext">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="udp">UDP (ext)</label>
                        <input type="number" min=0 max=65536  class="form-control" id="udp" placeholder=""  name="udp_ext">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="http">HTTP (ext)</label>
                        <input type="number" min=0 max=65536  class="form-control" id="http" placeholder=""  name="http_ext">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="https">HTTPs (ext)</label>
                        <input type="number" min=0 max=65536  class="form-control" id="https" placeholder=""  name="https_ext">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="rtsp">RTSP (ext)</label>
                        <input type="number" min=0 max=65536  class="form-control" id="rtsp" placeholder=""  name="rtsp_ext">
                      </div>
                    </div>


                    <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="inputEmail4">Afectado</label> <a href="/departaments" target=_blank> + </a>
                            <select class="form-control" name="departament" required>
                              <option value="">- - - Seleccione - - -</option>
                              @foreach ($departaments as $departament)
                                <option value="{{$departament->id}}">D: {{$departament->name}} - C: {{$departament->cliente->name}}</option>
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
