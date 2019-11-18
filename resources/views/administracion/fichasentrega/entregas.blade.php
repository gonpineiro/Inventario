@extends('layouts.administracion')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h3>Movimientos de los Dispositivos</h3>
        <br>
        <table class="table table-hover" style="width:100%" id="host-table">
          <thead>
            <tr>
              <th scope="col" style="width:5%">#</th>
              <th scope="col" style="width:20%">Fecha</th>
              <th scope="col" style="width:20%">Dispositivo</th>
              <th scope="col" style="width:15%">Usuario</th>
              <th scope="col" style="width:15%">Ficha ID</th>
              <th scope="col" style="width:15%">Tipo</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($host_movs as $host_mov)
                <tr>
                  <td>{{$host_mov->id}}</td>
                  <td>@if (!is_null($host_mov->ficha_entrega['fecha'])) {{$host_mov->ficha_entrega['fecha']->format('d/m/Y')}} @endif</td>
                  <td><a href=@php hostLink($host_mov->host) @endphp>{{$host_mov->host->name}}</a></td>
                  <td>{{$host_mov->user_host->apellido}} {{$host_mov->user_host->name}}</td>
                  <td>@if (!is_null($host_mov->ficha_entrega)) <a href="entregas/{{$host_mov->ficha_entrega->id}}/v">{{$host_mov->ficha_entrega->id}}</a> @endif</td>
                  <td>
                    @if ($host_mov->type == 0) <img src="logos/delete-user.png" style="width: 20px;"></td> @endif
                    @if ($host_mov->type == 1) <img src="logos/add-user.png" style="width: 20px;"></td> @endif
                </tr>
              @endforeach
          </tbody>
        </table>
        <script >
          $(document).ready(function() {
          $('#host-table').DataTable({
            "order": [[ 0, "desc" ]]
          });
            } );
        </script>
      </div>
    </div>
</div>
@endsection


@php
  function hostLink($host){
    if ($host->host_type_id == 1) {echo "only_computadora/".$host->id;  }
    if ($host->host_type_id == 2) {echo "only_notebook/".$host->id;  }
  }
@endphp
