@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-8">
        <h3>Contraseñas abonado: {{$abonado->numero}}</h3>
        <br>

          <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Particion</th>
                <th scope="col">Contraseña</th>
                @can ('abonados.edit') <th scope="col">Editar</th> @endcan
              </tr>
            </thead>
            <tbody>
                @foreach ($passwordAbonados as $passwordAbonado)
                  <tr>
                    <td>{{$passwordAbonado->id}}</td>
                    <td>{{$passwordAbonado->particion}}</td>
                    <td>{{$passwordAbonado->password}}</td>
                    @can ('abonados.edit') <td><a href="/edit_password_abonado/{{$passwordAbonado->id}}" ><img src={{asset("logos/edit-logo.png")}} style="width: 17px;"></a></td> @endcan
                  </tr>
                @endforeach
            </tbody>
          </table>
      </div>
      @can('abonados.create') <div class="col col-md-4"> @else @can ('abonados.edit') <div class="col col-md-4"> @else <div class="col col-md-4" hidden> @endcan @endcan

        @if ($ver == "agregar") <h3>Agregar</h3> @endif
        @if ($ver == "editar") <h3>Modificando</h3> @endif
          <br>
        @can('abonados.create') <div class="card"> @else @can ('abonados.edit') <div class="card"> @else <div class="card" hidden> @endcan @endcan
          @if ($ver == "agregar") <div class="card-header">Agregar contraseña</div> @endif
          @if ($ver == "editar") <div class="card-header">Modificando {{$onlyAbonadoType->name}}</div> @endif
            <div class="card-body">

              @if ($ver == "agregar")
                <form method="POST" action="/create_password_abonado">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="line_phone">Abonado</label>
                            <input id="name" type="text" class="form-control" name="" value="{{$abonado->numero}}" disabled>
                            <input id="hidden" type="hidden" class="form-control" name="abonado_id" value="{{$abonado->id}}" >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="line_phone">Particion</label>
                            <input id="name" type="text" class="form-control" name="particion" value="" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="line_phone">Contraseña</label>
                            <input id="password" type="text" class="form-control" name="password" value="" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-dark">Agregar</button>
                </form>
              @endif

              @if ($ver == "editar")
                <form method="POST" action="/update_abonado_type/{{$onlyAbonadoType->id}}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="line_phone">Nombre</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{$onlyAbonadoType->name}}" >
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
