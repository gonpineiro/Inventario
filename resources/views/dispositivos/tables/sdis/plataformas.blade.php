@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-8">
        <h3>Plataformas</h3>
        <br>
          <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                @can ('abonados.edit') <th scope="col">Editar</th> @endcan
              </tr>
            </thead>
            <tbody>
                @foreach ($plataformas as $plataforma)
                  <tr>
                    <td>{{$plataforma->id}}</td>
                    <td>{{$plataforma->name}}</td>
                    @can ('abonados.edit') <td><a href="/edit_plataforma/{{$plataforma->id}}" ><img src={{asset("logos/edit-logo.png")}} style="width: 17px;"></a></td> @endcan
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
          @if ($ver == "agregar") <div class="card-header">Agregar Plataforma</div> @endif
          @if ($ver == "editar") <div class="card-header">Modificando {{$onlyPlataforma->name}}</div> @endif
            <div class="card-body">

              @if ($ver == "agregar")
                <form method="POST" action="/create_plataforma">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="line_phone">Nombre</label>
                            <input id="name" type="text" class="form-control" name="name" value="" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-dark">Agregar</button>
                </form>
              @endif

              @if ($ver == "editar")
                <form method="POST" action="/update_plataforma/{{$onlyPlataforma->id}}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="line_phone">Nombre</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{$onlyPlataforma->name}}" >
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
