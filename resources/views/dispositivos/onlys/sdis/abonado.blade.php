@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-md-9">
      <div class="card">
        <div class="card-header">{{$abonado->numero}}</div>
        <div class="card-body">
          <form action="/edit_abonado/{{$abonado->id}}" method="get" name="form-edit">
            <div class="form-row">
              <div class="form-group col-md-2">
                <label for="name">Numero</label>
                <input type="text" class="form-control" value="{{$abonado->numero}}" readonly>
              </div>
              <div class="form-group col-md-4">
                <label for="modelo">Departamento/Cliente</label>
                <input type="text" class="form-control"
                  value="{{$abonado->departament->name}} - C: {{$abonado->departament->cliente->name}}" readonly>
              </div>
              <div class="form-group col-md-3">
                <label for="serial">Plataforma</label>
                <input type="text" class="form-control" value="{{$abonado->plataforma->name}}" readonly>
              </div>
              <div class="form-group col-md-3">
                <label for="serial">Tipo de abonado</label>
                <input type="text" class="form-control" value="{{$abonado->abonadotype->name}}" readonly>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="cctv">Email</label>
                <input type="text" class="form-control" value="{{$abonado->email}}" name="email" readonly>
              </div>
              <div class="form-group col-md-4">
                <label for="cctv">Direccion</label>
                <input type="text" class="form-control" value="{{$abonado->direccion}}" name="zona" readonly>
              </div>
              <div class="form-group col-md-2">
                <label for="cctv">Localidad</label>
                <input type="text" class="form-control" value="{{$abonado->localidad}}" name="zona" readonly>
              </div>
              <div class="form-group col-md-2">
                <label for="cctv">Teléfono</label>
                <input type="text" class="form-control" value="{{$abonado->telefono}}" name="telefono" readonly>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="cctv">Partido</label>
                <input type="text" class="form-control" value="{{$abonado->partido}}" name="zona" readonly>
              </div>
              <div class="form-group col-md-3">
                <label for="cctv">Povincia</label>
                <input type="text" class="form-control" value="{{$abonado->provincia}}" name="zona" readonly>
              </div>
              <div class="form-group col-md-3">
                <label for="cctv">Código Postal</label>
                <input type="text" class="form-control" value="{{$abonado->cp}}" name="zona" readonly>
              </div>
              <div class="form-group col-md-3">
                <label for="palabra_clave">Palabra clave</label>
                <input type="text" class="form-control" value="{{$abonado->palabra_clave}}" name="palabra_clave"
                  readonly>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md">
                <label for="comentario">Observaciónes</label>
                <textarea rows="10" cols="50" type="text" class="form-control"
                  readonly>{{$abonado->comentario}} </textarea>
              </div>
            </div>

            @can ('abonados.edit') <button class="btn btn-dark">Modificar</button> @endcan
          </form>
        </div>
      </div>
      <br>
      @can ('abonados.show')
      <div class="card">
        <div class="card-header">Contraseñas/Particiones
          <a href="/passwords_abonado/{{$abonado->id}}" target=_blank> +</a>
        </div>
        <div class="card-body">
          <div class="col cl-6">
            <table class="table table-hover" id="host-table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Particion</th>
                  <th scope="col">Contraseña</th>
                  <th scope="col">Editar</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($password_abonados as $password_abonado)
                <tr>
                  <td>{{$password_abonado->id}}</td>
                  <td>{{$password_abonado->particion}}</td>
                  <td>{{$password_abonado->password}}</td>
                  @can ('abonados.edit')
                  <td><a href="/edit_password_abonado/{{$password_abonado->id}}"><img
                        src={{asset("logos/edit-logo.png")}} class="accion_logo"></a>
                  </td>
                  @endcan
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <script>
          $(document).ready(function() {
                   $('#host-table').DataTable({
                     "order": [[ 0, "desc" ]]
                   });
                     } );
        </script>
      </div>
      @endcan
    </div>
  </div>
</div>
@endsection