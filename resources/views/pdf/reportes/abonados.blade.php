@extends('layouts.reportAbonado')

@section('content')
    <div class="container">
      <div class="row mt-2">
        <div class="col cl-6">
          <h1>Información básica</h1>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Abonado</th>
                  <th scope="col">Numero</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{$abonado->id}}</td>
                  <td>{{$abonado->numero}}</td>
                </tr>
              </tbody>
            </table>


          @foreach ($abonado->host as $host)

            @if (!is_null($host) and $host->host_type_id == 40)
              <h1 class="int">PANEL</h1>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Zonas</th>
                    <th scope="col">Ubicacion</th>
                    <th scope="col">Valor</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$host->id}}</td>
                    <td>{{$host->name}}</td>
                    <td>{{$host->modelo->name}}</td>
                    <td>{{count($host->sensorpanel)}}/{{$host->cantzona}}</td>
                    <td>{{$host->zona}}</td>
                    <td>{{$host->valor}}</td>
                  </tr>
                </tbody>
              </table>

              @if (!empty ($host->sensorpanel[0]->id))
                <section class="sensor_panel">
                  <h1 class="int">SENSORES</h>
                  <table class="sensorpanel table-hover" >
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Ubicacion</th>
                        <th scope="col">Valor</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($host->sensorpanel as $sensor )
                          <tr>
                            <td>{{$sensor->id}}</td>
                            <td>{{$sensor->name}}</td>
                            <td>{{$sensor->zona}}</td>
                            <td>{{$sensor->valor}}</td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                </section>
              @endif

              @if (!empty($host->companel[0]->id))
                <h1 class="int">COMUNICADORES</h>
                <table class="table table-hover" >
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Ubicacion</th>
                      <th scope="col">SIM I</th>
                      <th scope="col">SIM II</th>
                      <th scope="col">SIM III</th>
                      <th scope="col">Valor</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($host->companel as $companel )
                      <tr>
                        <td>{{$companel->id}}</td>
                        <td>{{$companel->name}}</td>
                        <td>{{$companel->zona}}</td>
                        <td>{{$companel->sim_i["line_phone"]}}</td>
                        <td>{{$companel->sim_ii["line_phone"]}}</td>
                        <td>{{$companel->sim_iii["line_phone"]}}</td>
                        <td>{{$companel->valor}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              @endif

                @foreach ($host->exppanel as $exppanel)
                  @if ($exppanel->host_type_id == 41)
                    <h1 class="int">EXPANSORA: {{$exppanel->id}}</h>
                    <table class="table table-hover" >
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Ubicacion</th>
                          <th scope="col">Zonas</th>
                          <th scope="col">Valor</th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr>
                            <td>{{$exppanel->id}}</td>
                            <td>{{$exppanel->name}}</td>
                            <td>{{$exppanel->zona}}</td>
                            <td>{{count($exppanel->sensorexp)}}/{{$exppanel->cantzona}}</td>
                            <td>{{$exppanel->valor}}</td>
                          </tr>
                      </tbody>
                    </table>

                    @if (!empty($exppanel->sensorexp[0]))
                      <h1 class="int">SENSORES EN: {{$exppanel->id}}</h>
                      <table class="table table-hover" >
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Ubicacion</th>
                            <th scope="col">Valor</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($exppanel->sensorexp as $sensorexp)
                            <tr>
                              <td>{{$sensorexp->id}}</td>
                              <td>{{$sensorexp->name}}</td>
                              <td>{{$sensorexp->zona}}</td>
                              <td>{{$sensorexp->valor}}</td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    @endif
                  @endif
                @endforeach

                @foreach ($host->teclapanel as $teclapanel)
                  @if ($teclapanel->host_type_id == 44)
                    <h1 class="int">TECLADO: {{$teclapanel->id}}</h>
                    <table class="table table-hover" >
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Ubicacion</th>
                          <th scope="col">Zonas</th>
                          <th scope="col">Valor</th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr>
                            <td>{{$teclapanel->id}}</td>
                            <td>{{$teclapanel->name}}</td>
                            <td>{{$teclapanel->zona}}</td>
                            <td>{{count($teclapanel->sensortecla)}}/{{$teclapanel->cantzona}}</td>
                            <td>{{$teclapanel->valor}}</td>
                          </tr>
                      </tbody>
                    </table>

                    @if (!empty($teclapanel->sensortecla[0]))
                      <h1 class="int">SENSORES EN: {{$teclapanel->id}}</h>
                      <table class="table table-hover" >
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Ubicacion</th>
                            <th scope="col">Valor</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($teclapanel->sensortecla as $sensortecla)
                            <tr>
                              <td>{{$sensortecla->id}}</td>
                              <td>{{$sensortecla->name}}</td>
                              <td>{{$sensortecla->zona}}</td>
                              <td>{{$sensortecla->valor}}</td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    @endif
                  @endif
                @endforeach

            @endif

          @endforeach
        </div>
      </div>
    </div>
<br>
@endsection
