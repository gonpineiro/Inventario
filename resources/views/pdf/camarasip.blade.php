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
                <th scope="col">Afectado</th>
                <th scope="col">Modelo</th>
                <th scope="col">Valor</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($hosts as $host)
                  <tr>
                    <td>{{$host->id}}</td>
                    <td>{{$host->name}}</td>
                    <td>{{$host->departament->name}} - {{$host->departament->cliente->name}}</td>
                    <td>{{$host->modelo->marca->name}} - {{$host->modelo->name}}</td>
                    <td>$ {{$host->valor}}</td>
                  </tr>
                @endforeach
                <tr>
                  <td colspan="4" class="grand total">CANTIDAD</td>
                  <td colspan="1"class="grand total">{{$cantHosts}}</td>
                </tr>
                <tr>
                  <td colspan="4" class="grand total">VALOR TOTAL</td>
                  <td colspan="1"class="grand total">$ {{$sumPrice}}</td>
              </tr>
            </tbody>
          </table>
      </div>
    </div>
</div>
@endsection
