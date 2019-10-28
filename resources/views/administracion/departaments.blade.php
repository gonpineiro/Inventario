@extends('layouts.administracion')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h1>Departamentos</h1>
          <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Departamento</th>
                <th scope="col">Cliente</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($departaments as $departament)
                  <tr>
                    <td>{{$departament->id}}</td>
                    <td>{{$departament->name}}</td>
                    <td>{{$departament->cliente->name}}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
      </div>

      <div class="col cl-6">
        <h1>Agregar departamento</h1>
        <div class="card">
            <div class="card-header">{{ __('Agregar') }}</div>
            <div class="card-body">
                <form method="POST" action="/add_departament">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="" required >
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="cliente_id" class="col-md-4 col-form-label text-md-right">{{ __('Cliente') }}</label>
                      <div class="col-md-6">
                        <select class="form-control" name="cliente_id" required>
                          @foreach ($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->name}}</option>
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
