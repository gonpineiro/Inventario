@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h1>Perifericos</h1>
          <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Modelo</th>
                <th scope="col">Tipo</th>
                <th scope="col">Instalado</th>
                <th scope="col">Usuario</th>
                <th scope="col">Departamento</th>
                <th scope="col">Cliente</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($hosts as $host)
                  <tr>
                    <td>{{$host->id}}</td>
                    <td>
                      @if ($host->host_type->id == 30) <a href="/only_monitor/{{$host->id}}">{{$host->name}}</a> @endif
                      @if ($host->host_type->id == 31) <a href="/only_televisor/{{$host->id}}">{{$host->name}}</a> @endif
                      @if ($host->host_type->id == 32) <a href="/only_teclado/{{$host->id}}">{{$host->name}}</a> @endif
                      @if ($host->host_type->id == 33) <a href="/only_mouse/{{$host->id}}">{{$host->name}}</a> @endif
                      @if ($host->host_type->id == 34) <a href="/only_web_cam/{{$host->id}}">{{$host->name}}</a> @endif
                    </td>
                    <td>{{$host->modelo->name}}</td>
                    <td>{{$host->host_type->name}}</td>
                    <td>
                      @if ($host->host->host_type->id == 1) <a href="/only_computadora/{{$host->host->id}}">{{$host->host->name}}</a> @endif
                      @if ($host->host->host_type->id == 2) <a href="/only_notebook/{{$host->host->id}}">{{$host->host->name}}</a> @endif
                    </td>
                    <td> @if (!is_null($host->host->user_host)){{$host->host->user_host->name}} {{$host->host->user_host->apellido}} @endif</td>
                    <td> @if (!is_null($host->host->user_host)){{$host->host->user_host->departament->name}} @endif</td>
                    <td> @if (!is_null($host->host->user_host)){{$host->host->user_host->departament->cliente->name}} @endif</td>
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
