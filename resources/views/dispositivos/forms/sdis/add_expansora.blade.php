@extends('layouts.app')

@section('content')
  <div class="container">

    <div class="row justify-content-md-center">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">Agregar Expansora</div>
            <div class="card-body">
                <form action="/add_expansora" method="post" name="form">
                  {{ csrf_field() }}
                  <div class="form-row">
                    <div class="form-group col-md-3">
                      <label for="name">Nombre</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="" required>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="modelo_id">Modelo</label>
                        <select class="form-control" name="modelo_id">
                          <option value="">- - - Seleccione - - -</option>
                          @foreach ($modelos as $modelo)
                            <option value="{{$modelo->id}}">{{$modelo->name}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="serial">Serial</label>
                      <input type="text" class="form-control" id="serial" placeholder="" name="serial" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                    </div>

                    <div class="form-group col-md-3">
                      <label for="cantzona">Zonas</label>
                        <input type="number" class="form-control" id="cantzona" placeholder="" name="cantzona"  required>
                      </select>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-5">
                      <label for="abonado_id">Panel/Abonado/Cliente</label>
                        <select class="form-control" name="cctv_id">
                          <option value="">- - - Seleccione - - -</option>
                          @foreach ($cctvs as $cctv)
                            <option value={{$cctv->id}}>P: {{$cctv->id}} - AB: {{$cctv->abonado->numero}} - C: {{$cctv->abonado->cliente->name}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-5">
                      <label for="zona">Ubicacion</label>
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
