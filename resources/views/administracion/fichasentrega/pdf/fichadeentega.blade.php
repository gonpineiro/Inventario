@extends('administracion.fichasentrega.layouts.pdf_entrega')

@section('content')
  <div class="container">
    <div class="row mt-2">
      <div class="col cl-6">
          <table class="table " style="width:100%">
            <thead>
              <tr>
                <th scope="col" style="width:3%">CANT.</th>
                <th scope="col" style="width:5%">DESCRIPCION</th>
                <th scope="col" style="width:10%">MARCA</th>
                <th scope="col" style="width:17%">MODELO</th>
                <th scope="col" style="width:20%">S/N</th>
                <th scope="col"style="width:45%">OBS.</th>
              </tr>
            </thead>
            <tbody>
              @if (isset($host_01))
                <tr>
                  <td>{{$fichasentrega->detalle[0]["cantidad"]}}</td>
                  <td>{{$host_01->host_type->name}}</td>
                  <td>{{$modelo_01->marca}}</td>
                  <td>{{$modelo_01->name}}</td>
                  <td>{{$host_01->serial}}</td>
                  <td>{{$fichasentrega->detalle[0]["obs"]}}</td>
                </tr>
              @else
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              @endif
              @if (isset($host_02))
                <tr>
                  <td>{{$fichasentrega->detalle[1]["cantidad"]}}</td>
                  <td>{{$host_02->host_type->name}}</td>
                  <td>{{$modelo_02->marca}}</td>
                  <td>{{$modelo_02->name}}</td>
                  <td>{{$host_02->serial}}</td>
                  <td>{{$fichasentrega->detalle[1]["obs"]}}</td>
                </tr>
              @else
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              @endif
              @if (isset($host_03))
                <tr>
                  <td>{{$fichasentrega->detalle[2]["cantidad"]}}</td>
                  <td>{{$host_03->host_type->name}}</td>
                  <td>{{$modelo_03->marca}}</td>
                  <td>{{$modelo_03->name}}</td>
                  <td>{{$host_03->serial}}</td>
                  <td>{{$fichasentrega->detalle[2]["obs"]}}</td>
                </tr>
              @else
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              @endif
              @if (isset($host_04))
                <tr>
                  <td>{{$fichasentrega->detalle[3]["cantidad"]}}</td>
                  <td>{{$host_04->host_type->name}}</td>
                  <td>{{$modelo_04->marca}}</td>
                  <td>{{$modelo_04->name}}</td>
                  <td>{{$host_04->serial}}</td>
                  <td>{{$fichasentrega->detalle[3]["obs"]}}</td>
                </tr>
              @else
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              @endif
              @if (isset($host_05))
                <tr>
                  <td>{{$fichasentrega->detalle[4]["cantidad"]}}</td>
                  <td>{{$host_05->host_type->name}}</td>
                  <td>{{$modelo_05->marca}}</td>
                  <td>{{$modelo_05->name}}</td>
                  <td>{{$host_05->serial}}</td>
                  <td>{{$fichasentrega->detalle[4]["obs"]}}</td>
                </tr>
              @else
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              @endif


            </tbody>
          </table>
          <br>



      </div>
    </div>
</div>
@endsection
