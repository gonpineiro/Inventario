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
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="modelo_id">Modelo </label><a href="/modelos" target=_blank> +</a>
                                <select class="form-control" name="modelo_id" required>
                                    <option value="">- - - Seleccione - - -</option>
                                    @foreach ($modelos as $modelo)
                                    <option value="{{$modelo->id}}">{{$modelo->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="serial">Serial</label>
                                <input type="text" class="form-control uppercase" name="serial" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="abonado_id">SIM I</label> <a href="/card_sims">+</a>
                                <select class="form-control" name="card_sim_i" id="card_sim_i" onclick="disableSimI()">
                                    <option value="">- - - Seleccione - - -</option>
                                    @foreach ($cardsims as $cardsim)
                                    <option value={{$cardsim->id}}>{{$cardsim->line_phone}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="zona">SIM II</label>
                                <select class="form-control" name="card_sim_ii" id="card_sim_ii"
                                    onclick="disableSimII()">
                                    <option value="">- - - Seleccione - - -</option>
                                    @foreach ($cardsims as $cardsim)
                                    <option value={{$cardsim->id}}>{{$cardsim->line_phone}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="valor">SIM III</label>
                                <select class="form-control" name="card_sim_iii" id="card_sim_iii"
                                    onclick="disableSimIII()">
                                    <option value="">- - - Seleccione - - -</option>
                                    @foreach ($cardsims as $cardsim)
                                    <option value={{$cardsim->id}}>{{$cardsim->line_phone}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="abonado_id">Abonado </label><a href="/form_abonado" target=_blank> +</a>
                                <select class="form-control" name="abonado_id" id="abonado" onclick="selectedAbonado()"
                                    required>
                                    <option value="" selected>- - - Seleccione - - -</option>
                                    @foreach ($abonados as $abonado)
                                    <option value={{$abonado->id}}>{{$abonado->numero}} - D:
                                        {{$abonado->departament->name}} - C:
                                        {{$abonado->departament->cliente->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="departament_id">Cliente </label><a href="/form_cliente" target=_blank> +</a>
                                <select class="form-control" name="departament_id" id="departament"
                                    onclick="selectedDepartament()" required>
                                    <option value="" selected>- - - Seleccione - - -</option>
                                    @foreach ($departaments as $departament)
                                    <option value="{{$departament->id}}">{{$departament->cliente->name}} -
                                        {{$departament->name}} -</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="form-group col-md-5">
                                <label for="zona">Ubicación</label>
                                <input type="text" class="form-control" name="zona" required>
                            </div> --}}
                            <div class="form-group col-md-2">
                                <label for="valor">Valor</label>
                                <input type="number" min="10" class="form-control" name="valor" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md">
                                <label for="comentario">Observaciónes</label>
                                <textarea rows="10" cols="50" type="text" min="10" class="form-control"
                                    name="comentario"> </textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-dark">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
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

const selectedAbonado = () => {
    const abonadoValue = document.getElementById("abonado").value
    if (abonadoValue) {
        document.getElementById("departament").disabled = true; 
        document.getElementById("departament").value = 0;
    }else{
        document.getElementById("departament").disabled = false;
    }
}
const selectedDepartament = () => {
    const abonadoValue = document.getElementById("departament").value
    if (abonadoValue) {
        document.getElementById("abonado").disabled = true;
        document.getElementById("abonado").value = 0;
    }else{
        document.getElementById("abonado").disabled = false;
    }
}
</script>