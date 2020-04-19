@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col col-md-8">
        <h1>Sims </h1>
          <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Número</th>
                <th scope="col">Codigo</th>
                <th scope="col">Dispositivo</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($cardSims as $cardSim)
                  <tr>
                    <td>{{$cardSim->id}}</td>
                    <td>{{$cardSim->line_phone}}</td>
                    <td>{{$cardSim->cod_sim}}</td>
                    @if ($cardSim->host["host_type"]["id"] == 46)
                      <td><a href="/only_panico/{{$cardSim->host["id"]}}">{{$cardSim->host["name"]}}</td>
                    @endif
                    @if ($cardSim->host["host_type"]["id"] == 42)
                      <td><a href="/only_comunicator/{{$cardSim->host["id"]}}">{{$cardSim->host["name"]}}</td>
                    @endif
                    @if ($cardSim->host["host_type"]["id"] == 47)
                      <td><a href="/only_tracker/{{$cardSim->host["id"]}}">{{$cardSim->host["name"]}}</td>
                    @endif
                    @if (is_null($cardSim->host["host_type"]["id"]))
                      <td></td>
                    @endif
                  </tr>
                @endforeach
            </tbody>
          </table>
      </div>
      <div class="col col-md-4">
        <h1>Agregar SIM</h1>
        <div class="card">
            <div class="card-header">Agregar SIMs</div>
            <div class="card-body">
                <form method="POST" action="/add_card_sim">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="line_phone">Número</label>
                            <input id="line_phone" type="number" class="form-control" name="line_phone" value="" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="cod_sim">Código</label>
                            <input id="cod_sim" type="number" class="form-control" name="cod_sim" value="" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark">Agregar</button>
                </form>
            </div>
        </div>
      </div>
      <script >
              $(document).ready(function() {
              $('#host-table').DataTable();
                } );
      </script>
    </div>
</div>
@endsection
