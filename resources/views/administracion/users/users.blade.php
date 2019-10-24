@extends('layouts.administracion')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h1>Usuarios</h1>
          <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Rol</th>
                <th scope="col">Editar</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                  <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->roles[0]->name}}</td>
                    <td><a href="/edit_user/{{$user->id}}" ><img src={{asset("logos/edit-logo.png")}} style="width: 17px;"></a></td>
                  </tr>
                @endforeach
            </tbody>
          </table>
      </div>
      <div class="col col-md-4">
        @if ($ver == "agregar") <h1>Agregar</h1> @endif
        @if ($ver == "editar") <h1>Modificando</h1> @endif
        <div class="card">
          @if ($ver == "agregar") <div class="card-header">Agregar Usuario</div> @endif
          @if ($ver == "editar") <div class="card-header">Modificando {{$onlyUser->name}}</div> @endif
            <div class="card-body">
              @if ($ver == "agregar")
                <form method="POST" action="/create_user">
                    @csrf
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
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="line_phone">Password</label>
                            <input id="password" type="text" class="form-control" name="password" value="" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                          <label for="name" >Roles</label>
                          <select class="form-control" name="role" required>
                            <option value="">- - - Seleccione - - -</option>
                            @foreach ($roles as $role)
                              <option value="{{$role->id}}">{{$role->name}} </option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark">Agregar</button>
                </form>
              @endif
              @if ($ver == "editar")
                <form method="POST" action="/update_user/{{$onlyUser->id}}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="line_phone">Nombre</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{$onlyUser->name}}" >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="cod_sim">Email</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{$onlyUser->email}}" >
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="line_phone">Password</label>
                            <input id="password" type="text" class="form-control" name="password" value="" >
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                          <label for="name" >Rol</label>
                          <select class="form-control" name="role" required>
                            <option value={{$rol->id}}>{{$rol->name}} </option>
                            <option disabled>Roles</option>
                            @foreach ($roles as $role)
                              <option value="{{$role->id}}">{{$role->name}} </option>
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
