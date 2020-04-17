@extends('layouts.app')

@section('content')
  <div class="container">

    <div class="row justify-content-md-center">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">Modificandosa {{$host->name}}</div>
            <div class="card-body">
                <form action="/update_sensor/{{$host->id}}" method="post" name="form">
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
                        <div class="form-group col-md-5">
                          <label for="abonado_id">Conectado</label>
                            <select class="form-control" name="cctv_id">
                              @if ($host->host->host_type_id == 40) <option value="{{$host->cctv_id}}">P: {{$host->host->id}} - AB: {{$host->host->abonado->numero}} - C: {{$host->host->abonado->departament->cliente->name}}</option> @endif
                              @if ($host->host->host_type_id == 41) <option value="{{$host->cctv_id}}">E: {{$host->host->id}} - P: {{$host->host->host->id}} - AB: {{$host->host->host->abonado->numero}} - C: {{$host->host->host->abonado->departament->cliente->name}}</option> @endif
                              @if ($host->host->host_type_id == 44) <option value="{{$host->cctv_id}}">T: {{$host->host->id}} - P: {{$host->host->host->id}} - AB: {{$host->host->host->abonado->numero}} - C: {{$host->host->host->abonado->departament->cliente->name}}</option> @endif

                              <option disabled>Paneles</option>
                              @foreach ($panel_alarms as $panel_alarm)
                                <option value={{$panel_alarm->id}}>P: {{$panel_alarm->id}} - AB: {{$panel_alarm->abonado->id}} - C: {{$panel_alarm->abonado->departament->cliente->name}}</option>
                              @endforeach
                              <option disabled>Expansoras</option>
                              @foreach ($expansoras as $expansora)
                                <option value={{$expansora->id}}>E: {{$expansora->id}} - P: {{$expansora->host->id}} - AB: {{$expansora->host->abonado->id}} - C: {{$expansora->host->abonado->departament->cliente->name}}</option>
                              @endforeach
                              <option disabled>Teclados</option>
                              @foreach ($teclados as $teclado)
                                <option value={{$teclado->id}}>E: {{$teclado->id}} - P: {{$teclado->host->id}} - AB: {{$teclado->host->abonado->id}} - C: {{$teclado->host->abonado->departament->cliente->name}}</option>
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
