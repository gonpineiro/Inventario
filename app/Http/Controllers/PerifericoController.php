<?php

namespace App\Http\Controllers;
use App\Host;
use App\Departament;
use App\Estado;
use App\Modelo;
use App\Cliente;
use App\User_host;
use App\Host_type;
use App\Host_work;
use Carbon\Carbon;
use App\Historial;

use App\Cctv;
use Illuminate\Http\Request;

class PerifericoController extends Controller
{

  public function show(Request $request){

    $host = Host::where('host_type_id', 30)
      ->orWhere('host_type_id', 31)
      ->orWhere('host_type_id', 32)
      ->orWhere('host_type_id', 33)
      ->orWhere('host_type_id', 34)
      ->paginate(25);

    return view('dispositivos.tables.perifericos.perifericos', [
      'hosts' => $host,
    ]);

  }



  public function showMonitors(Request $request){

    $host = Host::where('host_type_id', 30)->get();

    return view('dispositivos.tables.perifericos.monitors', [
      'hosts' => $host,
    ]);

  }

  public function onlyMonitor($id, Request $request){

    $host = $this->findByIdHost($id);
    $cctv = $this->findByIdHost($host->cctv_id);

    $hostwork = Host_work::where('host_id', $id)->get();
    $now = Carbon::now();

    return view('dispositivos.onlys.perifericos.monitor', [
        'host' => $host,
        'cctv' => $cctv,
        'hostworks' => $hostwork,
        'now' => $now,
    ]);
    }

  public function formMonitor(Request $request){
    $estado = Estado::all();
    $modelo = Modelo::where('host_type_id', 30)->orderBy('marca_id')->get();
    $host = Host::where('host_type_id',1)->orwhere('host_type_id',2)->get();
    $departament = Departament::all();

    return view('dispositivos.forms.perifericos.add_monitor', [
      'estados' => $estado,
      'departaments' => $departament,
      'modelos' => $modelo,
      'hosts' => $host,

     ]);

  }

  public function createMonitor(Request $request){
      $user = $request->user();
      $monitor = Host::create([

        'name' => $request->input('name'),
        'host_type_id' =>30,
        'modelo_id' => $request->input('modelo'),
        'serial' => $request->input('serial'),
        'estado_id' => $request->input('estado'),
        'cctv_id' => $request->input('host'),
        'departament_id' => $request->input('departament'),
        'valor' => $request->input('valor'),
        'comentario' => $request->input('comentario'),
        'estado_id' => 1,
    ]);
    $historial = Historial::create([
      'user_id' => $user->id,
      'host_id' => $monitor->id,
      'type' => 0,
      ]);

    return redirect('/monitors');
  }

  public function editMonitor($id, Request $request){

    $host = $this->findByIdHost($id);
    $estado = Estado::all();
    $departament = Departament::all();
    $cctvs = Host::where('host_type_id', 21)->orwhere('host_type_id', 22)->get();
    $computador = Host::where('host_type_id', 1)->orwhere('host_type_id', 2)->get();

    $cctv = $this->findByIdHost($host->cctv_id);

      return view('dispositivos.edit.perifericos.monitor', [
          'host' => $host,
          'estados' => $estado,
          'departaments' => $departament,
          'cctvss' => $cctvs,
          'cctv' => $cctv,
          'computadors' => $computador,

      ]);


  }

  public function updateMonitor($id, Request $request){
      $user = $request->user();
      $host = $this->findByIdHost($id);

      $host->name = $request->input('name');
      $host->serial = $request->input('serial');
      $host->estado_id = $request->input('estado');
      if ($request->input('cctv') == 0) {
        }else {
        $host->cctv_id = $request->input('cctv');
        }
      $host->departament_id = $request->input('departament');
      $host->valor = $request->input('valor');
      $host->comentario = $request->input('comentario');
      $host->estado_id = $request->input('estado');
      $host->save();

      $historial = Historial::create([
        'user_id' => $user->id,
        'host_id' => $host->id,
        'type' => 1,
      ]);
      return redirect('/only_monitor/' . $id);
    }







  public function showTelevisors(Request $request){

    $host = Host::where('host_type_id', 31)->get();

    return view('dispositivos.tables.perifericos.televisors', [
      'hosts' => $host,
    ]);

  }

  public function onlyTelevisor($id, Request $request){

    $host = $this->findByIdHost($id);
    $cctv = $this->findByIdHost($host->cctv_id);
    $hostwork = Host_work::where('host_id', $id)->get();
    $now = Carbon::now();

    return view('dispositivos.onlys.perifericos.televisor', [
        'host' => $host,
        'cctv' => $cctv,
        'hostworks' => $hostwork,
        'now' => $now,
    ]);
    }

  public function formTelevisor(Request $request){
    $estado = Estado::all();
    $modelo = Modelo::where('host_type_id', 31)->orderBy('marca_id')->get();
    $host = Host::where('host_type_id',1)->orwhere('host_type_id',2)->get();


    $departament = Departament::all();
    return view('dispositivos.forms.perifericos.add_televisor', [
      'estados' => $estado,
      'departaments' => $departament,
      'modelos' => $modelo,
      'hosts' => $host,

     ]);

  }

  public function createTelevisor(Request $request){
      $user = $request->user();
      $televisor = Host::create([

        'name' => $request->input('name'),
        'host_type_id' =>31,
        'modelo_id' => $request->input('modelo'),
        'serial' => $request->input('serial'),
        'estado_id' => $request->input('estado'),
        'cctv_id' => $request->input('host'),
        'departament_id' => $request->input('departament'),
        'valor' => $request->input('valor'),
        'comentario' => $request->input('comentario'),
        'estado_id' => 1,
    ]);

    $historial = Historial::create([
      'user_id' => $user->id,
      'host_id' => $televisor->id,
      'type' => 0,
      ]);

    return redirect('/televisors');
  }

  public function editTelevisor($id, Request $request){

    $host = $this->findByIdHost($id);
    $estado = Estado::all();
    $departament = Departament::all();
    $cctvs = Host::where('host_type_id', 21)->orwhere('host_type_id', 22)->get();
    $computador = Host::where('host_type_id', 1)->orwhere('host_type_id', 2)->get();

    $cctv = $this->findByIdHost($host->cctv_id);

      return view('dispositivos.edit.perifericos.televisor', [
          'host' => $host,
          'estados' => $estado,
          'departaments' => $departament,
          'cctvss' => $cctvs,
          'cctv' => $cctv,
          'computadors' => $computador,

      ]);


  }

  public function updateTelevisor($id, Request $request){
      $user = $request->user();
      $host = $this->findByIdHost($id);

      $host->name = $request->input('name');
      $host->serial = $request->input('serial');
      $host->estado_id = $request->input('estado');
      if ($request->input('cctv') == 0) {
        }else {
        $host->cctv_id = $request->input('cctv');
        }
      $host->departament_id = $request->input('departament');
      $host->valor = $request->input('valor');
      $host->comentario = $request->input('comentario');
      $host->estado_id = $request->input('estado');
      $host->save();

      $historial = Historial::create([
        'user_id' => $user->id,
        'host_id' => $host->id,
        'type' => 1,
      ]);
      return redirect('/only_televisor/' . $id);
    }




  public function showTeclados(Request $request){

    $host = Host::where('host_type_id', 32)->get();

    return view('dispositivos.tables.perifericos.teclados', [
      'hosts' => $host,
    ]);

  }

  public function onlyTeclado($id, Request $request){

    $host = $this->findByIdHost($id);
    $cctv = $this->findByIdHost($host->cctv_id);
    $hostwork = Host_work::where('host_id', $id)->get();
    $now = Carbon::now();

    return view('dispositivos.onlys.perifericos.teclado', [
        'host' => $host,
        'cctv' => $cctv,
        'hostworks' => $hostwork,
        'now' => $now,
    ]);
    }

  public function formTeclado(Request $request){
    $estado = Estado::all();
    $modelo = Modelo::where('host_type_id', 32)->orderBy('marca_id')->get();
    $host = Host::where('host_type_id',1)->orwhere('host_type_id',2)->get();


    $departament = Departament::all();
    return view('dispositivos.forms.perifericos.add_teclado', [
      'estados' => $estado,
      'departaments' => $departament,
      'modelos' => $modelo,
      'hosts' => $host,

     ]);

  }

  public function createTeclado(Request $request){
      $user = $request->user();
      $teclado = Host::create([

        'name' => $request->input('name'),
        'host_type_id' =>32,
        'modelo_id' => $request->input('modelo'),
        'serial' => $request->input('serial'),
        'estado_id' => $request->input('estado'),
        'cctv_id' => $request->input('host'),
        'departament_id' => $request->input('departament'),
        'valor' => $request->input('valor'),
        'comentario' => $request->input('comentario'),
        'estado_id' => 1,
    ]);

    $historial = Historial::create([
      'user_id' => $user->id,
      'host_id' => $teclado->id,
      'type' => 0,
      ]);
      return redirect('/teclados');
    }

  public function editTeclado($id, Request $request){

    $host = $this->findByIdHost($id);
    $estado = Estado::all();
    $departament = Departament::all();
    $cctvs = Host::where('host_type_id', 21)->orwhere('host_type_id', 22)->get();
    $computador = Host::where('host_type_id', 1)->orwhere('host_type_id', 2)->get();

    $cctv = $this->findByIdHost($host->cctv_id);

      return view('dispositivos.edit.perifericos.teclado', [
          'host' => $host,
          'estados' => $estado,
          'departaments' => $departament,
          'cctvss' => $cctvs,
          'cctv' => $cctv,
          'computadors' => $computador,

      ]);


  }

  public function updateTeclado($id, Request $request){
      $user = $request->user();
      $host = $this->findByIdHost($id);

      $host->name = $request->input('name');
      $host->serial = $request->input('serial');
      $host->estado_id = $request->input('estado');
      if ($request->input('cctv') == 0) {
        }else {
        $host->cctv_id = $request->input('cctv');
        }
      $host->departament_id = $request->input('departament');
      $host->valor = $request->input('valor');
      $host->comentario = $request->input('comentario');
      $host->estado_id = $request->input('estado');
      $host->save();

      $historial = Historial::create([
        'user_id' => $user->id,
        'host_id' => $host->id,
        'type' => 1,
      ]);


      return redirect('/only_teclado/' . $id);
    }



  public function showMouses(Request $request){

    $host = Host::where('host_type_id', 33)->get();

    return view('dispositivos.tables.perifericos.mouses', [
      'hosts' => $host,
    ]);

  }

  public function onlyMouse($id, Request $request){

    $host = $this->findByIdHost($id);
    $cctv = $this->findByIdHost($host->cctv_id);

    $hostwork = Host_work::where('host_id', $id)->get();
    $now = Carbon::now();

    return view('dispositivos.onlys.perifericos.mouse', [
        'host' => $host,
        'cctv' => $cctv,
        'hostworks' => $hostwork,
        'now' => $now,
    ]);
    }

  public function formMouse(Request $request){
    $estado = Estado::all();
    $modelo = Modelo::where('host_type_id', 33)->orderBy('marca_id')->get();
    $host = Host::where('host_type_id',1)->orwhere('host_type_id',2)->get();


    $departament = Departament::all();
    return view('dispositivos.forms.perifericos.add_mouse', [
      'estados' => $estado,
      'departaments' => $departament,
      'modelos' => $modelo,
      'hosts' => $host,

     ]);

  }

  public function createMouse(Request $request){
      $user = $request->user();
      $mouse = Host::create([

        'name' => $request->input('name'),
        'host_type_id' =>33,
        'modelo_id' => $request->input('modelo'),
        'serial' => $request->input('serial'),
        'estado_id' => $request->input('estado'),
        'cctv_id' => $request->input('host'),
        'departament_id' => $request->input('departament'),
        'valor' => $request->input('valor'),
        'comentario' => $request->input('comentario'),
        'estado_id' => 1,
    ]);
    $historial = Historial::create([
      'user_id' => $user->id,
      'host_id' => $mouse->id,
      'type' => 0,
      ]);
      return redirect('/mouses');
    }

  public function editMouse($id, Request $request){

    $host = $this->findByIdHost($id);
    $estado = Estado::all();
    $departament = Departament::all();
    $cctvs = Host::where('host_type_id', 21)->orwhere('host_type_id', 22)->get();
    $computador = Host::where('host_type_id', 1)->orwhere('host_type_id', 2)->get();

    $cctv = $this->findByIdHost($host->cctv_id);

      return view('dispositivos.edit.perifericos.mouse', [
          'host' => $host,
          'estados' => $estado,
          'departaments' => $departament,
          'cctvss' => $cctvs,
          'cctv' => $cctv,
          'computadors' => $computador,

      ]);


  }

  public function updateMouse($id, Request $request){
      $user = $request->user();
      $host = $this->findByIdHost($id);

      $host->name = $request->input('name');
      $host->serial = $request->input('serial');
      $host->estado_id = $request->input('estado');
      if ($request->input('cctv') == 0) {
        }else {
        $host->cctv_id = $request->input('cctv');
        }
      $host->departament_id = $request->input('departament');
      $host->valor = $request->input('valor');
      $host->comentario = $request->input('comentario');
      $host->estado_id = $request->input('estado');
      $host->save();

      $historial = Historial::create([
        'user_id' => $user->id,
        'host_id' => $host->id,
        'type' => 1,
      ]);


      return redirect('/only_mouse/' . $id);
    }



  public function showWebcam(Request $request){

    $host = Host::where('host_type_id', 34)->get();

    return view('dispositivos.tables.perifericos.webcams', [
      'hosts' => $host,
    ]);

  }

  public function formWebcam(Request $request){
    $estado = Estado::all();
    $modelo = Modelo::where('host_type_id', 34)->orderBy('marca_id')->get();
    $host = Host::where('host_type_id',1)->orwhere('host_type_id',2)->get();


    $departament = Departament::all();
    return view('dispositivos.forms.perifericos.add_webcam', [
      'estados' => $estado,
      'departaments' => $departament,
      'modelos' => $modelo,
      'hosts' => $host,

     ]);

  }

  public function onlyWebcam($id, Request $request){

    $host = $this->findByIdHost($id);
    $cctv = $this->findByIdHost($host->cctv_id);
    $hostwork = Host_work::where('host_id', $id)->get();
    $now = Carbon::now();

    return view('dispositivos.onlys.perifericos.webcam', [
        'host' => $host,
        'cctv' => $cctv,
        'hostworks' => $hostwork,
        'now' => $now,
    ]);
    }

  public function createWebcam(Request $request){
      $user = $request->user();
      $webcam = Host::create([

        'name' => $request->input('name'),
        'host_type_id' =>34,
        'modelo_id' => $request->input('modelo'),
        'serial' => $request->input('serial'),
        'estado_id' => $request->input('estado'),
        'cctv_id' => $request->input('host'),
        'departament_id' => $request->input('departament'),
        'valor' => $request->input('valor'),
        'comentario' => $request->input('comentario'),
        'estado_id' => 1,
    ]);
    $historial = Historial::create([
      'user_id' => $user->id,
      'host_id' => $webcam->id,
      'type' => 0,
      ]);
      return redirect('/web_cams');
      }

  public function editWebCam($id, Request $request){

    $host = $this->findByIdHost($id);
    $estado = Estado::all();
    $departament = Departament::all();
    $cctvs = Host::where('host_type_id', 21)->orwhere('host_type_id', 22)->get();
    $computador = Host::where('host_type_id', 1)->orwhere('host_type_id', 2)->get();

    $cctv = $this->findByIdHost($host->cctv_id);

      return view('dispositivos.edit.perifericos.webcam', [
          'host' => $host,
          'estados' => $estado,
          'departaments' => $departament,
          'cctvss' => $cctvs,
          'cctv' => $cctv,
          'computadors' => $computador,

      ]);


  }

  public function updateWebcam($id, Request $request){
      $user = $request->user();
      $host = $this->findByIdHost($id);

      $host->name = $request->input('name');
      $host->serial = $request->input('serial');
      $host->estado_id = $request->input('estado');
      if ($request->input('cctv') == 0) {
        }else {
        $host->cctv_id = $request->input('cctv');
        }
      $host->departament_id = $request->input('departament');
      $host->valor = $request->input('valor');
      $host->comentario = $request->input('comentario');
      $host->estado_id = $request->input('estado');
      $host->save();

      $historial = Historial::create([
        'user_id' => $user->id,
        'host_id' => $host->id,
        'type' => 1,
      ]);


      return redirect('/only_web_cam/' . $id);
    }


  private function findByIdHost($id){
      return Host::where('id', $id)->firstOrFail();
  }
}
