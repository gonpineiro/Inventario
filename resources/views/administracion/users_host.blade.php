@extends('layouts.administracion')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h1>Usuarios de los dispositivos</h1>
          <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Afectado</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                  <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}} {{$user->apellido}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->departament->name}} - {{$user->departament->cliente->name}}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
      </div>
      @can ('userhosts.create')
      <div class="col cl-6">
        <h1>Agregar Usuario</h1>
        <div class="card">
            <div class="card-header">{{ __('Registrar') }}</div>

            <div class="card-body">
                <form method="POST" action="/add_user_host">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>
                        <div class="col-md-6">
                            <input id="apellido" type="text" class="form-control" name="apellido" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Afectado') }}</label>
                        <div class="form-group col-md-6">
                            <select class="form-control" name="departament" required>
                              @foreach ($departaments as $departament)
                                <option value="{{$departament->id}}">{{$departament->name}} - {{$departament->cliente->name}}</option>
                              @endforeach
                            </select>
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
            </div>
        </div>
        <script >
                $(document).ready(function() {
                $('#host-table').DataTable();
                  } );
        </script>
    </div>
    @endcan
</div>


@endsection
