@extends('layouts.operaciones')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
          <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                @can ('abonados.only') <th scope="col">#</th> @endcan
                <th scope="col">Número</th>
                <th scope="col">Palabra Clave</th>
                <th scope="col">Plataforma</th>
                <th scope="col">Tipo</th>
                <th scope="col">Afectado</th>
                <th scope="col">Cliente</th>
                <th scope="col">Direccion</th>
                <th scope="col">Teléfono</th>
                @can ('abonados.only') <th scope="col">Reporte</th> @endcan
              </tr>
            </thead>
            <tbody>
                @foreach ($abonados as $abonado)
                  <tr>
                    @can ('abonados.only') <td>{{$abonado->id}}</td> @endcan
                    @can ('abonados.only') <td><a href="/only_abonado/{{$abonado->id}}">{{$abonado->numero}}</a></td> @else <td>{{$abonado->numero}}</td>  @endcan
                    <td>{{$abonado->palabra_clave}}</td>
                    <td>{{$abonado->plataforma->name}}</td>
                    <td>{{$abonado->abonadotype->name}}</td>
                    <td>{{$abonado->departament->name}}</td>
                    <td>{{$abonado->departament->cliente->name}}</td>
                    <td>{{$abonado->direccion}}</td>
                    <td>{{$abonado->telefono}}</td>
                    @can ('abonados.only') <td><a href="/abonado_pdf/{{$abonado->id}}" target="_blank"><img src={{asset("logos/pdf-logo.png")}} style="width: 17px;"></a></td> @endcan
                  </tr>
                @endforeach
            </tbody>
          </table>
      </div>
      <script >
              $(document).ready(function() {
              $('#host-table').DataTable({
                "order": [[ 0, "desc" ]],
                "lengthMenu": [[25, 50, -1], [25, 50, "All"]]
              });
                } );
      </script>
    </div>
</div>
@endsection
