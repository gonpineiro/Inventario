<?php

namespace App\Http\Controllers;
use App\Host;
use App\Estado;
use App\Departament;
use App\Modelo;
use App\Historial;
use App\Host_work;
use App\Credential;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NetworkingController extends Controller
{
  public function show(Request $request){

    $host = Host::where('host_type_id', 10)
      ->orWhere('host_type_id', 11)
      ->orWhere('host_type_id', 12)
      ->orWhere('host_type_id', 13)
      ->get();

      return view('dispositivos.tables.networkings.networkings', [
        'hosts' => $host,

       ]);

  }


  public function showModems(Request $request){

    $host = Host::where('host_type_id', 10)->get();
    $dephost = Departament::all();

    return view('dispositivos.tables.networkings.modems', [
      'hosts' => $host,
      'dephost' => $dephost,

     ]);

  }

  public function onlyModem($id, Request $request){

    $host = $this->findByIdHost($id);
    $cred = Credential::where('host_id', $id)->get();
    $hostwork = Host_work::where('host_id', $id)->get();
    $now = Carbon::now();

    return view('dispositivos.onlys.networkings.modem', [
        'host' => $host,
        'hostworks' => $hostwork,
        'now' => $now,
        'creds' => $cred,
    ]);
    }

  public function formModem(Request $request){
    $estado = Estado::all();
    $modelo = Modelo::where('host_type_id', 10)
    ->orderBy('name')->get();
    $departament = Departament::all();

    return view('dispositivos.forms.networkings.add_modem', [
      'estados' => $estado,
      'departaments' => $departament,
      'modelos' => $modelo,

     ]);

  }

  public function createModem(Request $request){
      $user = $request->user();

      $modem = Host::create([

        'name' => $request->input('name'),
        'host_type_id' =>10,
        'modelo_id' => $request->input('modelo'),
        'serial' => $request->input('serial'),
        'estado_id' => $request->input('estado'),
        'mac_adress' => $request->input('mac_adress'),
        'ip_publica' => $request->input('ip_publica'),
        'departament_id' => $request->input('departament'),
        'valor' => $request->input('valor'),
        'comentario' => $request->input('comentario'),
        'estado_id' => 1,
        ]);

      $historial = Historial::create([
        'user_id' => $user->id,
        'host_id' => $modem->id,
        'type' => 0,
        ]);

    return redirect('/modems');
  }

  public function editModem($id, Request $request){

    $host = $this->findByIdHost($id);
    $estado = Estado::all();
    $departament = Departament::all();
    $modelo = Modelo::where('host_type_id', 10)->get();

      return view('dispositivos.edit.networkings.modem', [
          'host' => $host,
          'estados' => $estado,
          'departaments' => $departament,
          'modelos' => $modelo,

      ]);


  }

  public function updateModem($id, Request $request){

      $user = $request->user();
      $host = $this->findByIdHost($id);

      $host->name = $request->input('name');
      $host->modelo_id = $request->input('modelo_id');
      $host->serial = $request->input('serial');
      $host->estado_id = $request->input('estado');
      $host->mac_adress = $request->input('mac_adress');
      $host->ip_publica = $request->input('ip_publica');
      $host->departament_id = $request->input('departament');
      $host->valor = $request->input('valor');
      $host->comentario = $request->input('comentario');
      $host->estado_id = 1;
      $host->save();

      $historial = Historial::create([
          'user_id' => $user->id,
          'host_id' => $host->id,
          'type' => 1,
        ]);


      return redirect('/only_modem/' . $id);
      }



  public function showRouters(Request $request){

    $host = Host::where('host_type_id', 11)->get();

    return view('dispositivos.tables.networkings.routers', [
      'hosts' => $host,

     ]);

  }

  public function onlyRouter($id, Request $request){

    $host = $this->findByIdHost($id);
    $cred = Credential::where('host_id', $id)->get();
    $hostwork = Host_work::where('host_id', $id)->get();
    $now = Carbon::now();

    return view('dispositivos.onlys.networkings.router', [
        'host' => $host,
        'hostworks' => $hostwork,
        'now' => $now,
        'creds' => $cred,
    ]);
    }

  public function formRouter(Request $request){
    $estado = Estado::all();
    $modelo = Modelo::where('host_type_id', 11)
    ->orderBy('name')->get();
    $departament = Departament::all();

    return view('dispositivos.forms.networkings.add_router', [
      'estados' => $estado,
      'departaments' => $departament,
      'modelos' => $modelo,

     ]);

  }

  public function createRouter(Request $request){
      $user = $request->user();
      $router = Host::create([

        'name' => $request->input('name'),
        'host_type_id' =>11,
        'modelo_id' => $request->input('modelo'),
        'serial' => $request->input('serial'),
        'estado_id' => $request->input('estado'),
        'mac_adress' => $request->input('mac_adress'),
        'ip_local' => $request->input('ip_local'),
        'user_1' => $request->input('user_1'),
        'pass_1' => $request->input('pass_1'),
        'departament_id' => $request->input('departament'),
        'acceso' => $request->input('acceso'),
        'valor' => $request->input('valor'),
        'comentario' => $request->input('comentario'),
        'estado_id' => 1,
        ]);
      $historial = Historial::create([
            'user_id' => $user->id,
            'host_id' => $router->id,
            'type' => 0,
          ]);

    return redirect('/routers');
  }

  public function editRouter($id, Request $request){

    $host = $this->findByIdHost($id);
    $estado = Estado::all();
    $departament = Departament::all();
    $modelo = Modelo::where('host_type_id', 11)->get();

      return view('dispositivos.edit.networkings.router', [
          'host' => $host,
          'estados' => $estado,
          'departaments' => $departament,
          'modelos' => $modelo,

      ]);


  }

  public function updateRouter($id, Request $request){

      $user = $request->user();
      $host = $this->findByIdHost($id);

      $host->name = $request->input('name');
      $host->modelo_id = $request->input('modelo_id');
      $host->serial = $request->input('serial');
      $host->estado_id = $request->input('estado');
      $host->mac_adress = $request->input('mac_adress');
      $host->ip_publica = $request->input('ip_publica');
      $host->user_1 = $request->input('user_1');
      $host->pass_1 = $request->input('pass_1');
      $host->acceso = $request->input('acceso');
      $host->departament_id = $request->input('departament');
      $host->valor = $request->input('valor');
      $host->comentario = $request->input('comentario');
      $host->estado_id = 1;
      $host->save();

      $historial = Historial::create([
          'user_id' => $user->id,
          'host_id' => $host->id,
          'type' => 1,
        ]);


      return redirect('/only_router/' . $id);
      }



  public function showSwitchs(Request $request){

    $host = Host::where('host_type_id', 12)->get();

    return view('dispositivos.tables.networkings.switchs', [
      'hosts' => $host,

     ]);

  }

  public function onlySwitch($id, Request $request){

    $host = $this->findByIdHost($id);
    $cred = Credential::where('host_id', $id)->get();
    $hostwork = Host_work::where('host_id', $id)->get();
    $now = Carbon::now();

    return view('dispositivos.onlys.networkings.switch', [
        'host' => $host,
        'hostworks' => $hostwork,
        'now' => $now,
        'creds' => $cred,
    ]);
    }

  public function formSwitch(Request $request){
    $estado = Estado::all();
    $modelo = Modelo::where('host_type_id', 12)
    ->orderBy('name')->get();
    $departament = Departament::all();

    return view('dispositivos.forms.networkings.add_switch', [
      'estados' => $estado,
      'departaments' => $departament,
      'modelos' => $modelo,

     ]);

  }

  public function createSwitch(Request $request){

      $user = $request->user();

      $switch = Host::create([

        'name' => $request->input('name'),
        'host_type_id' =>12,
        'modelo_id' => $request->input('modelo'),
        'serial' => $request->input('serial'),
        'estado_id' => $request->input('estado'),
        'mac_adress' => $request->input('mac_adress'),
        'ip_local' => $request->input('ip_local'),
        'user_1' => $request->input('user_1'),
        'pass_1' => $request->input('pass_1'),
        'departament_id' => $request->input('departament'),
        'acceso' => $request->input('acceso'),
        'valor' => $request->input('valor'),
        'comentario' => $request->input('comentario'),
        'estado_id' => 1,
        ]);

      $historial = Historial::create([
        'user_id' => $user->id,
        'host_id' => $switch->id,
        'type' => 0,
            ]);

    return redirect('/switchs');
  }

  public function editSwitch($id, Request $request){

    $host = $this->findByIdHost($id);
    $estado = Estado::all();
    $departament = Departament::all();
    $modelo = Modelo::where('host_type_id', 12)->get();

      return view('dispositivos.edit.networkings.switch', [
          'host' => $host,
          'estados' => $estado,
          'departaments' => $departament,
          'modelos' => $modelo,

      ]);


  }

  public function updateSwitch($id, Request $request){

      $user = $request->user();
      $host = $this->findByIdHost($id);

      $host->name = $request->input('name');
      $host->modelo_id = $request->input('modelo_id');
      $host->serial = $request->input('serial');
      $host->estado_id = $request->input('estado');
      $host->mac_adress = $request->input('mac_adress');
      $host->ip_publica = $request->input('ip_publica');
      $host->user_1 = $request->input('user_1');
      $host->pass_1 = $request->input('pass_1');
      $host->acceso = $request->input('acceso');
      $host->departament_id = $request->input('departament');
      $host->valor = $request->input('valor');
      $host->comentario = $request->input('comentario');
      $host->estado_id = 1;
      $host->save();

      $historial = Historial::create([
          'user_id' => $user->id,
          'host_id' => $host->id,
          'type' => 1,
        ]);


      return redirect('/only_switch/' . $id);
      }



  public function showAccespoints(Request $request){

    $host = Host::where('host_type_id', 13)->get();

    return view('dispositivos.tables.networkings.accespoints', [
      'hosts' => $host,

     ]);

  }

  public function onlyAccespoint($id, Request $request){

    $host = $this->findByIdHost($id);
    $cred = Credential::where('host_id', $id)->get();
    $hostwork = Host_work::where('host_id', $id)->get();
    $now = Carbon::now();

    return view('dispositivos.onlys.networkings.accespoint', [
        'host' => $host,
        'hostworks' => $hostwork,
        'now' => $now,
        'creds' => $cred,
    ]);
    }

  public function formAccespoint(Request $request){
    $estado = Estado::all();
    $modelo = Modelo::where('host_type_id', 13)
    ->orderBy('name')->get();
    $departament = Departament::all();

    return view('dispositivos.forms.networkings.add_accespoint', [
      'estados' => $estado,
      'departaments' => $departament,
      'modelos' => $modelo,

     ]);

  }

  public function createAccespoint(Request $request){
    $user = $request->user();

      $accespoint = Host::create([

        'name' => $request->input('name'),
        'host_type_id' =>13,
        'modelo_id' => $request->input('modelo'),
        'serial' => $request->input('serial'),
        'estado_id' => $request->input('estado'),
        'mac_adress' => $request->input('mac_adress'),
        'ip_local' => $request->input('ip_local'),
        'departament_id' => $request->input('departament'),
        'acceso' => $request->input('acceso'),
        'ssids' => $request->input('ssid'),
        'ssid_pass' => $request->input('ssid_pass'),
        'valor' => $request->input('valor'),
        'comentario' => $request->input('comentario'),
        'estado_id' => 1,
          ]);

      $historial = Historial::create([
                    'user_id' => $user->id,
                    'host_id' => $accespoint->id,
                    'type' => 0,
                  ]);

    return redirect('/accespoints');
  }

  public function editAccespoint($id, Request $request){

    $host = $this->findByIdHost($id);
    $estado = Estado::all();
    $departament = Departament::all();
    $modelo = Modelo::where('host_type_id', 13)->get();

      return view('dispositivos.edit.networkings.accespoint', [
          'host' => $host,
          'estados' => $estado,
          'departaments' => $departament,
          'modelos' => $modelo,

      ]);


  }

  public function updateAccespoint($id, Request $request){

      $user = $request->user();
      $host = $this->findByIdHost($id);

      $host->name = $request->input('name');
      $host->modelo_id = $request->input('modelo_id');
      $host->serial = $request->input('serial');
      $host->estado_id = $request->input('estado');
      $host->mac_adress = $request->input('mac_adress');
      $host->ip_publica = $request->input('ip_publica');
      $host->ssids = $request->input('ssid');
      $host->ssid_pass = $request->input('ssid_pass');
      $host->acceso = $request->input('acceso');
      $host->departament_id = $request->input('departament');
      $host->valor = $request->input('valor');
      $host->comentario = $request->input('comentario');
      $host->estado_id = 1;
      $host->save();

      $historial = Historial::create([
          'user_id' => $user->id,
          'host_id' => $host->id,
          'type' => 1,
        ]);


      return redirect('/only_accespoint/' . $id);
      }



  public function showCred(Request $request){

    $cred = Credential::orderBy('host_id','desc')->get();
    $host = Host::where('host_type_id', 10)
    ->orwhere('host_type_id', 11)
    ->orwhere('host_type_id', 12)
    ->orwhere('host_type_id', 13)
    ->get();
    $ver = "agregar";

    return view('dispositivos.tables.networkings.credentials', [
      'creds' => $cred,
      'hosts' => $host,
      'ver' => $ver,

     ]);

  }

  public function showAddcred($id, Request $request){

    $cred = Credential::orderBy('host_id','desc')->get();
    $host = Host::where('id', $id)->firstOrFail();;
    $ver = "agregar";

    return view('dispositivos.tables.networkings.credentials', [
      'creds' => $cred,
      'host' => $host,
      'ver' => $ver,
      'id' => $id,

     ]);

  }

  public function createCred(Request $request){

      $user = $request->user();
      $cred = Credential::create([

        'username' => $request->input('username'),
        'password' => $request->input('password'),
        'host_id' => $request->input('host_id'),
        'type' => $request->input('type'),
        'comentario' => $request->input('comentario'),
    ]);


    return redirect('/form_cred_net');
  }

  public function editCred($id, Request $request){
    $cred = Credential::all();
    $onlyCred = $this->findByIdCred($id);
    $host = Host::where('host_type_id', 21)->orwhere('host_type_id', 22)->orwhere('host_type_id', 20)->get();
    $ver = "editar";

      return view('dispositivos.tables.networkings.credentials', [
          'creds' => $cred,
          'hosts' => $host,
          'onlyCred' => $onlyCred,
          'ver' => $ver,


      ]);

  }

  public function updateCred($id, Request $request){
      $user = $request->user();
      $cred = $this->findByIdCred($id);
      $cred->username = $request->input('username');
      $cred->password = $request->input('password');
      $cred->type = $request->input('type');
      $cred->comentario = $request->input('comentario');
      $cred->save();

      if ($cred->host->host_type_id == 10) { return redirect('/only_modem/' . $cred->host_id); }
      if ($cred->host->host_type_id == 11) { return redirect('/only_router/' . $cred->host_id); }
      if ($cred->host->host_type_id == 12) { return redirect('/only_switch/' . $cred->host_id); }
      if ($cred->host->host_type_id == 13) { return redirect('/only_accespoint/' . $cred->host_id); }
    }


  private function findByIdHost($id){
      return Host::where('id', $id)->firstOrFail();
  }

  private function findByIdCred($id){
        return Credential::where('id', $id)->firstOrFail();
    }

}
