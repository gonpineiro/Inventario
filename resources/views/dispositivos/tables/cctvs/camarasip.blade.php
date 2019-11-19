@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h3>Cámaras IP @can ('camaraips.create') <a href="/form_camaraip"> +</a> @endcan</h3>
          <br>
          <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">IP Adress</th>
                <th scope="col">Afectado</th>
                <th scope="col">Grabando</th>
                <th scope="col">Modelo</th>
                <th scope="col">Puerto TCP</th>
                <th scope="col">Estado</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($hosts as $host)
                  <tr>
                    <td>{{$host->id}}</td>
                    @can ('camaraips.only') <td><a href="/only_camaraip/{{$host->id}}">{{$host->name}}</a></td> @else <td>{{$host->name}}</td> @endcan
                    <td>{{$host->ip_local}}</td>
                    <td>{{$host->departament->name}} - {{$host->departament->cliente->name}}</td>
                    <td> @if (!is_null($host->host)) @can ('dvrs.only')  <a href="/only_dvr/{{$host->host->id}}">{{$host->host->name}}</a> @else {{$host->host->name}} @endcan </td> @endif
                    <td>{{$host->modelo->name}}</td>
                    <td>{{$host->tcp_ext}}</td>
                    <td>
                      @php
                        if ($host->ip_publica != "127.0.0.1") {
                          if (!is_null(ping($host->ip_publica, $host->tcp_ext))) {
                            echo '<img src="logos/ok-logo.png" style="width: 17px;">';
                          }else{
                            echo  '<img src="logos/error-logo.png" style="width: 17px;">';
                          }
                        }else {
                          echo '<img src="logos/eliminar-logo.png" style="width: 17px;">';
                        }
                      @endphp

                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
      </div>
      <script >
              $(document).ready(function() {
              $('#host-table').DataTable({
                "order": [[ 0, "desc" ]]
              });
                } );
      </script>
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
