@extends('layouts.app')

@section('content')
  <div class="container">

    <div class="row justify-content-md-center">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">Modificandosa {{$host->name}}</div>
            <div class="card-body">
                <form action="/update_comunicator/{{$host->id}}" method="post" name="form">
                  {{ csrf_field() }}
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="name">Nombre</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{$host->name}}" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="modelo_id">Modelo</label>
                        <select class="form-control" name="modelo_id">
                          <option value="{{$host->modelo_id}}">{{$host->modelo->name}}</option>
                          @foreach ($modelos as $modelo)
                            <option value="{{$modelo->id}}">{{$modelo->name}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="serial">Serial</label>
                      <input type="text" class="form-control" id="serial" value="{{$host->serial}}" name="serial" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="abonado_id">SIM I</label>
                        <select class="form-control" name="card_sim_i" id="card_sim_i" onclick="disableSimI()">
                          @if (!is_null($host->sim_i))
                            <option value={{$host->sim_i->id}}>{{$host->sim_i->line_phone}}</option>
                            <option value="">- - - RETIRAR - - -</option>
                          @else
                            <option value="">- - - Seleccione - - -</option>
                          @endif
                          @foreach ($cardsims as $cardsim)
                            <option value={{$cardsim->id}}>{{$cardsim->line_phone}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="zona">SIM II</label>
                        <select class="form-control" name="card_sim_ii" id="card_sim_ii"  onclick="disableSimII()">
                          @if (!is_null($host->sim_ii))
                            <option value={{$host->sim_ii->id}}>{{$host->sim_ii->line_phone}}</option>
                            <option value="">- - - RETIRAR - - -</option>
                          @else
                            <option value="">- - - Seleccione - - -</option>
                          @endif
                          @foreach ($cardsims as $cardsim)
                            <option value={{$cardsim->id}}>{{$cardsim->line_phone}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="valor">SIM III</label>
                        <select class="form-control" name="card_sim_iii" id="card_sim_iii"  onclick="disableSimIII()">
                          @if (!is_null($host->sim_iii))
                            <option value={{$host->sim_iii->id}}>{{$host->sim_iii->line_phone}}</option>
                            <option value="">- - - RETIRAR - - -</option>
                          @else
                            <option value="">- - - Seleccione - - -</option>
                          @endif
                          @foreach ($cardsims as $cardsim)
                            <option value={{$cardsim->id}}>{{$cardsim->line_phone}}</option>
                          @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="form-row">
                        <div class="form-group col-md-5">
                          <label for="abonado_id">Conectado</label>
                            <select class="form-control" name="cctv_id">
                              <option value="{{$host->cctv_id}}">P: {{$host->host->id}} - AB: {{$host->host->abonado->numero}} - C: {{$host->host->abonado->departament->cliente->name}}</option>
                              @foreach ($cctvs as $cctv)
                                <option value="{{$cctv->id}}">P: {{$cctv->id}} - AB: {{$cctv->abonado->numero}}- C: {{$cctv->abonado->departament->cliente->name}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                          <label for="valor">Ubicacion</label>
                          <input type="text" class="form-control" id="zona" value="{{$host->zona}}" name="zona" required>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="valor">Valor</label>
                          <input type="number" min="10" class="form-control" id="valor" value="{{$host->valor}}" name="valor" required>
                        </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md">
                      <label for="comentario">Observaciónes</label>
                      <textarea rows="10" cols="50" type="text" class="form-control" id="comentario" name="comentario" >{{$host->comentario}} </textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-dark">Agregar</button>
                </form>
              </div>
        </div>
      </div>
  </div>

@endsection


<script >
  function disableSimI() {
    var sim_i_value = document.getElementById("card_sim_i").value
    var sim_ii_value = document.getElementById("card_sim_ii").value
    var sim_iii_value = document.getElementById("card_sim_iii").value
    if ((sim_i_value == sim_ii_value) | (sim_i_value == sim_iii_value)) {
      document.getElementById("card_sim_i").value = 0;
    }
  }

  function disableSimII() {
    var sim_i_value = document.getElementById("card_sim_i").value
    var sim_ii_value = document.getElementById("card_sim_ii").value
    var sim_iii_value = document.getElementById("card_sim_iii").value
    if ((sim_ii_value == sim_i_value) | (sim_ii_value == sim_iii_value)) {
      document.getElementById("card_sim_ii").value = 0;
    }
  }

  function disableSimIII() {
    var sim_i_value = document.getElementById("card_sim_i").value
    var sim_ii_value = document.getElementById("card_sim_ii").value
    var sim_iii_value = document.getElementById("card_sim_iii").value
    if ((sim_iii_value == sim_i_value) | (sim_iii_value == sim_ii_value)) {
      document.getElementById("card_sim_iii").value = 0;
    }
  }
</script>
