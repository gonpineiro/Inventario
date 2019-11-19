@extends('layouts.administracion')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h3>Historial de movimientos</h3>
        <br>
        <table class="table table-hover" id="host-table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Fecha</th>
              <th scope="col">Dispositivo</th>
              <th scope="col">Usuario</th>
              <th scope="col">Tipo</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($historials as $historial)
                <tr>

                  <td>{{$historial->id}}</td>
                  <td>{{$historial->created_at->format('d/m/Y')}}</td>
                  @if (!is_null($historial->host)) <td>{{$historial->host->id}} - N: {{$historial->host->name}} - T: {{$historial->host->host_type->name}}</td> @else <td> </td> @endif
                  <td>{{$historial->user->name}}</td>
                  <td>
                      @switch($historial->type)
                        @case(0)
                          Agrego
                          @break
                        @case(1)
                          Modifico
                          @break
                        @endswitch
                  </td>

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
