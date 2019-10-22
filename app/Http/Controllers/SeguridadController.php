<?php

namespace App\Http\Controllers;
use App\Host;
use App\Estado;
use App\Modelo;
use App\Departament;
use App\Historial;
use App\Credential;
use App\Card_sim;
use App\Host_work;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SeguridadController extends Controller{

  public function show(Request $request){

    $host = Host::where('host_type_id', 20)
      ->orWhere('host_type_id', 21)
      ->orWhere('host_type_id', 22)
      ->orWhere('host_type_id', 23)
      ->get();

    return view('dispositivos.tables.cctvs.cctvs', [
      'hosts' => $host,

     ]);

  }


  public function showCamarasIp(Request $request){

    $host = Host::where('host_type_id', 20)->get();

    return view('dispositivos.tables.cctvs.camarasip', [
      'hosts' => $host,

     ]);

  }

  public function onlyCamaraIp($id, Request $request){

    $host = $this->findByIdHost($id);
    $cctv = $this->findByIdHost($host->cctv_id);
    $cred = Credential::where('host_id', $id)->get();
    $hostwork = Host_work::where('host_id', $id)->get();
    $now = Carbon::now();

    return view('dispositivos.onlys.cctvs.camaraip', [
        'host' => $host,
        'cctv' => $cctv,
        'hostworks' => $hostwork,
        'now' => $now,
        'creds' => $cred,
    ]);
    }

  public function formCamaraIp(Request $request){
    $estado = Estado::all();
    $modelo = Modelo::where('host_type_id', 20)
    ->orderBy('name')->get();
    $cctv = Host::where('host_type_id',21)->orwhere('host_type_id',22)->get();
    $departament = Departament::all();

    return view('dispositivos.forms.cctvs.add_camaraip', [
      'estados' => $estado,
      'departaments' => $departament,
      'modelos' => $modelo,
      'cctvs' => $cctv,

     ]);

  }

  public function createCamaraIp(Request $request){
      $user = $request->user();
      $camaraip = Host::create([

        'name' => $request->input('name'),
        'host_type_id' =>20,
        'modelo_id' => $request->input('modelo'),
        'serial' => $request->input('serial'),
        'estado_id' => $request->input('estado'),
        'cctv_id' => $request->input('cctv'),
        'mac_adress' => $request->input('mac_adress'),
        'ip_local' => $request->input('ip_local'),
        'ip_publica' => $request->input('ip_publica'),

        'mascara' => $request->input('mascara'),
        'gateway' => $request->input('gateway'),
        'primarydns' => $request->input('primarydns'),
        'secondarydns' => $request->input('secondarydns'),

        'tcp' => $request->input('tcp'),
        'udp' => $request->input('udp'),
        'http' => $request->input('http'),
        'https' => $request->input('https'),
        'rtsp' => $request->input('rtsp'),
        'acceso' => $request->input('acceso'),

        'tcp_ext' => $request->input('tcp_ext'),
        'udp_ext' => $request->input('udp_ext'),
        'http_ext' => $request->input('http_ext'),
        'https_ext' => $request->input('https_ext'),
        'rtsp_ext' => $request->input('rtsp_ext'),

        'departament_id' => $request->input('departament'),
        'comentario' => $request->input('comentario'),
        'valor' => $request->input('valor'),
        'estado_id' => 1,
        'zona' => $request->input('zona'),
    ]);

    $historial = Historial::create([
      'user_id' => $user->id,
      'host_id' => $camaraip->id,
      'type' => 0,
      ]);

    return redirect('/camarasip');
  }

  public function editCamaraIp($id, Request $request){

    $host = $this->findByIdHost($id);
    $estado = Estado::all();
    $departament = Departament::all();
    $cctvs = Host::where('host_type_id', 21)->orwhere('host_type_id', 22)->get();
    $modelo = Modelo::where('host_type_id', 20)->get();

    $cctv = $this->findByIdHost($host->cctv_id);

      return view('dispositivos.edit.cctvs.camaraip', [
          'host' => $host,
          'estados' => $estado,
          'departaments' => $departament,
          'cctvss' => $cctvs,
          'cctv' => $cctv,
          'modelos' => $modelo,

      ]);


  }

  public function updateCamaraIp($id, Request $request){

      $user = $request->user();
      $host = $this->findByIdHost($id);

      $host->name = $request->input('name');
      $host->modelo_id = $request->input('modelo_id');
      $host->serial = $request->input('serial');
      $host->estado_id = $request->input('estado');
      $host->mac_adress = $request->input('mac_adress');
      $host->ip_local = $request->input('ip_local');
      $host->ip_publica = $request->input('ip_publica');
      $host->mascara = $request->input('mascara');
      $host->gateway = $request->input('gateway');
      $host->primarydns = $request->input('primarydns');
      $host->secondarydns = $request->input('secondarydns');
      $host->acceso = $request->input('acceso');
      $host->tcp = $request->input('tcp');
      $host->udp = $request->input('udp');
      $host->http = $request->input('http');
      $host->https = $request->input('https');
      $host->rtsp = $request->input('rtsp');
      $host->tcp_ext = $request->input('tcp_ext');
      $host->udp_ext = $request->input('udp_ext');
      $host->http_ext = $request->input('http_ext');
      $host->https_ext = $request->input('https_ext');
      $host->rtsp_ext = $request->input('rtsp_ext');
      if ($request->input('cctv') == 0) {
        }else {
        $host->cctv_id = $request->input('cctv');
        }
      $host->departament_id = $request->input('departament');
      $host->valor = $request->input('valor');
      $host->comentario = $request->input('comentario');
      $host->estado_id = 1;
      $host->zona = $request->input('zona');
      $host->save();

      $historial = Historial::create([
          'user_id' => $user->id,
          'host_id' => $host->id,
          'type' => 1,
        ]);

      return redirect('/only_camaraip/' . $id);
      }



  public function showCamarasAna(Request $request){

    $host = Host::where('host_type_id', 24)->get();

    return view('dispositivos.tables.cctvs.camarasana', [
      'hosts' => $host,

     ]);

  }

  public function onlyCamaraAna($id, Request $request){

    $host = $this->findByIdHost($id);
    $cctv = $this->findByIdHost($host->cctv_id);
    $cred = Credential::where('host_id', $id)->get();
    $hostwork = Host_work::where('host_id', $id)->get();
    $now = Carbon::now();

    return view('dispositivos.onlys.cctvs.camaraana', [
        'host' => $host,
        'cctv' => $cctv,
        'hostworks' => $hostwork,
        'now' => $now,
        'creds' => $cred,
    ]);
    }

  public function formCamaraAna(Request $request){
    $estado = Estado::all();
    $modelo = Modelo::where('host_type_id', 24)
    ->orderBy('name')->get();
    $cctv = Host::where('host_type_id',21)->orwhere('host_type_id',22)->get();
    $departament = Departament::all();

    return view('dispositivos.forms.cctvs.add_camaraana', [
      'estados' => $estado,
      'departaments' => $departament,
      'modelos' => $modelo,
      'cctvs' => $cctv,

     ]);

  }

  public function createCamaraAna(Request $request){
      $user = $request->user();
      $camaraana = Host::create([

        'name' => $request->input('name'),
        'host_type_id' =>24,
        'modelo_id' => $request->input('modelo'),
        'serial' => $request->input('serial'),
        'estado_id' => $request->input('estado'),
        'cctv_id' => $request->input('cctv'),
        'departament_id' => $request->input('departament'),
        'valor' => $request->input('valor'),
        'comentario' => $request->input('comentario'),
        'estado_id' => 1,
        'zona' => $request->input('zona'),
    ]);

    $historial = Historial::create([
      'user_id' => $user->id,
      'host_id' => $camaraana->id,
      'type' => 0,
      ]);

    return redirect('/camarasana');
  }

  public function editCamaraAna($id, Request $request){

    $host = $this->findByIdHost($id);
    $estado = Estado::all();
    $departament = Departament::all();
    $cctvs = Host::where('host_type_id', 21)->orwhere('host_type_id', 22)->get();
    $modelo = Modelo::where('host_type_id', 24)->get();

    $cctv = $this->findByIdHost($host->cctv_id);

      return view('dispositivos.edit.cctvs.camaraana', [
          'host' => $host,
          'estados' => $estado,
          'departaments' => $departament,
          'cctvss' => $cctvs,
          'cctv' => $cctv,
          'modelos' => $modelo,
      ]);
  }

  public function updateCamaraAna($id, Request $request){

      $user = $request->user();
      $host = $this->findByIdHost($id);

      $host->name = $request->input('name');
      $host->modelo_id = $request->input('modelo_id');
      $host->serial = $request->input('serial');
      $host->estado_id = $request->input('estado');
      if ($request->input('cctv') == 0) {
        }else {
        $host->cctv_id = $request->input('cctv');
        }
      $host->departament_id = $request->input('departament');
      $host->valor = $request->input('valor');
      $host->comentario = $request->input('comentario');
      $host->estado_id = 1;
      $host->zona = $request->input('zona');
      $host->save();

      $historial = Historial::create([
          'user_id' => $user->id,
          'host_id' => $host->id,
          'type' => 1,
        ]);


      return redirect('/only_camaraana/' . $id);
      }


  public function showDvrs(Request $request){

    $host = Host::where('host_type_id', 21)->orwhere('host_type_id', 22)->get();

    return view('dispositivos.tables.cctvs.dvrs', [
      'hosts' => $host,

     ]);

  }

  public function onlyDvr($id, Request $request){

    $host = $this->findByIdHost($id);
    $cred = Credential::where('host_id', $id)->get();
    $hostwork = Host_work::where('host_id', $id)->get();
    $now = Carbon::now();

    return view('dispositivos.onlys.cctvs.dvr', [
        'host' => $host,
        'hostworks' => $hostwork,
        'now' => $now,
        'creds' => $cred,
    ]);
    }

  public function formDvr(Request $request){
    $estado = Estado::all();
    $modelo = $modelo = Modelo::where('host_type_id', 21)
    ->orWhere('host_type_id', 22)
    ->orWhere('host_type_id', 23)
    ->orderBy('name')->get();
    $departament = Departament::all();

    return view('dispositivos.forms.cctvs.add_dvr', [
      'estados' => $estado,
      'departaments' => $departament,
      'modelos' => $modelo,

     ]);

  }

  public function createDvr(Request $request){
      $user = $request->user();

      $dvr = Host::create([

        'name' => $request->input('name'),
        'host_type_id' =>21,
        'modelo_id' => $request->input('modelo'),
        'serial' => $request->input('serial'),
        'estado_id' => $request->input('estado'),
        'mac_adress' => $request->input('mac_adress'),
        'ip_local' => $request->input('ip_local'),
        'ip_publica' => $request->input('ip_publica'),

        'mascara' => $request->input('mascara'),
        'gateway' => $request->input('gateway'),
        'primarydns' => $request->input('primarydns'),
        'secondarydns' => $request->input('secondarydns'),

        'tcp' => $request->input('tcp'),
        'udp' => $request->input('udp'),
        'http' => $request->input('http'),
        'https' => $request->input('https'),
        'rtsp' => $request->input('rtsp'),
        'acceso' => $request->input('acceso'),

        'tcp_ext' => $request->input('tcp_ext'),
        'udp_ext' => $request->input('udp_ext'),
        'http_ext' => $request->input('http_ext'),
        'https_ext' => $request->input('https_ext'),
        'rtsp_ext' => $request->input('rtsp_ext'),

        'departament_id' => $request->input('departament'),
        'comentario' => $request->input('comentario'),
        'valor' => $request->input('valor'),
        'estado_id' => 1,
    ]);

    $historial = Historial::create([
      'user_id' => $user->id,
      'host_id' => $dvr->id,
      'type' => 0,
      ]);

    return redirect('/dvrs');
  }

  public function editDvr($id, Request $request){

    $host = $this->findByIdHost($id);
    $estado = Estado::all();
    $departament = Departament::all();
    $modelo = Modelo::where('host_type_id', 20)->get();

      return view('dispositivos.edit.cctvs.dvr', [
          'host' => $host,
          'estados' => $estado,
          'departaments' => $departament,
          'modelos' => $modelo,

      ]);


  }

  public function updateDvr($id, Request $request){

      $user = $request->user();
      $host = $this->findByIdHost($id);
      $host->name = $request->input('name');
      $host->modelo_id = $request->input('modelo_id');
      $host->serial = $request->input('serial');
      $host->estado_id = $request->input('estado');
      $host->mac_adress = $request->input('mac_adress');
      $host->ip_local = $request->input('ip_local');
      $host->ip_publica = $request->input('ip_publica');
      $host->mascara = $request->input('mascara');
      $host->gateway = $request->input('gateway');
      $host->primarydns = $request->input('primarydns');
      $host->secondarydns = $request->input('secondarydns');
      $host->acceso = $request->input('acceso');
      $host->tcp = $request->input('tcp');
      $host->udp = $request->input('udp');
      $host->http = $request->input('http');
      $host->https = $request->input('https');
      $host->rtsp = $request->input('rtsp');
      $host->tcp_ext = $request->input('tcp_ext');
      $host->udp_ext = $request->input('udp_ext');
      $host->http_ext = $request->input('http_ext');
      $host->https_ext = $request->input('https_ext');
      $host->rtsp_ext = $request->input('rtsp_ext');
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


      return redirect('/only_dvr/' . $id);
      }



  public function showCred(Request $request){

    $cred = Credential::orderBy('host_id','desc')->get();
    $host = Host::where('host_type_id', 21)
    ->orwhere('host_type_id', 22)
    ->orwhere('host_type_id', 20)
    ->get();
    $ver = 1;

    return view('dispositivos.tables.cctvs.credentials', [
      'creds' => $cred,
      'hosts' => $host,
      'ver' => $ver,

     ]);

  }

  public function showAddcred($id, Request $request){

    $cred = Credential::orderBy('host_id','desc')->get();
    $host = Host::where('id', $id)->firstOrFail();;
    $ver = 1;

    return view('dispositivos.tables.cctvs.credentials', [
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


    return redirect('/form_cred_cctv');
  }

  public function editCred($id, Request $request){
    $cred = Credential::all();
    $onlyCred = $this->findByIdCred($id);
    $host = Host::where('host_type_id', 21)->orwhere('host_type_id', 22)->orwhere('host_type_id', 20)->get();
    $ver = 2;

      return view('dispositivos.tables.cctvs.credentials', [
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

      if ($cred->host->host_type_id == 20) { return redirect('/only_camaraip/' . $cred->host_id); }
      if ($cred->host->host_type_id == 21) { return redirect('/only_dvr/' . $cred->host_id); }
    }



  private function findByIdCred($id){
      return Credential::where('id', $id)->firstOrFail();
  }

  private function findByIdHost($id){
      return Host::where('id', $id)->firstOrFail();
  }
}
