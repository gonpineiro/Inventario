@extends('layouts.administracion')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-8">
        <h3>Usuarios de los dispositivos</h3>
        <br>
        <table class="table table-hover" id="host-table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Email</th>
              <th scope="col">Afectado</th>
              @can ('userhosts.edit') <th scope="col">Editar</th> @endcan
            </tr>
          </thead>
          <tbody>
              @foreach ($users as $user)
                <tr>
                  <td>{{$user->id}}</td>
                  <td>{{$user->name}} {{$user->apellido}}</td>
                  <td>{{$user->email}}</td>
                  <td>D: {{$user->departament->name}} - C: {{$user->departament->cliente->name}}</td>
                  @can ('userhosts.edit') <td><a href="/edit_user_host/{{$user->id}}" ><img src={{asset("logos/edit-logo.png")}} style="width: 17px;"></a></td> @endcan
                </tr>
              @endforeach
          </tbody>
        </table>
      </div>

        @can('userhosts.create') <div class="col col-md-4"> @else @can ('userhosts.edit') <div class="col col-md-4"> @else <div class="col col-md-4" hidden> @endcan @endcan

         @if ($ver == "agregar") <h3>Agregar</h3> @endif
        @if ($ver == "editar") <h3>Modificando</h3> @endif
            <br>
        <div class="card">
            @if ($ver == "agregar") <div class="card-header">Agregar Usuario</div> @endif
            @if ($ver == "editar") <div class="card-header">Modificando {{$onlyUserHost->name}}</div> @endif
              <div class="card-body">
                @if ($ver == "agregar")
                  <form method="POST" action="/add_user_host">
                      @csrf
                      <div class="form-row">
                          <div class="form-group col-md-12">
                              <label for="line_phone">Apellido</label>
                              <input id="apellido" type="text" class="form-control" name="apellido" value="" required>
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-12">
                              <label for="line_phone">Nombre</label>
                              <input id="name" type="text" class="form-control" name="name" value="" required>
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-12">
                              <label for="cod_sim">Email</label>
                              <input id="email" type="email" class="form-control" name="email" value="" required>
                              @if ($errors->has('email'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-md-12">
                            <label for="name">Afectado</label>
                            <select class="form-control" name="departament" required>
                              <option value="">- - - Seleccione - - -</option>
                              <option disabled>Departamentos</option>
                              @foreach ($departaments as $departament)
                                <option value="{{$departament->id}}">D: {{$departament->name}} - C: {{$departament->cliente->name}}</option>
                              @endforeach
                            </select>
                          </div>
                      </div>
                      <button type="submit" class="btn btn-dark">Agregar</button>
                  </form>
                @endif

                @if ($ver == "editar")
                  <form method="POST" action="/update_user_host/{{$onlyUserHost->id}}">
                      @csrf
                      <div class="form-row">
                          <div class="form-group col-md-12">
                              <label for="line_phone">Apellido</label>
                              <input id="name" type="text" class="form-control" name="apellido" value="{{$onlyUserHost->apellido}}">
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-12">
                              <label for="line_phone">Nombre</label>
                              <input id="name" type="text" class="form-control" name="name" value="{{$onlyUserHost->name}}">
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-12">
                              <label for="cod_sim">Email</label>
                              <input id="email" type="email" class="form-control" name="email" value="{{$onlyUserHost->email}}">
                              @if ($errors->has('email'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-md-12">
                            <label for="name" >Departamento</label>
                            <select class="form-control" name="departament_id" required>
                              <option value={{$onlyUserHost->departament_id}}>D: {{$onlyUserHost->departament->name}} - C: {{$onlyUserHost->departament->cliente->name}}</option>
                              <option disabled>Departamento</option>
                              @foreach ($departaments as $departament)
                                <option value="{{$departament->id}}">D: {{$departament->name}} - C: {{$departament->cliente->name}}</option>
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
