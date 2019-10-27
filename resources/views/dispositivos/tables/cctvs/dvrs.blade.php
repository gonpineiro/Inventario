@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h1>DVRs @can ('dvrs.create') <a href="/form_dvr"> +</a> @endcan</h1>
          <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Afectado</th>
                <th scope="col">Modelo</th>
                @can ('dvrs.only')  <th scope="col">Reporte</th> @endcan
              </tr>
            </thead>
            <tbody>
                @foreach ($hosts as $host)
                  <tr>
                    <td>{{$host->id}}</td>
                    @can ('dvrs.only') <td><a href="/only_dvr/{{$host->id}}">{{$host->name}}</a></td> @else <td>{{$host->name}}</td>  @endcan
                    <td>{{$host->departament->name}} - {{$host->departament->cliente->name}}</td>
                    <td>{{$host->modelo->name}}</td>
                    @can ('dvrs.only')  <td><a href="/report_dvr/{{$host->id}}" target="_blank"><img src={{asset("logos/pdf-logo.png")}} style="width: 17px;"></a></td>  @endcan
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
