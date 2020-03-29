<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Host;
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
      $cantComputadoras = Host::where('host_type_id',1)->count();
      $cantNotebooks = Host::where('host_type_id',2)->count();
      $cantImpresoras = Host::where('host_type_id',3)->count();
      $cantTelefonos = Host::where('host_type_id',4)->count();

      $cantModems = Host::where('host_type_id',10)->count();
      $cantRouters = Host::where('host_type_id',11)->count();
      $cantSwitchs = Host::where('host_type_id',12)->count();
      $cantAccespoints = Host::where('host_type_id',13)->count();

      $cantCamaras = Host::where('host_type_id',20)->count();
      $cantDvrs = Host::where('host_type_id',21)->count();
      $cantCamarasana = Host::where('host_type_id',24)->count();

      $cantMonitores = Host::where('host_type_id',30)->count();
      $cantTelevisores = Host::where('host_type_id',31)->count();
      $cantTeclados = Host::where('host_type_id',32)->count();
      $cantMouses = Host::where('host_type_id',33)->count();
      $cantCamarawebs = Host::where('host_type_id',34)->count();

        return view('home',[
          'cantComputadoras' => $cantComputadoras,
          'cantNotebooks' => $cantNotebooks,
          'cantImpresoras' => $cantImpresoras,
          'cantTelefonos' => $cantTelefonos,
          'cantModems' => $cantModems,
          'cantRouters' => $cantRouters,
          'cantSwitchs' => $cantSwitchs,
          'cantAccespoints' => $cantAccespoints,
          'cantCamaras' => $cantCamaras,
          'cantDvrs' => $cantDvrs,
          'cantCamarasana' => $cantCamarasana,
          'cantMonitores' => $cantMonitores,
          'cantTelevisores' => $cantTelevisores,
          'cantTeclados' => $cantTeclados,
          'cantMouses' => $cantMouses,
          'cantCamarawebs' => $cantCamarawebs,

        ]);
    }
}
