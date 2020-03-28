@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h3>AccesPoint @can ('accespoints.create') <a href="/form_accespoint"> +</a> @endcan </h3>
          @switch($_SERVER["REQUEST_URI"])
            @case("/accespoints")
                Habilitadas / <a href="/accespoints_disable">Deshabilitadas</a> / <a href="/accespoints_stock">Stock</a>
                @break
            @case("/accespoints_disable")
                <a href="/accespoints">Habilitadas</a> / Deshabilitadas / <a href="/accespoints_stock">Stock</a>
                @break
            @case("/accespoints_stock")
                <a href="/accespoints">Habilitadas</a> / <a href="/accespoints_disable">Deshabilitadas</a> / Stock
                @break
          @endswitch
          <br>

          <br>
          <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Ip address</th>
                <th scope="col">Mac adress</th>
                <th scope="col">Afectado a</th>
                <th scope="col">Modelo</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($hosts as $host)
                  <tr>
                    <td>{{$host->id}}</td>
                    @can ('accespoints.only') <td><a href="/only_accespoint/{{$host->id}}">{{$host->name}}</a></td> @else <td>{{$host->name}}</td>  @endcan
                    <td>{{$host->ip_local}}</td>
                    <td>{{$host->mac_adress}}</td>
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
