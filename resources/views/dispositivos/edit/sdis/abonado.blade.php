@extends('layouts.app')

@section('content')
  <div class="container">

    <div class="row justify-content-md-center">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">Modificando {{$abonado->name}}</div>
            <div class="card-body">
                <form action="/update_abonado/{{$abonado->id}}" method="post" name="form">
                  {{ csrf_field() }}
                  <div class="form-row">
                    <div class="form-group col-md-2">
                      <label for="name">Número</label>
                      <input type="text" class="form-control" id="name" name="numero" value="{{$abonado->numero}}" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="modelo_id">Departamento/Cliente</label>
                        <select class="form-control" name="departament_id">
                          <option value="{{$abonado->departament_id}}">{{$abonado->departament->name}}</option>
                          @foreach ($departaments as $departament)
                            <option value="{{$departament->id}}">D: {{$departament->name}} - C: {{$departament->cliente->name}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="modelo_id">Plataforma</label> <a href="/plataformas" target= _blank>+</a>
                        <select class="form-control" name="plataforma_id">
                          <option value="{{$abonado->plataforma_id}}">{{$abonado->plataforma->name}}</option>
                          @foreach ($plataformas as $plataforma)
                            <option value="{{$plataforma->id}}">{{$plataforma->name}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="modelo_id">Tipo de abonado</label> <a href="/abonado_types" target= _blank>+</a>
                        <select class="form-control" name="abonadotype_id">
                          <option value="{{$abonado->abonadotype_id}}">{{$abonado->abonadotype->name}}</option>
                          @foreach ($abonado_types as $abonado_type)
                            <option value="{{$abonado_type->id}}">{{$abonado_type->name}}</option>
                          @endforeach
                        </select>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="valor">Email</label>
                      <input type="email" class="form-control" id="email" value="{{$abonado->email}}" name="email" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="valor">Direccion</label>
                      <input type="text" class="form-control" id="direccion" value="{{$abonado->direccion}}" name="direccion" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="localidad">Localidad</label>
                      <input type="text" min="10" class="form-control" id="localidad" value="{{$abonado->localidad}}" name="localidad" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="partido">Partido</label>
                      <input type="partido" class="form-control" id="partido" value="{{$abonado->partido}}" name="partido" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="valor">Provincia</label>
                      <input type="text" class="form-control" id="direccion" value="{{$abonado->provincia}}" name="provincia" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="localidad">Codigo Postal</label>
                      <input type="number" min="1" class="form-control" id="cp" value="{{$abonado->cp}}" name="cp" required>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md">
                      <label for="comentario">Observaciónes</label>
                      <textarea rows="10" cols="50" type="text" class="form-control" id="comentario" name="comentario" >{{$abonado->comentario}} </textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-dark">Agregar</button>
                </form>
              </div>
        </div>
      </div>
  </div>

@endsection
