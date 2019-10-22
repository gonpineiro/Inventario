@extends('layouts.app')

@section('content')
  <div class="container">

    <div class="row ">
      <div class="col-md-8 ">
        <form action="/add_cliente" method="post" name="form">
          {{ csrf_field() }}
          <h1>Agregar Cliente</h1>
          </br>
          <div class="form-row">

            <div class="form-group col-md-3">
              <label for="serial">Nombre</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="" required>
            </div>
          </div>




          <button type="submit" class="btn btn-dark">Agregar Cliente</button>
        </form>
      </div>

  </div>
  </div>




@endsection
