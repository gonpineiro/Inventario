@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h3>Routers @can ('routers.create') <a href="/form_router"> +</a> @endcan </h3>
          @switch($_SERVER["REQUEST_URI"])
            @case("/routers")
                Habilitadas / <a href="/routers_disable">Deshabilitadas</a> / <a href="/routers_stock">Stock</a>
                @break
            @case("/routers_disable")
                <a href="/routers">Habilitadas</a> / Deshabilitadas / <a href="/routers_stock">Stock</a>
                @break
            @case("/routers_stock")
                <a href="/routers">Habilitadas</a> / <a href="/routers_disable">Deshabilitadas</a> / Stock
                @break
          @endswitch
          <br>

          <br>
          <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">IP Address</th>
                <th scope="col">Afectado</th>
                <th scope="col">Modelo</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($hosts as $host)
                  <tr>
                    <td>{{$host->id}}</td>
                    @can ('routers.only') <td><a href="/only_router/{{$host->id}}">{{$host->name}}</a></td> @else <td>{{$host->name}}</td> @endcan
                    <td>{{$host->ip_local}}</td>
                    <td>D: {{$host->departament->name}} - C: {{$host->departament->cliente->name}}</td>
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
