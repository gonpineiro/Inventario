@extends('layouts.administracion')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
        <h1>Clientes </h1>
          <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                  <tr>
                    <td>{{$cliente->id}}</td>
                    <td>{{$cliente->name}}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
      </div>
      @can ('clients.create')
      <div class="col cl-6">
        <h1>Agregar cliente</h1>
        <div class="card">
            <div class="card-header">{{ __('Registrar') }}</div>
            <div class="card-body">
                <form method="POST" action="/add_cliente">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="" required>
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
      @endcan
      <script >
              $(document).ready(function() {
              $('#host-table').DataTable();
                } );
      </script>
    </div>
</div>
@endsection
