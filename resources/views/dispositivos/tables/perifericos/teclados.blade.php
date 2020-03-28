@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h3>Teclados @can ('teclados.create') <a href="/form_teclado"> +</a></h1>  @endcan </h3>
          @switch($_SERVER["REQUEST_URI"])
            @case("/teclados")
                Habilitadas / <a href="/teclados_disable">Deshabilitadas</a> / <a href="/teclados_stock">Stock</a>
                @break
            @case("/teclados_disable")
                <a href="/teclados">Habilitadas</a> / Deshabilitadas / <a href="/teclados_stock">Stock</a>
                @break
            @case("/teclados_stock")
                <a href="/teclados">Habilitadas</a> / <a href="/teclados_disable">Deshabilitadas</a> / Stock
                @break
          @endswitch
          <br>

          <br>
          <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Modelo</th>
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
                    @can ('teclados.only') <td><a href="/only_teclado/{{$host->id}}">{{$host->name}}</a></td> @else <td>{{$host->name}}</td>  @endcan
                    <td>{{$host->modelo->name}}</td>
                    <td>{{$host->host->name}} </td>
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
