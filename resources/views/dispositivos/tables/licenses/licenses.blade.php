@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-8">
        <h3>Licencias</h3>
        <br>
          <table class="table table-hover" id="host-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Key</th>
                <th scope="col">Factura</th>
                <th scope="col">Fecha</th>
                <th scope="col">Instalado</th>
                @can ('licensekey.edit') <th scope="col">Editar</th> @endcan
              </tr>
            </thead>
            <tbody>
                @foreach ($licenses as $license)
                  <tr>
                    <td>{{$license->id}}</td>
                    <td>{{$license->key}}</td>
                    <td>{{$license->fc}}</td>
                    <td>{{$license->created_at->format('d/m/Y')}}</td>
                    <td>
                      @can ('computadoras.only','notebooks.only')
                        @if (isset($license->host->host_type->id) and $license->host->host_type->id == 1)
                          <a href="/only_computadora/{{$license->host->id}}"> {{$license->host->name}}
                        @elseif (isset($license->host->host_type->id) and $license->host->host_type->id == 2)
                          <a href="/only_notebook/{{$license->host->id}}"> {{$license->host->name}}
                        @endif
                      @endcan
                    </td>
                    @can ('licensekey.edit') <td><a href="/edit_license/{{$license->id}}" ><img src={{asset("logos/edit-logo.png")}} style="width: 17px;"></a></td> @endcan
                  </tr>
                @endforeach
            </tbody>
          </table>
      </div>
      @can('licensekey.create') <div class="col col-md-4"> @else @can ('users.edit') <div class="col col-md-4"> @else <div class="col col-md-4" hidden> @endcan @endcan

        @if ($ver == "agregar") <h3>Agregar</h3> @endif
        @if ($ver == "editar") <h3>Modificando</h3> @endif
          <br>
        @can('licensekey.create') <div class="card"> @else @can ('licensekey.edit') <div class="card"> @else <div class="card" hidden> @endcan @endcan
          @if ($ver == "agregar") <div class="card-header">Agregar Licencia</div> @endif
          @if ($ver == "editar") <div class="card-header">Modificando Licencia</div> @endif
            <div class="card-body">
              @if ($ver == "agregar")
                <form method="POST" action="/create_license">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="line_phone">Key</label>
                            <input id="key" type="text" class="form-control" name="key" value="" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="line_phone">Factura</label>
                            <input id="fc" type="text" class="form-control" name="fc" value="" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="line_phone">Tipo</label>
                            <input id="type" type="text" class="form-control" name="type" value="" required>
                        </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="fecha">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" required>
                      </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                          <label for="name">Dispositivo</label>
                          <select class="form-control" name="host_id" required>
                            <option disabled>Computadora</option>
                            <option value=""></option>
                            @foreach ($computadoras as $computadora)
                              <option value="{{$computadora->id}}">{{$computadora->name}} @if (!is_null($computadora->user_host)) - U: {{$computadora->user_host->apellido}} {{$computadora->user_host->name}} - D: {{$computadora->user_host->departament->name}} - D:{{$computadora->user_host->departament->name}} - C: {{$computadora->user_host->departament->cliente->name}} @endif </option>
                            @endforeach
                            <option disabled>Notebooks</option>
                            @foreach ($notebooks as $notebook)
                              <option value="{{$notebook->id}}">{{$notebook->name}} @if (!is_null($notebook->user_host)) - U: {{$notebook->user_host->apellido}} {{$notebook->user_host->name}} - D: {{$notebook->user_host->departament->name}} - D:{{$notebook->user_host->departament->name}} - C: {{$notebook->user_host->departament->cliente->name}} @endif </option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark">Agregar</button>
                </form>
              @endif

              @if ($ver == "editar")
                <form method="POST" action="/update_license/{{$onlyLicense->id}}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="key">Key</label>
                            <input id="key" type="text" class="form-control" name="key" value="{{$onlyLicense->key}}" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="cod_sim">Factura</label>
                            <input id="fc" type="text" class="form-control" name="fc" value="{{$onlyLicense->fc}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="line_phone">Tipo</label>
                            <input id="type" type="text" class="form-control" name="type" value="" >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="line_phone">Dispositivo</label>
                            <input id="host_id" type="text" class="form-control" name="host_id" value="{{$onlyLicense->host->name}}" disabled>
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
