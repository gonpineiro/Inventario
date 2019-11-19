@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h1>Hosts</h1>
          <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Tipo</th>
                <th scope="col">IP</th>
                <th scope="col">Afectado</th>
                <th scope="col">Modelo</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($hosts as $host)
                  <tr>
                    <td>{{$host->id}}</td>
                    <td>
                      @if ($host->host_type->id == 1) <a href="/only_computadora/{{$host->id}}">{{$host->name}}</a> @endif
                      @if ($host->host_type->id == 2) <a href="/only_notebook/{{$host->id}}">{{$host->name}}</a> @endif
                      @if ($host->host_type->id == 3) <a href="/only_impresora/{{$host->id}}">{{$host->name}}</a> @endif
                      @if ($host->host_type->id == 4) <a href="/only_telefonoip/{{$host->id}}">{{$host->name}}</a> @endif

                    </td>
                    <td>{{$host->host_type->name}}</td>
                    <td>{{$host->ip_local}}</td>
                    @if (!is_null($host->user_host_id)) <td>{{$host->user_host->name}} {{$host->user_host->apellido}}</td> @else <td></td> @endif
                    <td>{{$host->modelo->name}}</td>
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
