@extends('layouts.administracion')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h1>Entregas realizadas</h1>
          <table class="table table-hover" style="width:100%">
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
                    <td>{{$host_mov->created_at->format('d/m/Y')}}</td>
                    <td><a href="#">{{$host_mov->host->name}}</a></td>
                    <td>{{$host_mov->user_host->apellido}} {{$host_mov->user_host->name}}</td>
                    <td><a href="entregas/{{$host_mov->ficha_entrega->id}}/v">{{$host_mov->ficha_entrega->id}}</a></td>
                    <td>
                      @if ($host_mov->type == 0) <img src="logos/delete-user.png" style="width: 20px;"></td> @endif
                      @if ($host_mov->type == 1) <img src="logos/add-user.png" style="width: 20px;"></td> @endif
                  </tr>
                @endforeach

            </tbody>
          </table>
      </div>
    </div>
</div>
@endsection
