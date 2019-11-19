@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h3>Televisores @can ('televisors.create') <a href="/form_televisor"> +</a> @endcan </h3>
          <br>
          <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Afectado</th>
                <th scope="col">Modelo</th>
                <th scope="col">Usuario</th>
                <th scope="col">Departamento</th>
                <th scope="col">Cliente</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($hosts as $host)

                  <tr>
                    <td>{{$host->id}}</td>
                    @can ('televisors.only') <td><a href="/only_televisor/{{$host->id}}">{{$host->name}}</a></td> @else <td>{{$host->name}}</td> @endcan
                    <td>{{$host->host->name}} </td>
                    <td>{{$host->modelo->name}}</td>
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
