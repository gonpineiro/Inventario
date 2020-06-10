@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header">Modificando {{$host->name}}</div>
        <div class="card-body">
          <form action="/update_panel_alarm/{{$host->id}}" method="post" name="form">
            {{ csrf_field() }}
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" value="{{$host->name}}" required>
              </div>
              <div class="form-group col-md-3">
                <label for="modelo_id">Modelo </label> <a href="/modelos" target=_blank> +</a>
                <select class="form-control" name="modelo_id">
                  <option value="{{$host->modelo_id}}">{{$host->modelo->name}}</option>
                  @foreach ($modelos as $modelo)
                  <option value="{{$modelo->id}}">{{$modelo->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="serial">Serial</label>
                <input type="text" class="form-control uppercase" value="{{$host->serial}}" name="serial" required>
              </div>

              <div class="form-group col-md-3">
                <label for="cantzona">Zonas</label>
                <input type="text" class="form-control" value="{{$host->cantzona}}" name="cantzona" required>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-5">
                <label for="abonado_id">Abonado</label> <a href="/form_abonado" target=_blank>+</a>
                <select class="form-control" name="abonado_id">
                  <option value={{$host->abonado_id}}> {{$host->abonado->numero}} - C:
                    {{$host->abonado->departament->cliente->name}}</option>
                  @foreach ($abonados as $abonado)
                  <option value={{$abonado->id}}> {{$abonado->numero}} - C: {{$abonado->departament->cliente->name}}
                  </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-5">
                <label for="valor">Ubicacion</label>
                <input type="text" class="form-control" value="{{$host->zona}}" name="zona" required>
              </div>
              <div class="form-group col-md-2">
                <label for="valor">Valor</label>
                <input type="number" min="10" class="form-control" value="{{$host->valor}}" name="valor" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md">
                <label for="comentario">Observaciónes</label>
                <textarea rows="10" cols="50" type="text" class="form-control" id="comentario"
                  name="comentario">{{$host->comentario}} </textarea>
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