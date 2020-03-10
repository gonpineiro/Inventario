<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Licensekey;
use App\Host;
use Carbon\Carbon;

class LicenciasController extends Controller
{
    public function showLicense(Request $request){

      $license = Licensekey::all();
      $ver = "agregar";
      $computadora = Host::where('host_type_id', 1)->get();
      $notebook = Host::where('host_type_id', 2)->get();
      return view('dispositivos.tables.licenses.licenses', [
        'licenses' => $license,
        'ver' => $ver,
        'computadoras' => $computadora,
        'notebooks' => $notebook,
      ]);

    }

    public function createLicense(Request $request){

          $license = Licensekey::create([
          'key' => $request->input('key'),
          'fc' =>$request->input('fc'),
          'host_id' =>$request->input('host_id'),
          'type' =>$request->input('type'),
          'fecha' =>$request->input('fecha'),
          ]);


      return redirect('/licencias');
    }

    public function editLicense($id, Request $request){

      $license = Licensekey::all();
      $computadora = Host::where('host_type_id', 1)->get();
      $notebook = Host::where('host_type_id', 2)->get();
      $onlyLicense =  $this->findByIdLicense($id);
      $ver = "editar";

        return view('dispositivos.tables.licenses.licenses', [
            'licenses' => $license,
            'notebooks' => $notebook,
            'computadoras' => $computadora,
            'ver' => $ver,
            'onlyLicense' => $onlyLicense,
        ]);

    }

    public function updateLicense($id, Request $request){

      $onlyLicense = $this->findByIdLicense($id);
      $onlyLicense->fc = $request->input('fc');
      $onlyLicense->type = $request->input('type');
      $onlyLicense->host_id = $request->input('host_id');
      $onlyLicense->save();


      return redirect('/licencias/');

    }

  private function findByIdLicense($id){
      return Licensekey::where('id', $id)->firstOrFail();
  }
}
