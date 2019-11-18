@extends('layouts.app')

@section('content')
  <div class="container">

    <div class="row justify-content-md-center">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">Modificando {{$host->name}}</div>
            <div class="card-body">
                <form action="/update_notebook/{{$host->id}}" method="post" name="form">
                  {{ csrf_field() }}
                  <div class="form-row">
                    <div class="form-group col-md-3">
                      <label for="serial">Nombre</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{$host->name}}" required>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="modelo_id">Modelo</label>
                        <select class="form-control" name="modelo_id">
                          <option value="{{$host->modelo_id}}">{{$host->modelo->name}}</option>
                          @foreach ($modelos as $modelo)
                            <option value="{{$modelo->id}}">{{$modelo->name}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="serial">Serial</label>
                      <input type="text" class="form-control" id="serial" value="{{$host->serial}}" name="serial" style="text-transform:uppercase;"required>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="estado">Clase</label>
                      <select class="form-control" name="class" required>
                        <option value="{{$host->class}}">{{$host->class}}</option>
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="departament">Usuario</label>
                      <input type="text" class="form-control" @if (!is_null($host->user_host)) placeholder="{{$host->user_host->name}} {{$host->user_host->apellido}}" @else placeholder="" @endif disabled>
                      <input type="text" name="user_host_id" value="{{$host->user_host_id}}" hidden>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="mac_adress">Mac address</label>
                      <input type="text" class="form-control" id="mac_adress" value="{{$host->mac_adress}}" name="mac_adress" pattern="^([0-9A-F]{2}[:-]){5}([0-9A-F]{2})$" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="ip_local">Ip local</label>
                      <input type="text" class="form-control" id="ip_local" value="{{$host->ip_local}}"  name="ip_local" pattern="((^|\.)((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))){4}$"required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="departament">Afectado</label>
                      <input type="text" class="form-control" @if (!is_null($host->user_host)) placeholder="D: {{$host->user_host->departament->name}} - C: {{$host->user_host->departament->cliente->name}}" @else placeholder="" @endif disabled>

                    </div>
                    <div class="form-group col-md-6">
                      <label for="valor">Valor</label>
                      <input type="number" min="10" class="form-control" id="valor" value="{{$host->valor}}" name="valor" required>
                    </div>
                  </div>
                  <div class="form-row">
                      <div class="form-group col-md">
                        <label for="comentario">Observaciónes</label>
                        <textarea rows="10" cols="50" type="text" class="form-control" id="comentario" name="comentario" >{{$host->comentario}} </textarea>
                      </div>
                  </div>
                  @can ('entrega.create') {{-- generar algoritmo inverso --}}
                    @if (!is_null($host->user_host))
                      <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="defaultUnchecked" onclick="myFunction()" name="retirar_host">
                          <label class="custom-control-label" for="defaultUnchecked">Retirar Host al usuario</label>
                      </div>
                      <br>
                      <br>
                      <div class="form-row" id="div_devolucion" style="display:none">
                        <div class="form-group col-md-3">
                          <label for="valor">Fecha</label>
                          <input type="date" class="form-control" id="fecha" name="fecha">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="valor">Observacione</label>
                          <input type="text" class="form-control" id="comentario_entrega"  name="comentario_entrega">
                        </div>
                      </div>
                  @endif
                  @endcan
                  <button type="submit" class="btn btn-dark">Aceptar</button>
                </form>
              </div>
            </div>
      </div>
  </div>
@endsection

<script type="text/javascript">
    function myFunction() {
        // Get the checkbox
        var checkBox = document.getElementById("defaultUnchecked");
        // Get the output text
        var div_devolucion = document.getElementById("div_devolucion");

          // If the checkbox is checked, display the output text
        if (checkBox.checked == true){
            div_devolucion.style.display = "block";
            document.getElementById("fecha").required = true;
            document.getElementById("comentario_entrega").required = true;
            console.log('T');
          } else {
            div_devolucion.style.display = "none";
            document.getElementById("fecha").required = false;
            document.getElementById("comentario_entrega").required = false;
            console.log('F');
          }
    }
</script>
