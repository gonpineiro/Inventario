<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Host;
use App\Charts\PieChart;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $computadoras = Host::where('host_type_id',1)->where('estado_id', 1)->count();
      $computadorasDisable = Host::where('host_type_id',1)->where('estado_id', 2)->count();
      $computadorasStock = Host::where('host_type_id',1)->where('estado_id', 3)->count();
      $cantComputadoras = Host::where('host_type_id',1)->count();

      $notebooks = Host::where('host_type_id',2)->where('estado_id', 1)->count();
      $notebooksDisable = Host::where('host_type_id',2)->where('estado_id', 2)->count();
      $notebooksStock = Host::where('host_type_id',2)->where('estado_id', 3)->count();
      $cantNotebooks = Host::where('host_type_id',2)->count();


      $impresoras = Host::where('host_type_id',3)->where('estado_id', 1)->count();
      $impresorasDisable = Host::where('host_type_id',3)->where('estado_id', 2)->count();
      $impresorasStock = Host::where('host_type_id',3)->where('estado_id', 3)->count();
      $cantImpresoras = Host::where('host_type_id',3)->count();

      $telefonosip = Host::where('host_type_id',4)->where('estado_id', 1)->count();
      $telefonosipDisable = Host::where('host_type_id',4)->where('estado_id', 2)->count();
      $telefonosipStock = Host::where('host_type_id',4)->where('estado_id', 3)->count();
      $cantTelefonosip = Host::where('host_type_id',4)->count();

      $modems = Host::where('host_type_id',10)->where('estado_id', 1)->count();
      $modemsDisable = Host::where('host_type_id',10)->where('estado_id', 2)->count();
      $modemsStock = Host::where('host_type_id',10)->where('estado_id', 3)->count();
      $cantModems = Host::where('host_type_id',10)->count();

      $routers = Host::where('host_type_id',11)->where('estado_id', 1)->count();
      $routersDisable = Host::where('host_type_id',11)->where('estado_id', 2)->count();
      $routersStock = Host::where('host_type_id',11)->where('estado_id', 3)->count();
      $cantRouters = Host::where('host_type_id',11)->count();

      $switchs = Host::where('host_type_id',12)->where('estado_id', 1)->count();
      $switchsDisable = Host::where('host_type_id',12)->where('estado_id', 2)->count();
      $switchsStock = Host::where('host_type_id',12)->where('estado_id', 3)->count();
      $cantSwitchs = Host::where('host_type_id',12)->count();

      $accespoints = Host::where('host_type_id',13)->where('estado_id', 1)->count();
      $accespointsDisable = Host::where('host_type_id',13)->where('estado_id', 2)->count();
      $accespointsStock = Host::where('host_type_id',13)->where('estado_id', 3)->count();
      $cantAccespoints = Host::where('host_type_id',13)->count();

      $camarasip = Host::where('host_type_id',20)->where('estado_id', 1)->count();
      $camarasipDisable = Host::where('host_type_id',20)->where('estado_id', 2)->count();
      $camarasipStock = Host::where('host_type_id',20)->where('estado_id', 3)->count();
      $cantCamarasip = Host::where('host_type_id',20)->count();

      $camarasana = Host::where('host_type_id',24)->where('estado_id', 1)->count();
      $camarasanaDisable = Host::where('host_type_id',24)->where('estado_id', 2)->count();
      $camarasanaStock = Host::where('host_type_id',24)->where('estado_id', 3)->count();
      $cantCamarasana = Host::where('host_type_id',24)->count();

      $dvrs = Host::where('host_type_id',21)->where('estado_id', 1)->count();
      $dvrsDisable = Host::where('host_type_id',21)->where('estado_id', 2)->count();
      $dvrsStock = Host::where('host_type_id',21)->where('estado_id', 3)->count();
      $cantDvrs = Host::where('host_type_id',21)->count();

      $cantMonitores = Host::where('host_type_id',30)->count();
      $cantTelevisores = Host::where('host_type_id',31)->count();
      $cantTeclados = Host::where('host_type_id',32)->count();
      $cantMouses = Host::where('host_type_id',33)->count();
      $cantCamarawebs = Host::where('host_type_id',34)->count();

      //GRAFICO DE COMPUTADORAS
      $computadorasChart = new PieChart;
      $computadorasChart->labels([$computadoras, $computadorasDisable, $computadorasStock])
            ->dataset('PIE', 'pie', [$computadoras, $computadorasDisable, $computadorasStock])
            ->backgroundcolor(["rgb(15, 50, 170)","rgb(0, 0, 0)","rgb(185, 15, 20)"]);
      $computadorasChart->height(250);
      $computadorasChart->displayAxes(FALSE);
      //dd($computadorasChart);
      //GRAFICO DE NOTEBOOKS
      $notebooksChart = new PieChart;
      $notebooksChart->labels(["$notebooks","$notebooksDisable","$notebooksStock"])
            ->dataset('PIE', 'pie', [$notebooks, $notebooksDisable, $notebooksStock])
            ->backgroundcolor(["rgb(15, 50, 170)","rgb(0, 0, 0)","rgb(185, 15, 20)"]);
      $notebooksChart->height(250);
      $notebooksChart->displayAxes(FALSE);

      //GRAFICO DE IMPRESORAS
      $impresorasChart = new PieChart;
      $impresorasChart->labels(["$impresoras","$impresorasDisable","$impresorasStock"])
            ->dataset('PIE', 'pie', [$impresoras, $impresorasDisable, $impresorasStock])
            ->backgroundcolor(["rgb(15, 50, 170)","rgb(0, 0, 0)","rgb(185, 15, 20)"]);
      $impresorasChart->height(250);
      $impresorasChart->displayAxes(FALSE);

      //GRAFICO DE TELEFONOS IP
      $telefonosipChart = new PieChart;
      $telefonosipChart->labels(["$telefonosip","$telefonosipDisable","$telefonosipStock"])
            ->dataset('PIE', 'pie', [$telefonosip, $telefonosipDisable, $telefonosipStock])
            ->backgroundcolor(["rgb(15, 50, 170)","rgb(0, 0, 0)","rgb(185, 15, 20)"]);
      $telefonosipChart->height(250);
      $telefonosipChart->displayAxes(FALSE);

      //GRAFICO DE MODEMS
      $modemsChart = new PieChart;
      $modemsChart->labels([$modems, $modemsDisable, $modemsStock])
            ->dataset('PIE', 'pie', [$modems, $modemsDisable, $modemsStock])
            ->backgroundcolor(["rgb(15, 50, 170)","rgb(0, 0, 0)","rgb(185, 15, 20)"]);
      $modemsChart->height(250);
      $modemsChart->displayAxes(FALSE);

      //GRAFICO DE ROUTERS
      $routersChart = new PieChart;
      $routersChart->labels([$routers, $routersDisable, $routersStock])
            ->dataset('PIE', 'pie', [$routers, $routersDisable, $routersStock])
            ->backgroundcolor(["rgb(15, 50, 170)","rgb(0, 0, 0)","rgb(185, 15, 20)"]);
      $routersChart->height(250);
      $routersChart->displayAxes(FALSE);

      //GRAFICO DE SWITCHS
      $switchsChart = new PieChart;
      $switchsChart->labels([$switchs, $switchsDisable, $switchsStock])
            ->dataset('PIE', 'pie', [$switchs, $switchsDisable, $switchsStock])
            ->backgroundcolor(["rgb(15, 50, 170)","rgb(0, 0, 0)","rgb(185, 15, 20)"]);
      $switchsChart->height(250);
      $switchsChart->displayAxes(FALSE);

      //GRAFICO DE AP
      $accespointsChart = new PieChart;
      $accespointsChart->labels([$accespoints, $accespointsDisable, $accespointsStock])
            ->dataset('PIE', 'pie', [$accespoints, $accespointsDisable, $accespointsStock])
            ->backgroundcolor(["rgb(15, 50, 170)","rgb(0, 0, 0)","rgb(185, 15, 20)"]);
      $accespointsChart->height(250);
      $accespointsChart->displayAxes(FALSE);

      //GRAFICO DE CAMARAS IP
      $camarasipChart = new PieChart;
      $camarasipChart->labels([$camarasip, $camarasipDisable, $camarasipStock])
            ->dataset('PIE', 'pie', [$camarasip, $camarasipDisable, $camarasipStock])
            ->backgroundcolor(["rgb(15, 50, 170)","rgb(0, 0, 0)","rgb(185, 15, 20)"]);
      $camarasipChart->height(250);
      $camarasipChart->displayAxes(FALSE);

      //GRAFICO DE CAMARAS ANALOGICAS
      $camarasanaChart = new PieChart;
      $camarasanaChart->labels([$camarasana, $camarasanaDisable, $camarasanaStock])
            ->dataset('PIE', 'pie', [$camarasana, $camarasanaDisable, $camarasanaStock])
            ->backgroundcolor(["rgb(15, 50, 170)","rgb(0, 0, 0)","rgb(185, 15, 20)"]);
      $camarasanaChart->height(250);
      $camarasanaChart->displayAxes(FALSE);

      //GRAFICO DE CAMARAS ANALOGICAS
      $dvrChart = new PieChart;
      $dvrChart->labels([$dvrs, $dvrsDisable, $dvrsStock])
            ->dataset('PIE', 'pie', [$dvrs, $dvrsDisable, $dvrsStock])
            ->backgroundcolor(["rgb(15, 50, 170)","rgb(0, 0, 0)","rgb(185, 15, 20)"]);
      $dvrChart->height(250);
      $dvrChart->displayAxes(FALSE);



        return view('home',[
          'computadorasChart' => $computadorasChart,
          'cantComputadoras' => $cantComputadoras,

          'notebooksChart' => $notebooksChart,
          'cantNotebooks' => $cantNotebooks,

          'impresorasChart' => $impresorasChart,
          'cantImpresoras' => $cantImpresoras,

          'telefonosipChart' => $telefonosipChart,
          'cantTelefonosip' => $cantTelefonosip,

          'modemsChart' => $modemsChart,
          'cantModems' => $cantModems,

          'routersChart' => $routersChart,
          'cantRouters' => $cantRouters,

          'switchsChart' => $switchsChart,
          'cantSwitchs' => $cantSwitchs,

          'accespointsChart' => $accespointsChart,
          'cantAccespoints' => $cantAccespoints,

          'camarasipChart' => $camarasipChart,
          'cantCamarasip' => $cantCamarasip,

          'camarasanaChart' => $camarasanaChart,
          'cantCamarasana' => $cantCamarasana,

          'dvrChart' => $dvrChart,
          'cantDvrs' => $cantDvrs,

          'cantMonitores' => $cantMonitores,
          'cantTelevisores' => $cantTelevisores,
          'cantTeclados' => $cantTeclados,
          'cantMouses' => $cantMouses,
          'cantCamarawebs' => $cantCamarawebs,

        ]);
    }
}
