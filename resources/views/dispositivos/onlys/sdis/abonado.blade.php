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
                      <div class="form-group col-md-4">
                        <label for="cctv">Localidad</label>
                        <input type="text" class="form-control" id="cctv" placeholder="{{$abonado->localidad}}"  name="zona" disabled>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-5">
                        <label for="cctv">Partido</label>
                        <input type="text" class="form-control" id="cctv" placeholder="{{$abonado->partido}}" name="zona" disabled>
                      </div>
                      <div class="form-group col-md-5">
                        <label for="cctv">Povincia</label>
                        <input type="text" class="form-control" id="cctv" placeholder="{{$abonado->provincia}}"  name="zona" disabled>
                      </div>
                      <div class="form-group col-md-2">
                        <label for="cctv">Codigo Postal</label>
                        <input type="text" class="form-control" id="cctv" placeholder="{{$abonado->cp}}"  name="zona" disabled>
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
      </div>


@endsection
