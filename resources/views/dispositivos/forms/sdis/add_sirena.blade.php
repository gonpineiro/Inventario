@extends('layouts.app')

@section('content')
  <div class="container">

    <div class="row justify-content-md-center">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">Agregar Sirena</div>
            <div class="card-body">
                <form action="/add_sirena" method="post" name="form">
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
                    <div class="form-group col-md-5">
                      <label for="abonado_id">Panel/Abonado/Cliente</label>
                        <select class="form-control" name="cctv_id" required>
                          <option selected disabled>- - - Seleccione - - -</option>
                          <option disabled>Paneles</option>
                          @foreach ($panel_alarms as $panel_alarm)
                            <option value={{$panel_alarm->id}}>P: {{$panel_alarm->id}} - AB: {{$panel_alarm->abonado->numero}} - C: {{$panel_alarm->abonado->cliente->name}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-5">
                      <label for="zona">Ubicación</label>
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
