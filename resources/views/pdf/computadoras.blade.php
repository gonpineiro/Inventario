@extends('layouts.pdf')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
          <table class="table table-hover" style="width:100%">
            <thead>
              <tr>
                <th scope="col" style="width:2%">#</th>
                <th scope="col" style="width:10%">Nombre</th>
                <th scope="col" style="width:15%">Usuario</th>
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
                    @if (!is_null($host->user_host_id)) <td>{{$host->user_host->name}} {{$host->user_host->apellido}}</td> @else <td></td> @endif
                    @if (!is_null($host->user_host_id)) <td>{{$host->user_host->departament->name}} {{$host->user_host->departament->cliente->name}}</td> @else <td></td> @endif
                    <td>{{$host->modelo->marca->name}} - {{$host->modelo->name}}</td>
                    <td>$ {{$host->valor}}</td>
                  </tr>
                @endforeach

                <tr>
                  <td colspan="5" class="grand total">CANTIDAD</td>
                  <td colspan="1"class="grand total">{{$cantHosts}}</td>
                </tr>
                <tr>
                  <td colspan="5" class="grand total">VALOR TOTAL</td>
                  <td colspan="1"class="grand total">$ {{$sumPrice}}</td>
                </tr>
            </tbody>
          </table>


      </div>
    </div>
</div>
@endsection
