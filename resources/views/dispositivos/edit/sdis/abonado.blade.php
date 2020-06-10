@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">Modificando {{$abonado->numero}}</div>
          <div class="card-body">
            <form action="/update_abonado/{{$abonado->id}}" method="post" name="form">
              {{ csrf_field() }}
              <div class="form-row">
                <div class="form-group col-md-2">
                  <label for="name">Número</label>
                  <input type="text" class="form-control" name="numero" value="{{$abonado->numero}}" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="modelo_id">Departamento/Cliente</label>
                    <select class="form-control" name="departament_id">
                      <option value="{{$abonado->departament_id}}">{{$abonado->departament->name}}</option>
                      @foreach ($departaments as $departament)
                        <option value="{{$departament->id}}">{{$departament->name}} - C: {{$departament->cliente->name}}</option>
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
                  <input type="email" class="form-control" value="{{$abonado->email}}" name="email" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="valor">Direccion</label>
                  <input type="text" class="form-control" value="{{$abonado->direccion}}" name="direccion" required>
                </div>
                <div class="form-group col-md-2">
                  <label for="localidad">Localidad</label>
                  <input type="text" min="10" class="form-control" value="{{$abonado->localidad}}" name="localidad" required>
                </div>
                <div class="form-group col-md-2">
                  <label for="localidad">Teléfono</label>
                  <input type="number" min="10000" class="form-control" value="{{$abonado->telefono}}" name="telefono" required>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="partido">Partido</label>
                  <input type="partido" class="form-control" value="{{$abonado->partido}}" name="partido" required>
                </div>
                <div class="form-group col-md-3">
                  <label for="valor">Provincia</label>
                  <input type="text" class="form-control" value="{{$abonado->provincia}}" name="provincia" required>
                </div>
                <div class="form-group col-md-3">
                  <label for="localidad">Código Postal</label>
                  <input type="number" min="1" class="form-control" value="{{$abonado->cp}}" name="cp" required>
                </div>
                <div class="form-group col-md-3">
                  <label for="palabra_clave">Palabra clave</label>
                  <input type="palabra_clave" class="form-control" value="{{$abonado->palabra_clave}}" name="palabra_clave" required>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md">
                  <label for="comentario">Observaciónes</label>
                  <textarea rows="10" cols="50" type="text" class="form-control" name="comentario" >{{$abonado->comentario}} </textarea>
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
