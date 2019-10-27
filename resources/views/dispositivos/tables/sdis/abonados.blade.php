@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h1>Abonados @can ('abonados.create') <a href="/form_abonado"> +</a> @endcan  </h1>
          <table class="table  table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Número</th>
                <th scope="col">Cliente</th>
                <th scope="col">Afectado</th>
                @can ('abonados.only') <th scope="col">Reporte</th> @endcan
              </tr>
            </thead>
            <tbody>
                @foreach ($abonados as $abonado)
                  <tr>
                    <td>{{$abonado->id}}</td>
                    <td>{{$abonado->numero}}</td>
                    <td>{{$abonado->cliente->name}}</td>
                    <td>{{$abonado->cliente->name}}</td>
                    @can ('abonados.only') <td><a href="/abonado_pdf/{{$abonado->id}}" target="_blank"><img src={{asset("logos/pdf-logo.png")}} style="width: 17px;"></a></td> @endcan
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
