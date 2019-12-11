@extends('layouts.administracion')

@section('content')
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">Generar entrega de equipamiento tecnologico <span style="float:right;color:red;font-weight: bold;">{{$last}}</span></div>
            <div class="card-body">
                <form action="/add_ficha_entrega" method="post" name="form">
                  {{ csrf_field() }}
                  <div class="form-row">
                    <div class="form-group col-md-9">
                      <label for="user_host_id">Usuario</label>
                      <select class="form-control" name="user_host_id">
                        <option value="">- - - Seleccione - - -</option>
                        @foreach ($userhosts as $userhost)
                          <option value="{{$userhost->id}}">{{$userhost->name}} {{$userhost->apellido}} - D: {{$userhost->departament->name}} - C: {{$userhost->departament->cliente->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="fecha">Fecha</label>
                      <input type="date" class="form-control" id="fecha" name="fecha" required>
                    </div>
                  </div>
                  <div class="card-header">Detalle de la entrega</div>
                  <table class="table table-hover" style="width:100%">
                    <thead>
                      <tr>
                        <th scope="col" style="width:10%">Cant</th>
                        <th scope="col"style="width:50%">Marca/Modelo/SN</th>
                        <th scope="col"style="width:40%">Observaciones</th>
                      </tr>
                    </thead>
                    <tbody>
                          @for ($i=0; $i <= 4; $i++)
                          <tr>
                            <td><input type="number" class="form-control" id="cantidad_{{$i}}" value="" name="detalle[{{ $i }}][cantidad]" disabled></td>
                            <td>
                              <select class="form-control" name="detalle[{{ $i }}][host_id]" id="host_{{$i}}" onclick="setCantidad{{$i}}()">
                                <option value="">- - - Seleccione - - -</option>
                                @foreach ($hosts as $host)
                                  <option value="{{$host->id}}"  >{{$host->id}}  |  {{$host->modelo->name}}  |  {{$host->modelo->marca->name}}  |  {{$host->serial}}</option>
                                @endforeach
                              </select>
                            </td>
                            <td><input type="text"  class="form-control" id="obs_{{$i}}" placeholder="" name="detalle[{{ $i }}][obs]" disabled></td>
                          </tr>
                           @endfor
                    </tbody>
                  </table>
                  <input type="text" class="form-control" value=1 name="reddi" hidden>
                  <button type="submit" class="btn btn-dark">Agregar</button>
                </form>
              </div>
        </div>
      </div>
  </div>
@endsection

<script type="text/javascript">
    function setCantidad0() {
      if (document.getElementById("host_0").value === "") {
        document.getElementById("cantidad_0").value = "";
        document.getElementById("cantidad_0").disabled = true;
        document.getElementById("obs_0").disabled = true;
      }else {
        document.getElementById("cantidad_0").value = 1;
        document.getElementById("cantidad_0").disabled = false;
        document.getElementById("obs_0").disabled = false;
      }
    }

    function setCantidad1() {
      if (document.getElementById("host_1").value === "") {
        document.getElementById("cantidad_1").value = "";
        document.getElementById("cantidad_1").disabled = true;
        document.getElementById("obs_1").disabled = true;
      }else {
        document.getElementById("cantidad_1").value = 1;
        document.getElementById("cantidad_1").disabled = false;
        document.getElementById("obs_1").disabled = false;
      }
    }

    function setCantidad2() {
      if (document.getElementById("host_2").value === "") {
        document.getElementById("cantidad_2").value = "";
        document.getElementById("cantidad_2").disabled = true;
        document.getElementById("obs_2").disabled = true;
      }else {
        document.getElementById("cantidad_2").value = 1;
        document.getElementById("cantidad_2").disabled = false;
        document.getElementById("obs_2").disabled = false;
      }
    }

    function setCantidad3() {
      if (document.getElementById("host_3").value === "") {
        document.getElementById("cantidad_3").value = "";
        document.getElementById("cantidad_3").disabled = true;
        document.getElementById("obs_3").disabled = true;
      }else {
        document.getElementById("cantidad_3").value = 1;
        document.getElementById("cantidad_3").disabled = false;
        document.getElementById("obs_3").disabled = false;
      }
    }

    function setCantidad4() {
      if (document.getElementById("host_4").value === "") {
        document.getElementById("cantidad_4").value = "";
        document.getElementById("cantidad_4").disabled = true;
        document.getElementById("obs_4").disabled = true;
      }else {
        document.getElementById("cantidad_4").value = 1;
        document.getElementById("cantidad_4").disabled = false;
        document.getElementById("obs_4").disabled = false;
      }
    }
</script>
