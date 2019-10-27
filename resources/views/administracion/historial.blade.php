@extends('layouts.administracion')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h1>Historial de movimientos</h1>
          <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha</th>
                <th scope="col">Usuario</th>
                <th scope="col">Tipo</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($historials as $historial)
                  <tr>
                    <td>{{$historial->id}}</td>
                    <td>{{$historial->created_at->format('d/m/Y')}}</td>
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
              $('#host-table').DataTable();
                } );
      </script>
    </div>
</div>
@endsection
