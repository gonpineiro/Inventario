@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h1>Cámaras Analógicas @can ('camarasanas.create') <a href="/form_camaraana"> +</a>  @endcan </h1>
          <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Afectado</th>
                <th scope="col">Grabando</th>
                <th scope="col">Modelo</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($hosts as $host)
                  <tr>
                    <td>{{$host->id}}</td>
                    @can ('camarasanas.only') <td><a href="/only_camaraana/{{$host->id}}">{{$host->name}}</a></td> @else <td>{{$host->name}}</td>  @endcan
                    <td>{{$host->departament->name}} - {{$host->departament->cliente->name}}</td>
                    @can ('dvrs.only') <td><a href="/only_dvr/{{$host->host->id}}">{{$host->host->name}}</a></td> @else <td>{{$host->host->name}}</td>  @endcan
                    <td>{{$host->modelo->name}}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
      </div>
      <script >
              $(document).ready(function() {
              $('#host-table').DataTable();
                } );
      </script>
    </div>
</div>
@endsection
