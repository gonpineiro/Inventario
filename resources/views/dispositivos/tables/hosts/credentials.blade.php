@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
          <h3>Credenciales @can ('computadoras.create') <a href="/form_computadora"> +</a> @endcan </h3>
          
          <table class="table table-hover" id="host-table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Modelo</th>
              <th scope="col">Credencial</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($hosts as $host)
                <tr>
                  <td>{{$host->id}}</td>
                  @can ('computadoras.only') <td><a href="/only_computadora/{{$host->id}}">{{$host->name}}</a></td> @else <td>{{$host->name}}</td> @endcan
                  <td>{{$host->modelo->name}}</td>
                  <td>{{$host->os_cred}}</td>
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
