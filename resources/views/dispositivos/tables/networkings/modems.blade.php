@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h3>Modems @can ('modems.create') <a href="/form_modem"> +</a> @endcan</h3>
          @switch($_SERVER["REQUEST_URI"])
            @case("/modems")
                Habilitadas / <a href="/modems_disable">Deshabilitadas</a> / <a href="/modems_stock">Stock</a>
                @break
            @case("/modems_disable")
                <a href="/modems">Habilitadas</a> / Deshabilitadas / <a href="/modems_stock">Stock</a>
                @break
            @case("/modems_stock")
                <a href="/modems">Habilitadas</a> / <a href="/modems_disable">Deshabilitadas</a> / Stock
                @break
          @endswitch
          <br>

          <br>
          <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">IP publica</th>
                <th scope="col">Afectado</th>
                <th scope="col">Modelo</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($hosts as $host)
                  <tr>
                    <td>{{$host->id}}</td>
                    @can ('modems.only') <td><a href="/only_modem/{{$host->id}}">{{$host->name}}</a></td> @else <td>{{$host->name}}</td>  @endcan
                    <td>{{$host->ip_publica}}</td>
                    <td>D: {{($host->departament->name)}} - C: {{$host->departament->cliente->name}}</td>
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
