<?php

namespace App\Http\Controllers;

use App\Abonado;
use App\Cliente;
use App\Modelo;
use App\Host;
use App\Host_work;
use App\Estado;
use App\Historial;
use App\Card_sim;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SdiController extends Controller
{
    public function showAbonados(Request $request){
      $abonado = Abonado::all();
      return view('dispositivos.tables.sdis.abonados', [
        'abonados' => $abonado,
      ]);

    }

    public function formAbonado(Request $request){
      $cliente = Cliente::orderBy('name')->get();

      return view('dispositivos.forms.sdis.add_abonado', [
        'clientes' => $cliente,

       ]);

    }

    public function createAbonado(Request $request){

        $user = $request->user();
        $abonado = Abonado::create([

          'cliente_id' => $request->input('cliente_id'),
          'type' => $request->input('type'),
          'email' => $request->input('email'),
          'direccion' => $request->input('direccion'),
          'cp' => $request->input('cp'),
          'localidad' => $request->input('localidad'),
          'numero' => $request->input('numero'),
          'partido' => $request->input('partido'),
          'provincia' => $request->input('provincia'),
          'comentario' => $request->input('comentario'),
            ]);

      return redirect('/abonados');
    }



    public function showPanelAlarm(Request $request){
      $host = Host::where('host_type_id',40)->get();
      return view('dispositivos.tables.sdis.panel_alarms', [
        'hosts' => $host,
      ]);

    }

    public function onlyPanelAlarm($id, Request $request){

      $host = $this->findByIdHost($id);
      $hostwork = Host_work::where('host_id', $id)->get();
      $now = Carbon::now();

      return view('dispositivos.onlys.sdis.panel_alarm', [
          'host' => $host,
          'hostworks' => $hostwork,
          'now' => $now,
      ]);
      }

    public function formPanelAlarm(Request $request){
      $cliente = Cliente::orderBy('name')->get();
      $modelo = Modelo::where('host_type_id',40)->get();
      $abonado = Abonado::orderBy('id')->get();

      return view('dispositivos.forms.sdis.add_panel_alarm', [
        'clientes' => $cliente,
        'modelos'  => $modelo,
        'abonados'  => $abonado,

       ]);

    }

    public function createPanelAlarm(Request $request){

        $user = $request->user();
        $host = Host::create([

        'host_type_id' => 40,
        'estado_id' => 1,
        'name' => $request->input('name'),
        'modelo_id' => $request->input('modelo_id'),
        'serial' => $request->input('serial'),
        'cantzona' => $request->input('cantzona'),
        'abonado_id' => $request->input('abonado_id'),
        'zona' => $request->input('zona'),
        'valor' => $request->input('valor'),
        'comentario' => $request->input('comentario'),
          ]);

      return redirect('/panel_alarms');
    }

    public function editPanelAlarm($id, Request $request){

      $host = $this->findByIdHost($id);
      $estado = Estado::all();
      $modelo = Modelo::where('host_type_id',40)->get();
      $abonado = Abonado::all();

        return view('dispositivos.edit.sdis.panel_alarm', [
            'host' => $host,
            'estados' => $estado,
            'abonados' => $abonado,
            'modelos' => $modelo,
        ]);

    }

    public function updatePanelAlarm($id, Request $request){

        $user = $request->user();
        $host = $this->findByIdHost($id);

        $host->name = $request->input('name');
        $host->serial = $request->input('serial');
        $host->estado_id = $request->input('estado');
        $host->modelo_id = $request->input('modelo_id');
        $host->abonado_id = $request->input('abonado_id');
        $host->cantzona = $request->input('cantzona');
        $host->zona = $request->input('zona');
        $host->valor = $request->input('valor');
        $host->comentario = $request->input('comentario');
        $host->estado_id = 1;
        $host->save();

        $historial = Historial::create([
            'user_id' => $user->id,
            'host_id' => $host->id,
            'type' => 1,
          ]);


        return redirect('/only_panel_alarm/' . $id);
        }




    public function showTeclado(Request $request){
      $host = Host::where('host_type_id',44)->get();
      return view('dispositivos.tables.sdis.teclados', [
        'hosts' => $host,
      ]);

    }

    public function onlyTeclado($id, Request $request){

      $host = $this->findByIdHost($id);
      $hostwork = Host_work::where('host_id', $id)->get();
      $now = Carbon::now();

      return view('dispositivos.onlys.sdis.teclado', [
          'host' => $host,
          'hostworks' => $hostwork,
          'now' => $now,
      ]);
      }

    public function formTeclado(Request $request){
      $cliente = Cliente::orderBy('name')->get();
      $modelo = Modelo::where('host_type_id',44)->get();
      $cctv = Host::where('host_type_id',40)->get();

      return view('dispositivos.forms.sdis.add_teclado', [
        'clientes' => $cliente,
        'modelos'  => $modelo,
        'cctvs'  => $cctv,

       ]);

    }

    public function createTeclado(Request $request){

        $user = $request->user();
        $host = Host::create([

        'host_type_id' => 44,
        'estado_id' => 1,
        'name' => $request->input('name'),
        'modelo_id' => $request->input('modelo_id'),
        'serial' => $request->input('serial'),
        'cantzona' => $request->input('cantzona'),
        'cctv_id' => $request->input('cctv_id'),
        'valor' => $request->input('valor'),
        'zona' => $request->input('zona'),
        'comentario' => $request->input('comentario'),
          ]);

      return redirect('/teclado_sdis');
    }

    public function editTeclado($id, Request $request){

      $host = $this->findByIdHost($id);
      $estado = Estado::all();
      $modelo = Modelo::where('host_type_id',44)->get();
      $cctv = Host::where('host_type_id',40)->get();

        return view('dispositivos.edit.sdis.teclado', [
            'host' => $host,
            'estados' => $estado,
            'modelos' => $modelo,
            'cctvs' => $cctv,
        ]);

    }

    public function updateTeclado($id, Request $request){

      $user = $request->user();
      $host = $this->findByIdHost($id);
      $host->name = $request->input('name');
      $host->serial = $request->input('serial');
      $host->estado_id = $request->input('estado');
      $host->modelo_id = $request->input('modelo_id');
      $host->cctv_id = $request->input('cctv_id');
      $host->cantzona = $request->input('cantzona');
      $host->zona = $request->input('zona');
      $host->valor = $request->input('valor');
      $host->comentario = $request->input('comentario');
      $host->estado_id = 1;
      $host->save();

      $historial = Historial::create([
          'user_id' => $user->id,
          'host_id' => $host->id,
          'type' => 1,
        ]);


      return redirect('/only_teclado_sdi/' . $id);
      }




    public function showExpansora(Request $request){
      $host = Host::where('host_type_id',41)->get();
      return view('dispositivos.tables.sdis.expansoras', [
        'hosts' => $host,
      ]);

    }

    public function onlyExpansora($id, Request $request){

      $host = $this->findByIdHost($id);
      $hostwork = Host_work::where('host_id', $id)->get();
      $now = Carbon::now();

      return view('dispositivos.onlys.sdis.expansora', [
          'host' => $host,
          'hostworks' => $hostwork,
          'now' => $now,
      ]);
      }

    public function formExpansora(Request $request){
      $cliente = Cliente::orderBy('name')->get();
      $modelo = Modelo::where('host_type_id',41)->get();
      $cctv = Host::where('host_type_id',40)->get();

      return view('dispositivos.forms.sdis.add_expansora', [
        'clientes' => $cliente,
        'modelos'  => $modelo,
        'cctvs'  => $cctv,

       ]);

    }

    public function createExpansora(Request $request){

        $user = $request->user();
        $host = Host::create([

        'host_type_id' => 41,
        'estado_id' => 1,
        'name' => $request->input('name'),
        'modelo_id' => $request->input('modelo_id'),
        'serial' => $request->input('serial'),
        'cantzona' => $request->input('cantzona'),
        'cctv_id' => $request->input('cctv_id'),
        'valor' => $request->input('valor'),
        'zona' => $request->input('zona'),
        'comentario' => $request->input('comentario'),
          ]);

      return redirect('/expansoras');
    }

    public function editExpansora($id, Request $request){

      $host = $this->findByIdHost($id);
      $estado = Estado::all();
      $modelo = Modelo::where('host_type_id',41)->get();
      $cctv = Host::where('host_type_id',40)->get();

        return view('dispositivos.edit.sdis.expansora', [
            'host' => $host,
            'estados' => $estado,
            'modelos' => $modelo,
            'cctvs' => $cctv,
        ]);

    }

    public function updateExpansora($id, Request $request){

      $user = $request->user();
      $host = $this->findByIdHost($id);
      $host->name = $request->input('name');
      $host->serial = $request->input('serial');
      $host->estado_id = $request->input('estado');
      $host->modelo_id = $request->input('modelo_id');
      $host->cctv_id = $request->input('cctv_id');
      $host->cantzona = $request->input('cantzona');
      $host->zona = $request->input('zona');
      $host->valor = $request->input('valor');
      $host->comentario = $request->input('comentario');
      $host->estado_id = 1;
      $host->save();

      $historial = Historial::create([
          'user_id' => $user->id,
          'host_id' => $host->id,
          'type' => 1,
        ]);


      return redirect('/only_expansora/' . $id);
      }



    public function showComunicator(Request $request){
        $host = Host::where('host_type_id',42)->get();
        return view('dispositivos.tables.sdis.comunicators', [
          'hosts' => $host,
        ]);

    }

    public function onlyComunicator($id, Request $request){

      $host = $this->findByIdHost($id);
      $hostwork = Host_work::where('host_id', $id)->get();
      $now = Carbon::now();

      //dd($host->sim_ii);

        return view('dispositivos.onlys.sdis.comunicator', [
            'host' => $host,
            'hostworks' => $hostwork,
            'now' => $now,
        ]);
        }

    public function formComunicator(Request $request){
      $cliente = Cliente::orderBy('name')->get();
      $modelo = Modelo::where('host_type_id',42)->get();
      $abonado = Abonado::orderBy('id')->get();
      $cctv = Host::where('host_type_id',40)->get();
      $cardsim = Card_sim::where('host_id', NULL)->get();

      return view('dispositivos.forms.sdis.add_comunicator', [
        'clientes' => $cliente,
        'modelos'  => $modelo,
        'abonados'  => $abonado,
        'cctvs'  => $cctv,
        'cardsims'  => $cardsim,

       ]);

    }

    public function createComunicator(Request $request){

        $user = $request->user();
        $host = Host::create([

        'host_type_id' => 42,
        'estado_id' => 1,
        'name' => $request->input('name'),
        'modelo_id' => $request->input('modelo_id'),
        'cctv_id' => $request->input('cctv_id'),
        'serial' => $request->input('serial'),
        'abonado_id' => $request->input('abonado_id'),
        'card_sim_i' => $request->input('card_sim_i'),
        'card_sim_ii' => $request->input('card_sim_ii'),
        'card_sim_iii' => $request->input('card_sim_iii'),
        'zona' => $request->input('zona'),
        'valor' => $request->input('valor'),
        'comentario' => $request->input('comentario'),
          ]);

        if (!is_null($request->input('card_sim_i'))) {

          $cardsim_i = $this->findByIdCardsim($request->input('card_sim_i'));
          $cardsim_i->host_id = $host->id;
          $cardsim_i->save();

        }
        if (!is_null($request->input('card_sim_ii'))) {

          $cardsim_ii = $this->findByIdCardsim($request->input('card_sim_ii'));
          $cardsim_ii->host_id = $host->id;
          $cardsim_ii->save();

        }
        if (!is_null($request->input('card_sim_iii'))) {

          $cardsim_iii = $this->findByIdCardsim($request->input('card_sim_iii'));
          $cardsim_iii->host_id = $host->id;
          $cardsim_iii->save();

        }

      return redirect('/comunicators');
    }

    public function editComunicator($id, Request $request){

      $host = $this->findByIdHost($id);
      $estado = Estado::all();
      $modelo = Modelo::where('host_type_id',42)->get();
      $abonado = Abonado::all();
      $cardsim = Card_sim::where('host_id', NULL)->get();
      $cctv = Host::where('host_type_id',40)->get();

        return view('dispositivos.edit.sdis.comunicator', [
            'host' => $host,
            'estados' => $estado,
            'abonados' => $abonado,
            'modelos' => $modelo,
            'cardsims' => $cardsim,
            'cctvs' => $cctv,
        ]);

    }

    public function updateComunicator($id, Request $request){

        $user = $request->user();
        $host = $this->findByIdHost($id);
        if (!is_null($request->input('card_sim_i'))) {

          if (!is_null($host->sim_i)) {
          $deletehostid = $this->findByIdCardsim($host->sim_i->id);
          $deletehostid->host_id = NULL;
          $deletehostid->save();
          }

          $cardsim_i = $this->findByIdCardsim($request->input('card_sim_i'));
          $cardsim_i->host_id = $host->id;
          $cardsim_i->save();
        }else {
            if (!is_null($host->sim_i)) {
              $cardsim_i = $this->findByIdCardsim($host->sim_i->id);
              $cardsim_i->host_id = NULL;
              $cardsim_i->save();
            }
          }


        if (!is_null($request->input('card_sim_ii'))) {

          if (!is_null($host->sim_ii)) {
          $deletehostid = $this->findByIdCardsim($host->sim_ii->id);
          $deletehostid->host_id = NULL;
          $deletehostid->save();
          }

          $cardsim_ii = $this->findByIdCardsim($request->input('card_sim_ii'));
          $cardsim_ii->host_id = $host->id;
          $cardsim_ii->save();
        }else {
            if (!is_null($host->sim_ii)) {
              $cardsim_ii = $this->findByIdCardsim($host->sim_ii->id);
              $cardsim_ii->host_id = NULL;
              $cardsim_ii->save();
            }
          }

        if (!is_null($request->input('card_sim_iii'))) {

          if (!is_null($host->sim_iii)) {
          $deletehostid = $this->findByIdCardsim($host->sim_iii->id);
          $deletehostid->host_id = NULL;
          $deletehostid->save();
          }

          $cardsim_iii = $this->findByIdCardsim($request->input('card_sim_iii'));
          $cardsim_iii->host_id = $host->id;
          $cardsim_iii->save();
        }else {
            if (!is_null($host->sim_iii)) {
              $cardsim_iii = $this->findByIdCardsim($host->sim_iii->id);
              $cardsim_iii->host_id = NULL;
              $cardsim_iii->save();
            }
          }

        $host->name = $request->input('name');
        $host->serial = $request->input('serial');
        $host->estado_id = $request->input('estado');
        $host->modelo_id = $request->input('modelo_id');
        $host->cctv_id = $request->input('cctv_id');
        $host->card_sim_i = $request->input('card_sim_i');
        $host->card_sim_ii = $request->input('card_sim_ii');
        $host->card_sim_iii = $request->input('card_sim_iii');
        $host->zona = $request->input('zona');
        $host->valor = $request->input('valor');
        $host->comentario = $request->input('comentario');
        $host->estado_id = 1;
        $host->save();



        $historial = Historial::create([
            'user_id' => $user->id,
            'host_id' => $host->id,
            'type' => 1,
          ]);


        return redirect('/only_comunicator/' . $id);
        }




    public function showSirena(Request $request){
      $host = Host::where('host_type_id',45)->get();
      return view('dispositivos.tables.sdis.sirenas', [
        'hosts' => $host,
      ]);

    }

    public function formSirena(Request $request){
      $cliente = Cliente::orderBy('name')->get();
      $modelo = Modelo::where('host_type_id',45)->get();
      $panel_alarm = Host::where('host_type_id',40)->get();

      return view('dispositivos.forms.sdis.add_sirena', [
        'clientes' => $cliente,
        'modelos'  => $modelo,
        'panel_alarms'  => $panel_alarm,

       ]);

    }

    public function createSirena(Request $request){

        $user = $request->user();
        $host = Host::create([

        'host_type_id' => 45,
        'estado_id' => 1,
        'name' => $request->input('name'),
        'modelo_id' => $request->input('modelo_id'),
        'serial' => $request->input('serial'),
        'cctv_id' => $request->input('cctv_id'),
        'valor' => $request->input('valor'),
        'zona' => $request->input('zona'),
        'comentario' => $request->input('comentario'),
          ]);

      return redirect('/sirenas');
    }




    public function showSensor(Request $request){
      $host = Host::where('host_type_id',43)->get();
      return view('dispositivos.tables.sdis.sensors', [
        'hosts' => $host,
      ]);

    }

    public function onlySensor($id, Request $request){

      $host = $this->findByIdHost($id);
      $hostwork = Host_work::where('host_id', $id)->get();
      $now = Carbon::now();

      return view('dispositivos.onlys.sdis.sensor', [
          'host' => $host,
          'hostworks' => $hostwork,
          'now' => $now,
      ]);
      }

    public function formSensor(Request $request){
      $cliente = Cliente::orderBy('name')->get();
      $modelo = Modelo::where('host_type_id',43)->get();
      $panel_alarm = Host::where('host_type_id',40)->get();
      $expansora = Host::where('host_type_id',41)->get();
      $teclado = Host::where('host_type_id',44)->get();

      return view('dispositivos.forms.sdis.add_sensor', [
        'clientes' => $cliente,
        'modelos'  => $modelo,
        'panel_alarms'  => $panel_alarm,
        'expansoras'  => $expansora,
        'teclados'  => $teclado,

       ]);

    }

    public function createSensor(Request $request){

        $user = $request->user();
        $host = Host::create([

        'host_type_id' => 43,
        'estado_id' => 1,
        'name' => $request->input('name'),
        'modelo_id' => $request->input('modelo_id'),
        'serial' => $request->input('serial'),
        'cantzona' => $request->input('cantzona'),
        'cctv_id' => $request->input('cctv_id'),
        'valor' => $request->input('valor'),
        'zona' => $request->input('zona'),
        'comentario' => $request->input('comentario'),
          ]);

      return redirect('/sensors');
    }

    public function editSensor($id, Request $request){

      $host = $this->findByIdHost($id);
      $estado = Estado::all();
      $modelo = Modelo::where('host_type_id',43)->get();

      $panel_alarm = Host::where('host_type_id',40)->get();
      $expansora = Host::where('host_type_id',41)->get();
      $teclado = Host::where('host_type_id',44)->get();

        return view('dispositivos.edit.sdis.sensor', [
            'host' => $host,
            'estados' => $estado,
            'modelos' => $modelo,
            'panel_alarms' => $panel_alarm,
            'expansoras' => $expansora,
            'teclados' => $teclado,
        ]);

    }

    public function updateSensor($id, Request $request){

      $user = $request->user();
      $host = $this->findByIdHost($id);
      $host->name = $request->input('name');
      $host->serial = $request->input('serial');
      $host->estado_id = $request->input('estado');
      $host->modelo_id = $request->input('modelo_id');
      $host->cctv_id = $request->input('cctv_id');
      $host->cantzona = $request->input('cantzona');
      $host->zona = $request->input('zona');
      $host->valor = $request->input('valor');
      $host->comentario = $request->input('comentario');
      $host->estado_id = 1;
      $host->save();

      $historial = Historial::create([
          'user_id' => $user->id,
          'host_id' => $host->id,
          'type' => 1,
        ]);


      return redirect('/only_sensor/' . $id);
      }




    private function findByIdHost($id){
        return Host::where('id', $id)->firstOrFail();
    }

    private function findByIdAbonado($id){
        return Abonado::where('id', $id)->firstOrFail();
    }

    private function findByIdCardsim($id){
        return Card_sim::where('id', $id)->firstOrFail();
    }

}
