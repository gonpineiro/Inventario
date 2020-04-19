@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
          <h3>Trackers @can ('trackers.create') <a href="/form_tracker"> +</a> @endcan </h3>
            <br>
            <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Abonado</th>
                <th scope="col">Cliente</th>
                <th scope="col">Zona</th>
                <th scope="col">Modelo</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($hosts as $host)
                  <tr>
                      <td>{{$host->id}}</td>
                      @can ('trackers.only') <td><a href="/only_tracker/{{$host->id}}">{{$host->name}}</a></td> @else {{$host->name}} @endcan
                      <td>{{$host->abonado->numero}}</td>
                      <td>{{$host->abonado->departament->cliente->name}}</td>
                      <td>{{$host->zona}}</td>
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
