@extends('layouts.app')

@section('content')
<div class="container">
  </br>
  </br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Hosts</div>
              <table class="table table-hover ">
                <tr>
                  <th scope="col">Dispositivo</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">PDF</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><a href="/computadoras">Computadora</a></td>
                    <td>{{$cantComputadoras}}</td>
                    <td><a href="/computadoras_pdf/2">B</a> - <a href="/computadoras_pdf/1">V</a></td>
                  </tr>
                  <tr>
                    <td><a href="/notebooks">Notebooks</a></td>
                    <td>{{$cantNotebooks}}</td>
                    <td><a href="/notebooks_pdf/2">B</a> - <a href="/notebooks_pdf/1">V</a></td>
                  </tr>
                  <tr>
                    <td><a href="/impresoras">Impresoras</a></td>
                    <td>{{$cantImpresoras}}</td>
                    <td><a href="/impresoras_pdf/2">B</a> - <a href="/impresoras_pdf/1">V</a></td>
                  </tr>
                  <tr>
                    <td><a href="/telefoniaip">Telefonía IP</a></td>
                    <td>{{$cantTelefonos}}</td>
                    <td><a href="/telefonos_pdf/2">B</a> - <a href="/telefonos_pdf/1">V</a></td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Networking</div>
              <table class="table table-hover ">
                <tr>
                  <th scope="col">Dispositivo</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">PDF</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><a href="/modems">Modems</a></td>
                    <td>{{$cantModems}}</td>
                    <td><a href="/modems_pdf/2">B</a> - <a href="/modems_pdf/1">V</a></td>
                  </tr>
                  <tr>
                    <td><a href="/routers">Routers</a></td>
                    <td>{{$cantRouters}}</td>
                    <td><a href="/routers_pdf/2">B</a> - <a href="/routers_pdf/1">V</a></td>
                  </tr>
                  <tr>
                    <td><a href="/switchs">Switchs</a></td>
                    <td>{{$cantSwitchs}}</td>
                    <td><a href="/switchs_pdf/2">B</a> - <a href="/switchs_pdf/1">V</a></td>
                  </tr>
                  <tr>
                    <td><a href="/accespoints">AccesPoints</a></td>
                    <td>{{$cantAccespoints}}</td>
                    <td><a href="/accespoints_pdf/2">B</a> - <a href="/accespoints_pdf/1">V</a></td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
    </div>


    </br>
    </br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Dispositivo de seguridad</div>
              <table class="table table-hover ">
                <tr>
                  <th scope="col">Dispositivo</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">PDF</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><a href="/camarasip">Cámaras IP</a></td>
                    <td>{{$cantCamaras}}</td>
                    <td><a href="/camarasip_pdf/2">B</a> - <a href="/camarasip_pdf/1">V</a></td>
                  </tr>
                  <tr>
                    <td><a href="/camarasana">Cámaras Analógicas</a></td>
                    <td>{{$cantCamarasana}}</td>
                    <td><a href="/camarasana_pdf/2">B</a> - <a href="/camarasana_pdf/1">V</a></td>
                  </tr>
                  <tr>
                    <td><a href="/dvrs">DVRs</a></td>
                    <td>{{$cantDvrs}}</td>
                    <td><a href="/dvr_pdf/2">B</a> - <a href="/dvr_pdf/1">V</a></td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Periféricos</div>
              <table class="table table-hover ">
                <tr>
                  <th scope="col">Dispositivo</th>
                  <th scope="col">Cantidad</th>
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><a href="/monitors">Monitores</a></td>
                    <td>{{$cantMonitores}}</td>
                  </tr>
                  <tr>
                    <td><a href="/televisors">Televisores</a></td>
                    <td>{{$cantTelevisores}}</td>
                  </tr>
                  <tr>
                    <td><a href="/teclados">Teclados</a></td>
                    <td>{{$cantTeclados}}</td>
                  </tr>
                  <tr>
                    <td><a href="/mouses">Mouse</a></td>
                    <td>{{$cantMouses}}</td>
                  </tr><tr>
                    <td><a href="/web_cams">Camaras Web</a></td>
                    <td>{{$cantCamarawebs}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
@endsection
