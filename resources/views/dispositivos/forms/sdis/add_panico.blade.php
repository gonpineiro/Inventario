@extends('layouts.app')

@section('content')
  <div class="container">

    <div class="row justify-content-md-center">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">Agregar Panico</div>
            <div class="card-body">
                <form action="/add_panico" method="post" name="form">
                  {{ csrf_field() }}

                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="name">Nombre</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="modelo_id">Modelo</label>
                        <select class="form-control" name="modelo_id">
                          <option value="">- - - Seleccione - - -</option>
                          @foreach ($modelos as $modelo)
                            <option value="{{$modelo->id}}">{{$modelo->name}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="serial">Serial</label>
                      <input type="text" class="form-control" id="serial" placeholder="" name="serial" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="abonado_id">SIM I</label> <a href="/card_sims">+</a>
                      <select class="form-control" name="card_sim_i" id="card_sim_i" onclick="disableSimI()">
                        <option value="">- - - Seleccione - - -</option>
                        @foreach ($cardsims as $cardsim)
                          <option value={{$cardsim->id}} >{{$cardsim->line_phone}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="zona">SIM II</label>
                        <select class="form-control" name="card_sim_ii" id="card_sim_ii" onclick="disableSimII()">
                          <option value="">- - - Seleccione - - -</option>
                          @foreach ($cardsims as $cardsim)
                            <option value={{$cardsim->id}}>{{$cardsim->line_phone}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="valor">SIM III</label>
                        <select class="form-control" name="card_sim_iii" id="card_sim_iii" onclick="disableSimIII()">
                          <option value="">- - - Seleccione - - -</option>
                          @foreach ($cardsims as $cardsim)
                            <option value={{$cardsim->id}}>{{$cardsim->line_phone}}</option>
                          @endforeach
                        </select>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-5">
                      <label for="abonado_id">Abonado</label>
                        <select class="form-control" name="abonado_id" required>
                          <option selected disabled>- - - Seleccione - - -</option>
                          @foreach ($abonados as $abonado)
                            <option value={{$abonado->id}}>{{$abonado->numero}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-5">
                      <label for="zona">Zona</label>
                      <input type="text" class="form-control" id="zona" placeholder="" name="zona" required>
                    </div>
                    <div class="form-group col-md-2">
                      <label for="valor">Valor</label>
                      <input type="number" min="10" class="form-control" id="valor" placeholder="" name="valor" required>
                    </div>
                  </div>

                  <div class="form-row">
                        <div class="form-group col-md">
                          <label for="comentario">Observaciónes</label>
                          <textarea rows="10" cols="50" type="text" min="10" class="form-control" id="comentario" placeholder="" name="comentario" > </textarea>
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
      document.getElementById("card_sim_i").value = -1;
    }
  }

  function disableSimII() {
    var sim_i_value = document.getElementById("card_sim_i").value
    var sim_ii_value = document.getElementById("card_sim_ii").value
    var sim_iii_value = document.getElementById("card_sim_iii").value
    if ((sim_ii_value == sim_i_value) | (sim_ii_value == sim_iii_value)) {
      document.getElementById("card_sim_ii").value = -1;
    }
  }

  function disableSimIII() {
    var sim_i_value = document.getElementById("card_sim_i").value
    var sim_ii_value = document.getElementById("card_sim_ii").value
    var sim_iii_value = document.getElementById("card_sim_iii").value
    if ((sim_iii_value == sim_i_value) | (sim_iii_value == sim_ii_value)) {
      document.getElementById("card_sim_iii").value = -1;
    }
  }
</script>
