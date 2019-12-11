@extends('layouts.reportDvr')

@section('content')
    <div class="container">
      <div class="row mt-2">
        <div class="col cl-6">
          <h1>Información básica</h1>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Marca</th>
                  <th scope="col">Modelo</th>
                  <th scope="col">Numero de Serie</th>
                </tr>
              </thead>
              <tbody>
                    <tr>
                      <td>{{$dvr->modelo->marca->name}}</td>
                      <td>{{$dvr->modelo->name}}</td>
                      <td>{{$dvr->serial}}</td>
                    </tr>
              </tbody>
            </table>
            <h1>Información de RED</h1>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Direccion Local</th>
                  <th scope="col">Direccion Fisica</th>
                  <th scope="col">Mascara</th>
                  <th scope="col">Gateway</th>
                  <th scope="col">Direccion Publica</th>
                  <th scope="col">DNS Primario</th>
                  <th scope="col">DNS Secundario</th>
                </tr>
              </thead>
              <tbody>
                    <tr>
                      <td>{{$dvr->ip_local}}</td>
                      <td>{{$dvr->mac_adress}}</td>
                      <td>{{$dvr->mascara}} Bits</td>
                      <td>{{$dvr->gateway}}</td>
                      <td>{{$dvr->ip_publica}}</td>
                      <td>{{$dvr->primarydns}}</td>
                      <td>{{$dvr->secondarydns}}</td>
                    </tr>
              </tbody>
            </table>
            <h1 class="int">Puertos locales/publicos</h1>
            <table class="table table-hover" >
              <thead>
                <tr>
                  <th scope="col">TCP (l)</th>
                  <th scope="col">UDP (l)</th>
                  <th scope="col">HTTP (l)</th>
                  <th scope="col">HTTPS (l)</th>
                  <th scope="col">RTSP (l)</th>
                  <th scope="col"> | </th>
                  <th scope="col">TCP (p)</th>
                  <th scope="col">UDP (p)</th>
                  <th scope="col">HTTP (p)</th>
                  <th scope="col">HTTPS (p)</th>
                  <th scope="col">RTSP (p)</th>
                </tr>
              </thead>
              <tbody>
                    <tr>
                      <td>{{$dvr->tcp}}</td>
                      <td>{{$dvr->udp}}</td>
                      <td>{{$dvr->http}}</td>
                      <td>{{$dvr->https}}</td>
                      <td>{{$dvr->rtsp}}</td>
                      <td> | </td>
                      <td>{{$dvr->tcp_ext}}</td>
                      <td>{{$dvr->udp_ext}}</td>
                      <td>{{$dvr->http_ext}}</td>
                      <td>{{$dvr->https_ext}}</td>
                      <td>{{$dvr->rtsp_ext}}</td>
                    </tr>
              </tbody>
            </table>
            @if ($cantCred != 0)
            <h1>Credenciales</h1>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Usuario</th>
                  <th scope="col">Password</th>
                  <th scope="col">Tipo</th>
                  <th scope="col">Observacion</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($creds as $cred)
                    <tr>
                      <td>{{$cred->id}}</td>
                      <td>{{$cred->username}}</td>
                      <td>{{$cred->password}}</td>
                      <td>{{$cred->type}}</td>
                      <td>{{$cred->comentario}}</td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
            @endif
            @if ($cantCam != 0)
              <h1>Dispositivos:<a>{{$cantCam}}</a> Instalados</h1>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Serie</th>
                    <th scope="col">Zona</th>
                    <th scope="col">Observacion</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($camaras as $camara)
                      <tr>
                        <td>{{$camara->id}}</td>
                        <td>{{$camara->modelo->marca->name}}</td>
                        <td>{{$camara->modelo->name}}</td>
                        <td>{{$camara->serial}}</td>
                        <td>ZONA</td>
                        <td>{{$camara->comentario}}</td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
            @endif
        </div>
      </div>
    </div>
<br>
@endsection
