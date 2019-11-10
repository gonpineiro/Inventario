@extends('layouts.administracion')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h1>Entregas realizadas</h1>
          <table class="table table-hover" style="width:100%" id="host-table">
            <thead>
              <tr>
                <th scope="col" style="width:5%">#</th>
                <th scope="col" style="width:20%">Fecha</th>
                <th scope="col" style="width:15%">Usuario</th>
                <th scope="col" style="width:5%">Descargar</th>
                <th scope="col" style="width:5%">Visualizar</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($fichas as $ficha)
                  <tr>
                    <td>{{$ficha->id}}</td>
                    <td>{{$ficha->created_at->format('d/m/Y')}}</td>
                    <td>{{$ficha->user_host->apellido}} {{$ficha->user_host->name}}</td>
                    <td><a href="entregas/{{$ficha->id}}/d" target="_blank"><img src="logos/pdf-logo.png" style="width: 17px;"></a></td>
                    <td><a href="entregas/{{$ficha->id}}/v" target="_blank"><img src="logos/pdf-logo.png" style="width: 17px;"></a></td>
                  </tr>
                @endforeach
            </tbody>
          </table>
          <script >
            $(document).ready(function() {
            $('#host-table').DataTable();
              } );
          </script>
      </div>
    </div>
</div>
@endsection
