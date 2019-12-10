@extends('layouts.administracion')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h3>Modelos</h3>
        <br>
        <table class="table table-hover" id="host-table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Marca</th>
              <th scope="col">Tipo</th>
              @can ('marcas.edit') <th scope="col">Editar</th> @endcan
            </tr>
          </thead>
          <tbody>
              @foreach ($modelos as $modelo)
                <tr>
                  <td>{{$modelo->id}}</td>
                  <td>{{$modelo->name}}</td>
                  <td>{{$modelo->marca->name}}</td>
                  <td>{{$modelo->host_type->name}}</td>
                  @can ('marcas.edit') <td><a href="/edit_modelo/{{$modelo->id}}" ><img src={{asset("logos/edit-logo.png")}} style="width: 17px;"></a></td> @endcan
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>



          @can('marcas.create') <div class="col col-md-4"> @else @can ('marcas.edit') <div class="col col-md-4"> @else <div class="col col-md-4" hidden> @endcan @endcan

           @if ($ver == "agregar") <h3>Agregar</h3> @endif
           @if ($ver == "editar") <h3>Modificando</h3> @endif
            <br>

            <div class="card">
            @if ($ver == "agregar") <div class="card-header">Agregar Usuario</div> @endif
            @if ($ver == "editar") <div class="card-header">Modificando {{$onlyModelo->name}}</div> @endif
              <div class="card-body">

                @if ($ver == "agregar")
                  <form method="POST" action="/add_modelo">
                      @csrf
                      <div class="form-row">
                          <div class="form-group col-md-12">
                              <label for="name">Modelo</label>
                              <input id="name" type="text" class="form-control" name="name" value="" required>
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-12">
                              <label for="marca">Marca</label>
                              <input id="marca" type="text" class="form-control" name="marca" value="" required>
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-md-12">
                            <label for="name">Tipo</label>
                            <select class="form-control" name="host_type_id" required>
                              <option value="">- - - Seleccione - - -</option>
                              <option disabled>Tipos de dispositivos</option>
                              @foreach ($host_types as $host_type)
                                <option value="{{$host_type->id}}">{{$host_type->name}}</option>
                              @endforeach
                            </select>
                          </div>
                      </div>
                      <button type="submit" class="btn btn-dark">Agregar</button>
                  </form>
                @endif

                @if ($ver == "editar")
                  <form method="POST" action="/update_modelo/{{$onlyModelo->id}}">
                      @csrf
                      <div class="form-row">
                          <div class="form-group col-md-12">
                              <label for="name">Modelo</label>
                              <input id="name" type="text" class="form-control" name="name" value="{{$onlyModelo->name}}">
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-12">
                              <label for="marca">Marca</label>
                              <input id="marca" type="text" class="form-control" name="marca" value="{{$onlyModelo->marca}}">
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-md-12">
                            <label for="name">Tipo</label>
                            <select class="form-control" name="host_type_id" required>
                              <option value={{$onlyModelo->host_type_id}}>{{$onlyModelo->host_type->name}}</option>
                              <option disabled>Departamento</option>
                              @foreach ($host_types as $host_type)
                                <option value="{{$host_type->id}}">{{$host_type->name}}</option>
                              @endforeach
                            </select>
                          </div>
                      </div>
                      <button type="submit" class="btn btn-dark">Modificar</button>
                  </form>
                @endif
              </div>

          </div>
        </div>




      <script >
              $(document).ready(function() {
              $('#host-table').DataTable({
                "order": [[ 0, "desc" ]]
              });
                } );
      </script>
    </div>
</div>
@endsection
