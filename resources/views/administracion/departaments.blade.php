@extends('layouts.administracion')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h3>Departamentos</h3>
        <br>
        <table class="table table-hover" id="host-table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Departamento</th>
              <th scope="col">Cliente</th>
              @can ('departaments.edit') <th scope="col">Editar</th> @endcan
            </tr>
          </thead>
          <tbody>
              @foreach ($departaments as $departament)
                <tr>
                  <td>{{$departament->id}}</td>
                  <td>{{$departament->name}}</td>
                  <td>{{$departament->cliente->name}}</td>
                  @can ('departaments.edit') <td><a href="/edit_departament/{{$departament->id}}" ><img src={{asset("logos/edit-logo.png")}} style="width: 17px;"></a></td> @endcan
                </tr>
              @endforeach
          </tbody>
        </table>
      </div>

      @can('departaments.create') <div class="col col-md-4"> @else @can ('departaments.edit') <div class="col col-md-4"> @else <div class="col col-md-4" hidden> @endcan @endcan

       @if ($ver == "agregar") <h3>Agregar</h3> @endif
       @if ($ver == "editar") <h3>Modificando</h3> @endif
      <br>
      <div class="card">
        @if ($ver == "agregar") <div class="card-header">Agregar Departamento</div> @endif
        @if ($ver == "editar") <div class="card-header">Modificando {{$departament->name}}</div> @endif
          <div class="card-body">
            @if ($ver == "agregar")
              <form method="POST" action="/add_departament">
                  @csrf
                  <div class="form-row">
                      <div class="form-group col-md-12">
                          <label for="name">Nombre</label>
                          <input id="name" type="text" class="form-control" name="name" value="" required>
                      </div>
                  </div>
                  <div class="form-group row">
                      <div class="col-md-12">
                        <label for="name">Cliente</label>
                        <select class="form-control" name="cliente_id" required>
                          <option value="">- - - Seleccione - - -</option>
                          <option disabled>Clientes</option>
                          @foreach ($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->name}}</option>
                          @endforeach
                        </select>
                      </div>
                  </div>
                  <button type="submit" class="btn btn-dark">Agregar</button>
              </form>
            @endif

            @if ($ver == "editar")
              <form method="POST" action="/update_departament/{{$onlyDerpartament->id}}">
                  @csrf
                  <div class="form-row">
                      <div class="form-group col-md-12">
                          <label for="name">Nombre</label>
                          <input id="name" type="text" class="form-control" name="name" value="{{$onlyDerpartament->name}}">
                      </div>
                  </div>
                  <div class="form-group row">
                      <div class="col-md-12">
                        <label for="name" >Cliente</label>
                        <select class="form-control" name="cliente_id" required>
                          <option value={{$onlyDerpartament->cliente_id}}>{{$onlyDerpartament->cliente->name}}</option>
                          <option disabled>Clientes</option>
                          @foreach ($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->name}}</option>
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
              $('#host-table').DataTable();
                } );
      </script>
    </div>
</div>
@endsection
