@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h3>Switchs @can ('switchs.create') <a href="/form_switch"> +</a> @endcan </h3>
          @switch($_SERVER["REQUEST_URI"])
            @case("/switchs")
                Habilitadas / <a href="/switchs_disable">Deshabilitadas</a> / <a href="/switchs_stock">Stock</a>
                @break
            @case("/switchs_disable")
                <a href="/switchs">Habilitadas</a> / Deshabilitadas / <a href="/switchs_stock">Stock</a>
                @break
            @case("/switchs_stock")
                <a href="/switchs">Habilitadas</a> / <a href="/switchs_disable">Deshabilitadas</a> / Stock
                @break
          @endswitch
          <br>

          <br>
          <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">IP Adress</th>
                <th scope="col">Afectado</th>
                <th scope="col">Modelo</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($hosts as $host)
                  <tr>
                    <td>{{$host->id}}</td>
                    @can ('switchs.only') <td><a href="/only_switch/{{$host->id}}">{{$host->name}}</a></td>  @else <td>{{$host->name}}</td> @endcan
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
