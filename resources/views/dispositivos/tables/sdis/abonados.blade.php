@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h3>Abonados @can ('abonados.create') <a href="/form_abonado"> +</a> @endcan  </h3>
          <br>
          <table class="table  table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Número</th>
                <th scope="col">Afectado</th>
                <th scope="col">Cliente</th>
                @can ('abonados.only') <th scope="col">Reporte</th> @endcan
              </tr>
            </thead>
            <tbody>
                @foreach ($abonados as $abonado)
                  <tr>
                    <td>{{$abonado->id}}</td>
                    @can ('abonados.only') <td><a href="/only_abonado/{{$abonado->id}}">{{$abonado->numero}}</a></td> @else <td>{{$abonado->numero}}</td>  @endcan

                    <td>{{$abonado->departament->name}}</td>
                    <td>{{$abonado->departament->cliente->name}}</td>
                    @can ('abonados.only') <td><a href="/abonado_pdf/{{$abonado->id}}" target="_blank"><img src={{asset("logos/pdf-logo.png")}} style="width: 17px;"></a></td> @endcan
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
