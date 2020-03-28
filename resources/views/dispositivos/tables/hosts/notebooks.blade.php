@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h3>Notebooks @can ('notebooks.create') <a href="/form_notebook"> +</a> @endcan </h3>
          @switch($_SERVER["REQUEST_URI"])
            @case("/notebooks")
                Habilitadas / <a href="/notebooks_disable">Deshabilitadas</a> / <a href="/notebooks_stock">Stock</a>
                @break
            @case("/notebooks_disable")
                <a href="/notebooks">Habilitadas</a> / Deshabilitadas / <a href="/notebooks_stock">Stock</a>
                @break
            @case("/notebooks_stock")
                <a href="/notebooks">Habilitadas</a> / <a href="/notebooks_disable">Deshabilitadas</a> / Stock
                @break
          @endswitch
          <br>

          <br>
          <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Usuario</th>
                <th scope="col">Afectado</th>
                <th scope="col">Modelo</th>
                <th scope="col">Serial</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($hosts as $host)
                  <tr>
                    <td>{{$host->id}}</td>
                    @can ('notebooks.only') <td><a href="/only_notebook/{{$host->id}}">{{$host->name}}</a></td> @else <td>{{$host->name}}</td> @endcan
                    @if (!is_null($host->user_host_id)) <td>{{$host->user_host->name}} {{$host->user_host->apellido}}</td> @else <td></td> @endif
                    @if (!is_null($host->user_host_id)) <td>{{$host->user_host->departament->name}} {{$host->user_host->departament->cliente->name}}</td> @else <td></td> @endif
                    <td>{{$host->modelo->name}}</td>
                    <td>{{$host->serial}}</td>
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
