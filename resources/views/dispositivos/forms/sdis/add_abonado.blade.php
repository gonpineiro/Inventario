@extends('layouts.app')

@section('content')
  <div class="container">

    <div class="row justify-content-md-center">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">Agregar Abonado</div>
            <div class="card-body">
                <form action="/add_abonado" method="post" name="form">
                  {{ csrf_field() }}
                  <div class="form-row">
                    <div class="form-group col-md-3">
                      <label for="type">Número</label>
                      <input type="text" class="form-control" id="numero" name="numero" required>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="cliente_id">Cliente</label>
                      <select class="form-control" name="cliente_id" >
                        <option value="">- - - Seleccione - - -</option>
                        @foreach ($clientes as $cliente)
                          <option value="{{$cliente->id}}">{{$cliente->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="type">Tipo</label>
                      <input type="text" class="form-control" id="type" name="type" required>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="email">Email</label>
                      <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                  </div>


                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="direccion">Direccion</label>
                      <input type="text"class="form-control" id="direccion" name="direccion" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="localidad">Localidad</label>
                      <input type="text" class="form-control" id="localidad" name="localidad" required>
                    </div>
                  </div>


                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="partido">Partido</label>
                      <input type="text" class="form-control" id="partido" name="partido" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="provincia">Provincia</label>
                      <input type="text"class="form-control" id="provincia" name="provincia" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="cp">Codigo Postal</label>
                      <input type="text" min="1" class="form-control" id="cp" name="cp" required>
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
