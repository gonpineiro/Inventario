@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-9">
          <div class="card">
            <div class="card-header">{{$host->name}}</div>
              <div class="card-body">
                <form action="/edit_modem/{{$host->id}}" method="get" name="form-edit">
                  <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Nombre</label>
                        <input type="text" class="form-control" id="estad" placeholder="{{$host->name}}" disabled>
                      </div>
                      <div class="form-group col-md-4">
                         <label for="modelo">Modelo</label>
                         <input type="text" class="form-control" id="modelo" placeholder="{{$host->modelo->name}}" disabled>
                       </div>
                      <div class="form-group col-md-4">
                       <label for="serial">Serial</label>
                       <input type="text" class="form-control" id="serial" placeholder="{{$host->serial}}" disabled>
                     </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                     <label for="mac_adress">Mac address</label>
                     <input type="text" class="form-control" id="mac_adress" placeholder="{{$host->mac_adress}}" disabled>
                   </div>
                    <div class="form-group col-md-6">
                     <label for="ip_publica">Ip publica</label>
                     <input type="text" class="form-control" id="ip_publica" placeholder="{{$host->ip_publica}}" disabled>
                   </div>
                 </div>
                 <div class="form-row">
                   <div class="form-group col-md-4">
                     <label for="departament">Afectado</label>
                     <input type="text" class="form-control" id="inputPassword4" placeholder="D: {{$host->departament->name}} - C: {{$host->departament->cliente->name}}" disabled>
                   </div>
                   <div class="form-group col-md-4">
                     <label for="valor">Valor</label>
                     <input type="text" class="form-control" id="inputPassword4" placeholder="{{$host->valor}}" disabled>
                   </div>
                   <div class="form-group col-md-4">
                     <label for="serial">Estado</label>
                     <input type="text" class="form-control" id="estado" placeholder={{$host->estado->name}} disabled>
                   </div>
                 </div>
                 <div class="form-row">
                       <div class="form-group col-md">
                         <label for="comentario">Observaciónes</label>
                         <textarea rows="10" cols="50" type="text" class="form-control" id="comentario" disabled >{{$host->comentario}} </textarea>
                        </div>
                 </div>
                @can ('modems.edit')  <button type="" href="/edit/{{$host->id}}" class="btn btn-dark">Modificar</button>@endcan
                </form>
              </div>
            </div>
            <br/>
            @can ('crednets.show')
            <div class="card">
              <div class="card-header">Credenciales @can ('crednets.create') <a href="/form_cred_net/{{$host->id}}">+</a></div> @endcan
                <div class="card-body">
                  <div class="col cl-6">
                      <table class="table table-hover" id="host-table">
                        <thead>
                          <tr>
                            <th scope="col">Usuario</th>
                            <th scope="col">Password</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Obs</th>
                            @can ('crednets.edit') <th scope="col">Editar</th> @endcan
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($creds as $cred)
                              <tr>
                                <td>{{$cred->username}}</td>
                                <td>{{$cred->password}}</td>
                                <td>{{$cred->type}}</td>
                                <td>{{$cred->comentario}}</td>
                                @can ('crednets.edit') <td><a href="/edit_cred_net/{{$cred->id}}" target="_blank"><img src={{asset("logos/edit-logo.png")}} style="width: 17px;"></a></td>  @endcan
                              </tr>
                        @endforeach
                        </tbody>
                      </table>
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
              <br>
              @endcan

          @can ('hostworks.create')
          <div class="card">
            <div class="card-header">Agregar registro de trabajo</div>
              <div class="card-body">
                <form action="/add_work/{{$host->id}}" method="post" name="form-edit">
                  {{ csrf_field() }}
                  <div class="form-row">
                    <div class="form-group col-md-3">
                      <label for="modelo">Fecha</label>
                      <input type="date" class="form-control" id="fecha" name="fecha" required>
                    </div>
                    <div class="form-group col-md-9">
                      <label for="serial">Trabajo </label>
                      <input type="text" class="form-control" id="trabajo" name="trabajo" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md">
                      <label for="comentario">Observación</label>
                      <textarea rows="5" cols="50" type="text" class="form-control" id="comentario" name="comentario" required></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-dark">Agregar</button>
                </form>
              </div>
            </div>
            <br/>
            @endcan

            @can ('hostworks.show')
            <div class="card">
              <div class="card-header">Registros de trabajo</div>
                <div class="card-body">
                  <div class="col cl-6">
                      <table class="table table-hover" id="host-work">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Trabajo</th>
                            <th scope="col">Obs</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($hostworks as $hostwork)
                              <tr>
                                <td>{{$hostwork->id}}</td>
                                <td>{{$hostwork->fecha->format('d/m/Y')}}</td>
                                <td>{{$hostwork->trabajo}}</td>
                                <td>{{$hostwork->comentario}}</td>
                              </tr>
                        @endforeach
                        </tbody>
                      </table>
                  </div>
                </div>
                <script >
                    $(document).ready(function() {
                    $('#host-work').DataTable({
                      "order": [[ 0, "desc" ]]
                    });
                      } );
                </script>
              </div>
              <br/>
              @endcan

              <div class="card">
                <div class="card-header text-center">QR</div>
                  <div class="card-body">
                    <div class="col md-6 text-center">
                    {!!  QrCode :: size (250) -> generate(env('APP_QR') . $_SERVER["REQUEST_URI"]);    !!}
                    </div>
                    <div class="col md-6 text-center">
                    {{$host->id}}  -  {{$host->name}}
                    </div>
                  </div>
                </div>
      </div>


@endsection
