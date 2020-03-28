@extends('layouts.app')

@section('content')
  <div class="container">

    <div class="row justify-content-md-center">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">Modificando {{$host->name}}</div>
            <div class="card-body">
                <form action="/update_camaraip/{{$host->id}}" method="post" name="form">
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
                  <div class="form-group col-md-4">
                    <label for="mac_adress">Mac address</label>
                    <input type="text" class="form-control" id="mac_adress" value="{{$host->mac_adress}}" name="mac_adress">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="ip_local">Ip local</label>
                    <input type="text" class="form-control" id="ip_local" value="{{$host->ip_local}}"  name="ip_local">
                  </div>

                  <div class="form-group col-md-4">
                    <label for="ip_publica">Mascara</label>
                    <input type="text" class="form-control" id="mascara" value="{{$host->mascara}}"  name="mascara">
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="mac_adress">Publica</label>
                    <input type="text" class="form-control" id="ip_publica" value="{{$host->ip_publica}}" name="ip_publica">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="ip_local">Gateway</label>
                    <input type="text" class="form-control" id="gateway" value="{{$host->gateway}}"  name="gateway">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="ip_publica">DNS Primario</label>
                    <input type="text" class="form-control" id="primarydns" value="{{$host->primarydns}}"  name="primarydns">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="ip_publica">DNS Secundario</label>
                    <input type="text" class="form-control" id="secondarydns" value="{{$host->secondarydns}}"  name="secondarydns">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="tcp">TCP</label>
                    <input type="number" class="form-control" id="tcp" value="{{$host->tcp}}" name="tcp" min="1" max="65535">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="udp">UDP</label>
                    <input type="number" class="form-control" id="udp" value="{{$host->udp}}"  name="udp" min="1" max="65535">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="http">HTTP</label>
                    <input type="number" class="form-control" id="http" value="{{$host->http}}"  name="http" min="1" max="65535">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="https">HTTPs</label>
                    <input type="number" class="form-control" id="https" value="{{$host->https}}"  name="https" min="1" max="65535">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="rtsp">RTSP</label>
                    <input type="text" class="form-control" id="rtsp" value="{{$host->rtsp}}"  name="rtsp" min="1" max="65535">
                  </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-3">
                      <label for="tcp">TCP (ext)</label>
                      <input type="number" class="form-control" id="tcp_ext" value="{{$host->tcp_ext}}" name="tcp_ext" min="1" max="65535">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="udp">UDP (ext)</label>
                      <input type="number" class="form-control" id="udp_ext" value="{{$host->udp_ext}}"  name="udp_ext" min="1" max="65535">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="http">HTTP (ext)</label>
                      <input type="number" class="form-control" id="http_ext" value="{{$host->http_ext}}"  name="http_ext" min="1" max="65535">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="https">HTTPs (ext)</label>
                      <input type="number" class="form-control" id="https_ext" value="{{$host->https_ext}}"  name="https_ext" min="1" max="65535">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="rtsp">RTSP (ext)</label>
                      <input type="text" class="form-control" id="rtsp_ext" value="{{$host->rtsp_ext}}"  name="rtsp_ext" min="1" max="65535">
                    </div>
                  </div>
                  
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="estado">Grabando en...</label>
                      <select class="form-control" name="cctv" required>
                        @if (is_null($host->cctv_id))
                          <option > - </option>
                          @foreach ($cctvss as $cctvs)
                            <option value="{{$cctvs->id}}">{{$cctvs->name}} - D: {{$cctvs->departament->name}} - C: {{$cctv->departament->cliente->name}}</option>
                          @endforeach
                        @else
                          <option value="{{$cctv->id}}">{{$cctv->name}} - D: {{$cctv->departament->name}}</option>
                          @foreach ($cctvss as $cctvs)
                            <option value="{{$cctvs->id}}">{{$cctvs->name}} - D: {{$cctvs->departament->name}}</option>
                          @endforeach
                        @endif
                      </select>
                    </div>
                      <div class="form-group col-md-6">
                        <label for="valor">Ubicacion/Zona</label>
                        <input type="text" class="form-control" id="zona" value="{{$host->zona}}" name="zona" required>
                      </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="inputEmail4">Afectado</label>
                      <select class="form-control" name="departament" required>
                        <option value="{{$host->departament_id}}">D: {{$host->departament->name}} - C: {{$host->departament->cliente->name}}</option>
                        @foreach ($departaments as $departament)
                          <option value="{{$departament->id}}">D: {{$departament->name}} - C: {{$departament->cliente->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="valor">Valor</label>
                      <input type="number" min="10" class="form-control" id="valor" value="{{$host->valor}}" name="valor" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="valor">Estado</label>
                      <select class="form-control" name="estado" required>
                        <option value="{{$host->estado->id}}">{{$host->estado->name}}</option>
                        @foreach ($estados as $estado)
                          <option value="{{$estado->id}}">{{$estado->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md">
                      <label for="comentario">Observaciónes</label>
                      <textarea rows="10" cols="50" type="text" class="form-control" id="comentario" name="comentario" >{{$host->comentario}} </textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-dark" >Agregar</button>
               </form>
             </div>
           </div>
      </div>
  </div>
@endsection
