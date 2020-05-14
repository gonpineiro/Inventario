@extends('layouts.app')

@section('content')
  <div class="container">
    {{-- SOLAPAS --}}
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="cardsims-tab" data-toggle="tab" href="#cardsims" role="tab" aria-controls="cardsims" aria-selected="true">SIMs </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="sim_depositos-tab" data-toggle="tab" href="#sim_depositos" role="tab" aria-controls="sim_depositos" aria-selected="true">Depositos</a>
      </li>
    </ul>

  {{-- CONTENIDO --}}
    <div class="tab-content" id="myTabContent">
      {{-- PRIMER CONTENIDO --}}
      <div class="tab-pane fade show active" id="cardsims" role="tabpanel" aria-labelledby="cardsims-tab">
        <div class="row mt-2">
          <div class="col col-md-8">
              <table class="table table-hover" id="sims-table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Número</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Deposito</th>
                    <th scope="col">Dispositivo</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($cardSims as $cardSim)
                      <tr>
                        <td>{{$cardSim->id}}</td>
                        <td>{{$cardSim->line_phone}}</td>
                        <td>{{$cardSim->cod_sim}}</td>
                        <td>{{$cardSim->sim_deposito->name}}</td>
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
            <div class="card">
                <div class="card-header">Agregar SIMs</div>
                <div class="card-body">
                    <form method="POST" action="/add_card_sim">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="line_phone">Número</label>
                                <input id="line_phone" type="number" class="form-control{{ $errors->has('line_phone') ? ' is-invalid' : '' }}" name="line_phone" value="{{old('line_phone')}}">
                                @if ($errors->has('line_phone'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('line_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="cod_sim">Código</label>
                                <input id="cod_sim" type="number" class="form-control{{ $errors->has('cod_sim') ? ' is-invalid' : '' }}" name="cod_sim" value="{{old('cod_sim')}}">
                                @if ($errors->has('cod_sim'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cod_sim') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-12">
                            <label for="sim_deposito_id">Deposito</label>
                            <select class="form-control{{ $errors->has('sim_deposito_id') ? ' is-invalid' : '' }}" name="sim_deposito_id" >
                              <option value="">- - - Seleccione - - -</option>
                              @foreach ($depositos as $deposito)
                                <option value="{{$deposito->id}}">{{$deposito->name}}</option>
                              @endforeach
                            </select>
                            @if ($errors->has('sim_deposito_id'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('sim_deposito_id') }}</strong>
                                </span>
                            @endif
                          </div>
                        </div>
                        <button type="submit" class="btn btn-dark">Agregar</button>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>

      {{-- PRIMER CONTENIDO --}}
      <div class="tab-pane fade active" id="sim_depositos" role="tabpanel" aria-labelledby="sim_depositos-tab">
        <div class="row mt-2">
          <div class="col col-md-8">
              <table class="table table-hover" id="depositos-table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cantidad Instaladas</th>
                    <th scope="col">Cantidad en Stock</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($depositos as $deposito)

                      <tr>
                        <td>{{$deposito->id}}</td>
                        <td>{{$deposito->name}}</td>
                        <td>{{$deposito->card_sim_instaladas->count()}}</td>
                        <td>{{$deposito->card_sim_total->count() - $deposito->card_sim_instaladas->count()}}</td>
                        <td>{{$deposito->card_sim_total->count()}}</td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
          </div>
          <div class="col col-md-4">
            <div class="card">
                <div class="card-header">Agregar Deposito de SIMs</div>
                <div class="card-body">
                    <form method="POST" action="/add_sim_deposito">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="line_phone">Nombre</label>
                                <input id="line_phone" type="text" class="form-control" name="name" value="" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark">Agregar</button>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>

    </div>
</div>

<script >
  $(document).ready(function() {
  $('#sims-table').DataTable();
    } );

  $(document).ready(function() {
  $('#depositos-table').DataTable();
    } );
</script>

@endsection
