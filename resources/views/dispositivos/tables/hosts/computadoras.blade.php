@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
          <h3>Computadoras @can ('computadoras.create') <a href="/form_computadora"> +</a> @endcan </h3>
            <br>
          <table class="table table-hover" id="host-table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Usuario</th>
              <th scope="col">Afectado</th>
              <th scope="col">Modelo</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($hosts as $host)
                <tr>
                  <td>{{$host->id}}</td>
                  @can ('computadoras.only') <td><a href="/only_computadora/{{$host->id}}">{{$host->name}}</a></td> @else <td>{{$host->name}}</td> @endcan
                  @if (!is_null($host->user_host_id)) <td>{{$host->user_host->name}} {{$host->user_host->apellido}}</td> @else <td></td> @endif
                  @if (!is_null($host->user_host_id)) <td>{{$host->user_host->departament->name}} {{$host->user_host->departament->cliente->name}}</td> @else <td></td> @endif
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
