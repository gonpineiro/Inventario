@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h3>DVRs @can ('dvrs.create') <a href="/form_dvr"> +</a> @endcan</h3>
          <br>
          <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Afectado</th>
                <th scope="col">Modelo</th>
                @can ('dvrs.only')  <th scope="col">Reporte</th> @endcan
               <th scope="col">Estado</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($hosts as $host)
                  <tr>
                    <td>{{$host->id}}</td>
                    @can ('dvrs.only') <td><a href="/only_dvr/{{$host->id}}">{{$host->name}}</a></td> @else <td>{{$host->name}}</td>  @endcan
                    <td>D: {{$host->departament->name}} - C: {{$host->departament->cliente->name}}</td>
                    <td>{{$host->modelo->name}}</td>
                    @can ('dvrs.only')  <td><a href="/report_dvr/{{$host->id}}" target="_blank"><img src={{asset("logos/pdf-logo.png")}} style="width: 17px;"></a></td>  @endcan
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
