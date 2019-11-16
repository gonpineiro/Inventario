@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-8">
          <h3>Credenciales</h3>
          <br>
          <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">Usuario</th>
                <th scope="col">Password</th>
                <th scope="col">Tipo</th>
                <th scope="col">Dispositivo</th>
                <th scope="col">Observacion</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($creds as $cred)
                  @if ($cred->host->host_type_id == 10 || $cred->host->host_type_id == 11 || $cred->host->host_type_id == 12 || $cred->host->host_type_id == 13)
                  <tr>
                    <td>{{$cred->username}}</td>
                    <td>{{$cred->password}}</td>
                    <td>{{$cred->type}}</td>
                    <td>
                      @if ($cred->host->host_type_id == 10)  @can ('modems.only') <a href="/only_modem/{{$cred->host_id}}"> @endcan {{$cred->host->name}}</a> @endif
                      @if ($cred->host->host_type_id == 11)  @can ('routes.only') <a href="/only_router/{{$cred->host_id}}"> @endcan {{$cred->host->name}}</a> @endif
                      @if ($cred->host->host_type_id == 12)  @can ('switchs.only') <a href="/only_switch/{{$cred->host_id}}"> @endcan {{$cred->host->name}}</a> @endif
                      @if ($cred->host->host_type_id == 13)  @can ('accespoints.only') <a href="/only_accespoint/{{$cred->host_id}}"> @endcan {{$cred->host->name}}</a> @endif
                    </td>
                    <td>{{$cred->comentario}}</td>
                  </tr>
                  @endif
                @endforeach
            </tbody>
          </table>
      </div>
      @can('crednets.create') <div class="col-md-4 cl-4"> @else @can ('crednets.edit') <div class="col-md-4 cl-4"> @else <div class="col-md-4 cl-4" hidden> @endcan @endcan


       @if ($ver == "agregar") <h3>Agregar</h3> @elseif ($ver == "editar") @endif
        <br>
          <div class="card">
            <div class="card-header">{{ __('Agregar') }}</div>
            <div class="card-body">
                @if ($ver == "agregar")
                  <form method="POST" action="/add_cred_net">
                      @csrf
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="name" >Usuario</label>
                          <input id="username" type="text" class="form-control" name="username" value="" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                            <label for="type">Tipo</label>
                            <input id="type" type="text" class="form-control" name="type" value="" required>
                        </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-md-12">
                              <label for="password">Password</label>
                              <input id="password" type="text" class="form-control" name="password" value="" required>
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-md-12">
                            <label for="name" >Dispositivo</label>
                            @if (isset($id))
                              <input id="host_id" type="text" class="form-control" name="descrp" value="{{$host->name}}" disabled>
                              <input id="name" type="text" class="form-control" name="host_id" value="{{$host->id}}" hidden>
                            @else
                              <select class="form-control" name="host_id" required>
                                <option value="">- - - Seleccione - - -</option>
                                @foreach ($hosts as $host)
                                  <option value="{{$host->id}}">{{$host->name}} - {{$host->departament->cliente->name}}</option>
                                @endforeach
                              </select>
                            @endif
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-md-12">
                              <label for="name" class=>Observación</label>
                              <input id="name" type="text" class="form-control" name="comentario" value="" required>
                          </div>
                      </div>
                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-dark">
                                  {{ __('Agregar') }}
                              </button>
                          </div>
                      </div>
                  </form>
                @endif
                @if ($ver == "editar")
                  <form method="POST" action="/update_cred_net/{{$onlyCred->id}}">
                      @csrf
                      <div class="form-group row">
                          <div class="col-md-12">
                            <label for="name" >Usuario</label>
                            <input id="username" type="text" class="form-control" name="username" value="{{$onlyCred->username}}" required>
                          </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                            <label for="name">Tipo</label>
                            <input id="name" type="text" class="form-control" name="type" value="{{$onlyCred->type}}" required>
                        </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-md-12">
                              <label for="name">Password</label>
                              <input id="name" type="text" class="form-control" name="password" value="{{$onlyCred->password}}" required>
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-md-12">
                              <label for="name">Dispositivo</label>
                              <input id="name" type="text" class="form-control" name="" value="{{$onlyCred->host->name}}" disabled>
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-md-12">
                              <label for="name" class=>Observación</label>
                              <input id="name" type="text" class="form-control" name="comentario" value="{{$onlyCred->comentario}}" required>
                          </div>
                      </div>

                      <div class="form-group row mb-0">
                          <div class="col-md-6">
                              <button type="submit" class="btn btn-dark">
                                  {{ __('Modificar') }}
                              </button>
                          </div>
                      </div>
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
