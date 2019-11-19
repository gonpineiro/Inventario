@extends('layouts.administracion')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h3>Clientes</h3>
        <br>
        <table class="table table-hover" id="host-table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              @can ('clients.edit') <th scope="col">Editar</th> @endcan
            </tr>
          </thead>
          <tbody>
              @foreach ($clientes as $cliente)
                <tr>
                  <td>{{$cliente->id}}</td>
                  <td>{{$cliente->name}}</td>
                  @can ('clients.edit') <td><a href="/edit_cliente/{{$cliente->id}}" ><img src={{asset("logos/edit-logo.png")}} style="width: 17px;"></a></td> @endcan
                </tr>
              @endforeach
          </tbody>
        </table>
      </div>


          @can('clients.create') <div class="col col-md-4"> @else @can ('clients.edit') <div class="col col-md-4"> @else <div class="col col-md-4" hidden> @endcan @endcan

           @if ($ver == "agregar") <h3>Agregar</h3> @endif
           @if ($ver == "editar") <h3>Modificando</h3> @endif
          <br>
          <div class="card">
            @if ($ver == "agregar") <div class="card-header">Agregar Cliente</div> @endif
            @if ($ver == "editar") <div class="card-header">Modificando {{$cliente->name}}</div> @endif
              <div class="card-body">
                @if ($ver == "agregar")
                  <form method="POST" action="/add_cliente">
                      @csrf
                      <div class="form-row">
                          <div class="form-group col-md-12">
                              <label for="name">Nombre</label>
                              <input id="name" type="text" class="form-control" name="name" value="" required>
                          </div>
                      </div>
                      <button type="submit" class="btn btn-dark">Agregar</button>
                  </form>
                @endif

                @if ($ver == "editar")
                  <form method="POST" action="/update_cliente/{{$onlyCliente->id}}">
                      @csrf
                      <div class="form-row">
                          <div class="form-group col-md-12">
                              <label for="name">Nombre</label>
                              <input id="name" type="text" class="form-control" name="name" value="{{$onlyCliente->name}}">
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
