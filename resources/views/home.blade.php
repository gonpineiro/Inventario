@extends('layouts.app')

@section('content')
<div class="container">

  {{-- SOLAPAS --}}
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="user_host-tab" data-toggle="tab" href="#user_host" role="tab" aria-controls="user_host" aria-selected="true">Hosts de usuarios</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="networking-tab" data-toggle="tab" href="#networking" role="tab" aria-controls="networking" aria-selected="true">Networking</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="cctv-tab" data-toggle="tab" href="#cctv" role="tab" aria-controls="cctv" aria-selected="true">CCTV</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true">Contact</a>
    </li>
  </ul>

{{-- CONTENIDO --}}
  <div class="tab-content" id="myTabContent">

    {{-- PRIMER CONTENIDO --}}
    <div class="tab-pane fade show active" id="user_host" role="tabpanel" aria-labelledby="user_host-tab">
      <br>
      <div class="row mt-2">
        <div class="col cl-4">
          <div class="card">
            <div class="card-header">Computadoras: {{$cantComputadoras}} en total</div>
              <div class="row mt-2">
                {!! $computadorasChart->container() !!}

                {!! $computadorasChart->script() !!}
              </div>
            </div>
        </div>
        <div class="col cl-4">
          <div class="card">
            <div class="card-header">Notebooks: {{$cantNotebooks}} en total</div>
              <div class="row mt-2">
                {!! $notebooksChart->container() !!}
                {!! $notebooksChart->script() !!}
              </div>
            </div>
        </div>
        <div class="col cl-4">
          <div class="card">
            <div class="card-header">Impresoras: {{$cantImpresoras}} en total</div>
              <div class="row mt-2">
                {!! $impresorasChart->container() !!}
                {!! $impresorasChart->script() !!}
              </div>
            </div>
        </div>
      </div>
      <br>
      <div class="row mt-2">
        <div class="col cl-4">
          <div class="card">
            <div class="card-header">Telefonia IP: {{$cantTelefonosip}} en total</div>
              <div class="row mt-2">
              </div>
              <div class="row mt-2">
                {!! $telefonosipChart->container() !!}
                {!! $telefonosipChart->script() !!}
              </div>
            </div>
          </div>
      </div>
    </div>

    {{-- SEGUNDO CONTENIDO --}}
    <div class="tab-pane fade active" id="networking" role="tabpanel" aria-labelledby="networking-tab">
      <br>
      <div class="row mt-2">
        <div class="col cl-4">
          <div class="card">
            <div class="card-header">Routers: {{$cantRouters}} en total</div>
              <div class="row mt-2">
                {!! $routersChart->container() !!}

                {!! $routersChart->script() !!}
              </div>
            </div>
        </div>
        <div class="col cl-4">
          <div class="card">
            <div class="card-header">Switchs: {{$cantSwitchs}} en total</div>
              <div class="row mt-2">
                {!! $switchsChart->container() !!}
                {!! $switchsChart->script() !!}
              </div>
            </div>
        </div>
        <div class="col cl-4">
          <div class="card">
            <div class="card-header">AccesPoints: {{$cantAccespoints}} en total</div>
              <div class="row mt-2">
                {!! $accespointsChart->container() !!}
                {!! $accespointsChart->script() !!}
              </div>
            </div>
        </div>
      </div>
      <br>
      <div class="row mt-2">
        <div class="col cl-4">
          <div class="card">
            <div class="card-header">Modems: {{$cantModems}} en total</div>
              <div class="row mt-2">
              </div>
              <div class="row mt-2">
                {!! $modemsChart->container() !!}
                {!! $modemsChart->script() !!}
              </div>
            </div>
          </div>
      </div>
    </div>

    {{-- TERCER CONTENIDO --}}
    <div class="tab-pane fade active" id="cctv" role="tabpanel" aria-labelledby="cctv-tab">
      <br>
      <div class="row mt-2">
        <div class="col cl-4">
          <div class="card">
            <div class="card-header">Cámaras IP: {{$cantCamarasip}} en total</div>
              <div class="row mt-2">
                {!! $camarasipChart->container() !!}

                {!! $camarasipChart->script() !!}
              </div>
            </div>
        </div>
        <div class="col cl-4">
          <div class="card">
            <div class="card-header">Cámaras analógicas: {{$cantCamarasana}} en total</div>
              <div class="row mt-2">
                {!! $camarasanaChart->container() !!}
                {!! $camarasanaChart->script() !!}
              </div>
            </div>
        </div>
        <div class="col cl-4">
          <div class="card">
            <div class="card-header">DVRs: {{$cantDvrs}} en total</div>
              <div class="row mt-2">
                {!! $dvrChart->container() !!}
                {!! $dvrChart->script() !!}
              </div>
            </div>
        </div>
      </div>
    </div>

    {{-- CUARTO CONTENIDO --}}
    <div class="tab-pane fade active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
      ...
    </div>
  </div>




</div>
@endsection
