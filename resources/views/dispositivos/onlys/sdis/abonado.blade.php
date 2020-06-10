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
                          <input type="text" class="form-control" id="numero" placeholder={{$abonado->numero}} disabled>
                      </div>
                      <div class="form-group col-md-4">
                          <label for="modelo">Departamento/Cliente</label>
                          <input type="text" class="form-control" id="cliente" placeholder={{$abonado->departament->name}} / {{$abonado->departament->cliente->name}} disabled>
                      </div>
                      <div class="form-group col-md-3">
                          <label for="serial">Plataforma</label>
                          <input type="text" class="form-control" id="type" placeholder={{$abonado->plataforma->name}} disabled>
                      </div>
                      <div class="form-group col-md-3">
                          <label for="serial">Tipo de abonado</label>
                          <input type="text" class="form-control" id="type" placeholder={{$abonado->abonadotype->name}} disabled>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="cctv">Email</label>
                        <input type="text" class="form-control" id="cctv" placeholder="{{$abonado->email}}"  name="email" disabled>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="cctv">Direccion</label>
                        <input type="text" class="form-control" id="cctv" placeholder="{{$abonado->direccion}}"  name="zona" disabled>
                      </div>
                      <div class="form-group col-md-2">
                        <label for="cctv">Localidad</label>
                        <input type="text" class="form-control" id="cctv" placeholder="{{$abonado->localidad}}"  name="zona" disabled>
                      </div>
                      <div class="form-group col-md-2">
                        <label for="cctv">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" placeholder="{{$abonado->telefono}}"  name="telefono" disabled>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label for="cctv">Partido</label>
                        <input type="text" class="form-control" id="cctv" placeholder="{{$abonado->partido}}" name="zona" disabled>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="cctv">Povincia</label>
                        <input type="text" class="form-control" id="cctv" placeholder="{{$abonado->provincia}}"  name="zona" disabled>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="cctv">Código Postal</label>
                        <input type="text" class="form-control" id="cctv" placeholder="{{$abonado->cp}}"  name="zona" disabled>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="palabra_clave">Palabra clave</label>
                        <input type="text" class="form-control" id="cctv" placeholder="{{$abonado->palabra_clave}}" name="palabra_clave" disabled>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md">
                        <label for="comentario">Observaciónes</label>
                        <textarea rows="10" cols="50" type="text" class="form-control" id="comentario" disabled >{{$abonado->comentario}} </textarea>
                      </div>
                    </div>
                    @can ('abonados.edit') <button class="btn btn-dark">Modificar</button> @endcan
                </form>
             </div>
           </div>

        @can ('abonados.show')
        <div class="card">
         <div class="card-header">Contraseñas/Particiones <a href="/passwords_abonado/{{$abonado->id}}" target= _blank> + </a> </div>
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
                           @can ('abonados.edit') <td><a href="/edit_password_abonado/{{$password_abonado->id}}" ><img src={{asset("logos/edit-logo.png")}} style="width: 17px;"></a></td> @endcan
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
         <br/>
         @endcan

      </div>


@endsection
