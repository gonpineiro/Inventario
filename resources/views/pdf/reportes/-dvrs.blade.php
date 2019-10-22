@extends('layouts.dvrreport')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">P2P</th>
                <th scope="col">Afectado</th>
                <th scope="col">Modelo</th>
                <th scope="col">Valor</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($camaraIps as $camaraIp)
                  <tr>
                    <td>{{$camaraIp->id}}</td>
                    <td>{{$camaraIp->name}}</td>
                    <td>{{$camaraIp->p2p}}</td>
                    <td>{{$camaraIp->departament->name}} - {{$camaraIp->departament->cliente->name}}</td>
                    <td>{{$camaraIp->modelo->marca}} - {{$camaraIp->modelo->name}}</td>
                    <td>$ {{$camaraIp->valor}}</td>
                  </tr>
                @endforeach

            </tbody>
          </table>
      </div>
    </div>
</div>
@endsection
