@extends('layouts.administracion')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h1>Modelos</h1>
          <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Marca</th>
                <th scope="col">Tipo</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($modelos as $modelo)
                  <tr>
                    <td>{{$modelo->id}}</td>
                    <td>{{$modelo->name}}</td>
                    <td>{{$modelo->marca}}</td>
                    <td>{{$modelo->host_type->name}}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
      </div>

      <div class="col cl-6">
        <h1>Agregar modelo</h1>
        <div class="card">
            <div class="card-header">{{ __('Agregar') }}</div>

            <div class="card-body">
                <form method="POST" action="/add_model">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Modelo') }}</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name" placeholder="" required>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="marca" class="col-md-4 col-form-label text-md-right">{{ __('Marca') }}</label>

                        <div class="col-md-6">
                          <input type="text" class="form-control" id="marca" name="marca" placeholder="" required>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Tipo') }}</label>

                        <div class="col-md-6">
                          <select class="form-control" name="host_type_id">
                            @foreach ($host_types as $host_type)
                              <option value="{{$host_type->id}}">{{$host_type->name}}</option>
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
      </div>
      <script >
              $(document).ready(function() {
              $('#host-table').DataTable();
                } );
      </script>
    </div>
</div>
@endsection
