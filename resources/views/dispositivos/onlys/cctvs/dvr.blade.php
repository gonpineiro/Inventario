@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-9">
          <div class="card">
            <div class="card-header">{{$host->name}}</div>
              <div class="card-body">
                <form action="/edit_dvr/{{$host->id}}" method="get" name="form-edit">
                  <div class="form-row">
                  <div class="form-group col-md-4">
                     <label for="name">Nombre</label>
                     <input type="text" class="form-control" id="name" placeholder="{{$host->name}}" disabled>
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
                          <label for="mac_adress">Mac address</label>
                          <input type="text" class="form-control" id="mac_adress" placeholder={{$host->mac_adress}} disabled>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="ip_local">Ip local</label>
                          <input type="text" class="form-control" id="ip_local" placeholder={{$host->ip_local}} disabled>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="ip_publica<">Mascara</label>
                          <input type="text" class="form-control" id="mascara" @if (!is_null($host->mascara)) placeholder={{$host->mascara}} @else placeholder="" @endif  disabled>
                        </div>
                  </div>

                  <div class="form-row">
                        <div class="form-group col-md-3">
                          <label for="mac_adress">Publica</label>
                          <input type="text" class="form-control" id="ip_publica" @if (!is_null($host->ip_publica)) placeholder={{$host->ip_publica}} @else placeholder="" @endif  disabled>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="mac_adress">Gateway</label>
                          <input type="text" class="form-control" id="gateway" @if (!is_null($host->gateway)) placeholder={{$host->gateway}} @else placeholder="" @endif  disabled>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="ip_local">DNS Primario</label>
                          <input type="text" class="form-control" id="primarydns" @if (!is_null($host->primarydns)) placeholder={{$host->primarydns}} @else placeholder="" @endif  disabled>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="ip_publica<">DNS Secundario</label>
                          <input type="text" class="form-control" id="secondarydns" @if (!is_null($host->secondarydns)) placeholder={{$host->secondarydns}} @else placeholder="" @endif  disabled>
                        </div>
                  </div>

                <div class="form-row">
                  <div class="form-group col-md-3">
                    @php
                    if ($host->ip_local != "127.0.0.1" && !is_null($host->ip_local) && !is_null($host->tcp)) {
                      if (!is_null(ping($host->ip_local, $host->tcp))) {
                        echo '<label for="tcp" style="color: green; font-weight: bold;">TCP</label>';
                      }else{
                        echo  '<label for="tcp" style="color: red; font-weight: bold;">TCP</label>';
                      }
                    }else {
                      echo '<label for="tcp">TCP</label>';
                    }
                    @endphp
                    <input type="text" class="form-control" id="tcp" placeholder="{{$host->tcp}}" name="tcp" disabled>
                  </div>
                  <div class="form-group col-md-3">
                    @php
                    if ($host->ip_local != "127.0.0.1" && !is_null($host->ip_local) && !is_null($host->udp)) {
                      if (!is_null(ping($host->ip_local, $host->udp))) {
                        echo '<label for="udp" style="color: green; font-weight: bold;">UDP</label>';
                      }else{
                        echo  '<label for="udp" style="color: red; font-weight: bold;">UDP</label>';
                      }
                    }else {
                      echo '<label for="udp">UDP</label>';
                    }
                    @endphp
                    <input type="text" class="form-control" id="udp" placeholder="{{$host->udp}}"  name="udp" disabled>
                  </div>
                  <div class="form-group col-md-2">
                    @php
                    if ($host->ip_local != "127.0.0.1" && !is_null($host->ip_local) && !is_null($host->http)) {
                      if (!is_null(ping($host->ip_local, $host->http))) {
                        echo '<label for="http" style="color: green; font-weight: bold;">HTTP</label>';
                      }else{
                        echo  '<label for="http" style="color: red; font-weight: bold;">HTTP</label>';
                      }
                    }else {
                      echo '<label for="http">HTTP</label>';
                    }
                    @endphp
                    <input type="text" class="form-control" id="http" placeholder="{{$host->http}}"  name="http" disabled>
                  </div>
                  <div class="form-group col-md-2">
                    @php
                    if ($host->ip_local != "127.0.0.1" && !is_null($host->ip_local) && !is_null($host->https)) {
                      if (!is_null(ping($host->ip_local, $host->https))) {
                        echo '<label for="https" style="color: green; font-weight: bold;">HTTPs</label>';
                      }else{
                        echo  '<label for="https" style="color: red; font-weight: bold;">HTTPs</label>';
                      }
                    }else {
                      echo '<label for="https">HTTPs</label>';
                    }
                    @endphp
                    <input type="text" class="form-control" id="https" placeholder="{{$host->https}}"  name="https" disabled>
                  </div>
                  <div class="form-group col-md-2">
                    @php
                    if ($host->ip_local != "127.0.0.1" && !is_null($host->ip_local) && !is_null($host->rtsp)) {
                      if (!is_null(ping($host->ip_local, $host->rtsp))) {
                        echo '<label for="rtsp" style="color: green; font-weight: bold;">RTSP</label>';
                      }else{
                        echo  '<label for="rtsp" style="color: red; font-weight: bold;">RTSP</label>';
                      }
                    }else {
                      echo '<label for="rtsp">RTSP</label>';
                    }
                    @endphp
                    <input type="text" class="form-control" id="rtsp" placeholder="{{$host->rtsp}}"  name="rtsp" disabled>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-3">
                    @php
                    if ($host->ip_publica != "127.0.0.1" && !is_null($host->ip_publica) && !is_null($host->tcp_ext)) {
                      if (!is_null(ping($host->ip_publica, $host->tcp_ext))) {
                        echo '<label for="tcp" style="color: green; font-weight: bold;">TCP (ext)</label>';
                      }else{
                        echo  '<label for="tcp" style="color: red; font-weight: bold;">TCP (ext)</label>';
                      }
                    }else {
                      echo '<label for="tcp">TCP (ext)</label>';
                    }
                    @endphp
                    <input type="text" class="form-control" id="tcp_ext" placeholder="{{$host->tcp_ext}}" name="tcp_ext" disabled>
                  </div>
                  <div class="form-group col-md-3">
                    @php
                    if ($host->ip_publica != "127.0.0.1" && !is_null($host->ip_publica) && !is_null($host->udp_ext)) {
                      if (!is_null(ping($host->ip_publica, $host->udp_ext))) {
                        echo '<label for="tcp" style="color: green; font-weight: bold;">UDP (ext)</label>';
                      }else{
                        echo  '<label for="tcp" style="color: red; font-weight: bold;">UDP (ext)</label>';
                      }
                    }else {
                      echo '<label for="tcp">UDP (ext)</label>';
                    }
                    @endphp
                    <input type="text" class="form-control" id="udp_ext" placeholder="{{$host->udp_ext}}"  name="udp_ext" disabled>
                  </div>
                  <div class="form-group col-md-2">
                    @php
                    if ($host->ip_publica != "127.0.0.1" && !is_null($host->ip_publica) && !is_null($host->http_ext)) {
                      if (!is_null(ping($host->ip_publica, $host->http_ext))) {
                        echo '<label for="tcp" style="color: green; font-weight: bold;">HTTP (ext)</label>';
                      }else{
                        echo  '<label for="tcp" style="color: red; font-weight: bold;">HTTP (ext)</label>';
                      }
                    }else {
                      echo '<label for="tcp">HTTP (ext)</label>';
                    }
                    @endphp
                    <input type="text" class="form-control" id="http_ext" placeholder="{{$host->http_ext}}"  name="http_ext" disabled>
                  </div>
                  <div class="form-group col-md-2">
                    @php
                    if ($host->ip_publica != "127.0.0.1" && !is_null($host->ip_publica) && !is_null($host->https_ext)) {
                      if (!is_null(ping($host->ip_publica, $host->https_ext))) {
                        echo '<label for="tcp" style="color: green; font-weight: bold;">HTTPs (ext)</label>';
                      }else{
                        echo  '<label for="tcp" style="color: red; font-weight: bold;">HTTPs (ext)</label>';
                      }
                    }else {
                      echo '<label for="tcp">HTTPs (ext)</label>';
                    }
                    @endphp
                    <input type="text" class="form-control" id="https_ext" placeholder="{{$host->https_ext}}"  name="https_ext" disabled>
                  </div>
                  <div class="form-group col-md-2">
                    @php
                    if ($host->ip_publica != "127.0.0.1" && !is_null($host->ip_publica) && !is_null($host->rtsp_ext)) {
                      if (!is_null(ping($host->ip_publica, $host->rtsp_ext))) {
                        echo '<label for="tcp" style="color: green; font-weight: bold;">RTSP (ext)</label>';
                      }else{
                        echo  '<label for="tcp" style="color: red; font-weight: bold;">RTSP (ext)</label>';
                      }
                    }else {
                      echo '<label for="tcp">RTSP (ext)</label>';
                    }
                    @endphp
                    <input type="text" class="form-control" id="rtsp_ext" placeholder="{{$host->rtsp_ext}}"  name="rtsp_ext" disabled>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="departament">Afectado</label>
                    <input type="text" class="form-control" id="inputPassword4" placeholder="D: {{$host->departament->name}} - C: {{$host->departament->cliente->name}}" disabled>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="valor">Valor</label>
                    <input type="text" class="form-control" id="inputPassword4" placeholder={{$host->valor}} disabled>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="serial">Estado</label>
                    <input type="text" class="form-control" id="estado" placeholder={{$host->estado->name}} disabled>
                  </div>
                </div>
                <div class="form-row">
                      <div class="form-group col-md">
                        <label for="comentario">Observaciónes</label>
                        <textarea rows="10" cols="50" type="text" class="form-control" id="comentario" disabled >{{$host->comentario}} </textarea>
                      </div>
                </div>
                  @can ('dvrs.edit')  <button type="" class="btn btn-dark">Modificar</button> @endcan
                </form>
              </div>
            </div>
          <br/>

          @can ('credcctvs.show')
          <div class="card">
            <div class="card-header">Credenciales @can ('credcctvs.create') <a href="/form_cred_cctv/{{$host->id}}">+</a> @endcan</div>
              <div class="card-body">
                <div class="col cl-6">
                    <table class="table table-hover" id="host-table">
                      <thead>
                        <tr>
                          <th scope="col">Usuario</th>
                          <th scope="col">Password</th>
                          <th scope="col">Tipo</th>
                          <th scope="col">Obs</th>
                          @can ('credcctvs.edit') <th scope="col">Editar</th> @endcan
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($creds as $cred)
                            <tr>
                              <td>{{$cred->username}}</td>
                              <td>{{$cred->password}}</td>
                              <td>{{$cred->type}}</td>
                              <td>{{$cred->comentario}}</td>
                              @can ('credcctvs.edit') <td><a href="/edit_cred_cctv/{{$cred->id}}" target="_blank"><img src={{asset("logos/edit-logo.png")}} style="width: 17px;"></a></td> @endcan
                            </tr>
                      @endforeach
                      </tbody>
                    </table>
                </div>
              </div>
              <script >
                      $(document).ready(function() {
                      $('#host-table').DataTable({
                        "order": [[ 0, "desc" ]]
                      });
                        } );
              </script>
            </div>
            <br>
            @endcan

          @can ('hostworks.create')
          <div class="card">
            <div class="card-header">Agregar registro de trabajo</div>
              <div class="card-body">
                <form action="/add_work/{{$host->id}}" method="post" name="form-edit">
                  {{ csrf_field() }}
                  <div class="form-row">
                    <div class="form-group col-md-3">
                      <label for="modelo">Fecha</label>
                      <input type="date" class="form-control" id="fecha" name="fecha" required>
                    </div>
                    <div class="form-group col-md-9">
                      <label for="serial">Trabajo </label>
                      <input type="text" class="form-control" id="trabajo" name="trabajo" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md">
                      <label for="comentario">Observación</label>
                      <textarea rows="5" cols="50" type="text" class="form-control" id="comentario" name="comentario" required></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-dark">Agregar</button>
                </form>
              </div>
            </div>
            <br/>
            @endcan

            @can ('hostworks.show')
            <div class="card">
              <div class="card-header">Registros de trabajo</div>
                <div class="card-body">
                  <div class="col cl-6">
                      <table class="table table-hover" id="host-work">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Trabajo</th>
                            <th scope="col">Obs</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($hostworks as $hostwork)
                              <tr>
                                <td>{{$hostwork->id}}</td>
                                <td>{{$hostwork->fecha->format('d/m/Y')}}</td>
                                <td>{{$hostwork->trabajo}}</td>
                                <td>{{$hostwork->comentario}}</td>
                              </tr>
                        @endforeach
                        </tbody>
                      </table>
                  </div>
                  <script >
                          $(document).ready(function() {
                          $('#host-work').DataTable({
                            "order": [[ 0, "desc" ]]
                          });
                            } );
                  </script>
                </div>
              </div>
              <br/>
              @endcan

              <div class="card">
                <div class="card-header text-center">QR</div>
                  <div class="card-body">
                    <div class="col md-6 text-center">
                    {!!  QrCode :: size (250) -> generate(env('APP_QR') . $_SERVER["REQUEST_URI"]);    !!}
                    </div>
                    <div class="col md-6 text-center">
                    {{$host->id}}  -  {{$host->name}}
                    </div>
                  </div>
                </div>
      </div>


@endsection

@php
    function ping($host, $port)
    {
      try {
        $tB = microtime(true);
        $fP = fSockOpen($host, $port, $errno, $errstr, 0.1);
        if (!$fP) { return "down"; }
        $tA = microtime(true);
        return round((($tA - $tB) * 1000), 0);
      } catch (\Exception $e) {}
    }


@endphp
