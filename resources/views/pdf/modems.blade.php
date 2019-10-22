@extends('layouts.pdf')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">IP publica</th>
                <th scope="col">Afectado</th>
                <th scope="col">Modelo</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($hosts as $host)
                  <tr>
                    <td>{{$host->id}}</td>
                    <td>{{$host->name}}</td>
                    <td>{{$host->ip_publica}}</td>
                    <td>{{($host->departament->name)}} - {{$host->departament->cliente->name}}</td>
                    <td>{{$host->modelo->marca}} - {{$host->modelo->name}}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
      </div>
    </div>
</div>
@endsection
