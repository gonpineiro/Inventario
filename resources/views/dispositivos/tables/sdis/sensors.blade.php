@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
          <h3>Sensores @can ('sensors.create') <a href="/form_sensor"> +</a> @endcan </h3>
            <br>
            <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Conectado en</th>
                <th scope="col">Abonado</th>
                <th scope="col">Cliente</th>
                <th scope="col">Zona</th>
                <th scope="col">Modelo</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($hosts as $host)
                  <tr>
                    @if ($host->host->host_type->id == 40)
                      <td>{{$host->id}}</td>
                      @can ('sensors.only') <td><a href="/only_sensor/{{$host->id}}">{{$host->name}}</a></td> @else {{$host->name}} @endcan
                      @can ('panelalarms.only') <td><a href="/only_panel_alarm/{{$host->host->id}}">{{$host->host->name}}</a> | (P)</td> @endcan
                      <td>{{$host->host->abonado->numero}}</td>
                      <td>{{$host->host->abonado->cliente->name}}</td>
                      <td>{{$host->zona}}</td>
                      <td>{{$host->host->modelo->name}}</td>
                    @endif
                    @if ($host->host->host_type->id == 41)
                      <td>{{$host->id}}</td>
                      @can ('sensors.only') <td><a href="/only_sensor/{{$host->id}}">{{$host->name}}</a></td> @else {{$host->name}} @endcan
                      @can ('expansoras.only') <td><a href="/only_expansora/{{$host->host->id}}">{{$host->host->name}}</a> | (E)</td> @endcan
                      <td>{{$host->host->host["abonado"]["numero"]}}</td>
                      <td>{{$host->host->host["abonado"]["cliente"]["name"]}}</td>
                      <td>{{$host->zona}}</td>
                      <td>{{$host->modelo->name}}</td>
                    @endif
                    @if ($host->host->host_type->id == 44)
                      <td>{{$host->id}}</td>
                      @can ('sensors.only') <td><a href="/only_sensor/{{$host->id}}">{{$host->name}}</a></td> @else {{$host->name}} @endcan
                      @can ('tecladosdis.only') <td><a href="/only_teclado_sdi/{{$host->host->id}}">{{$host->host->name}}</a> | (T)</td> @else @endcan
                      <td>{{$host->host->host["abonado"]["numero"]}}</td>
                      <td>{{$host->host->host["abonado"]["cliente"]["name"]}}</td>
                      <td>{{$host->zona}}</td>
                      <td>{{$host->modelo->name}}</td>
                    @endif
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
