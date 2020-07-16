<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Abonado;
use App\Departament;
use App\Modelo;
use App\Host;
use App\Host_work;
use App\Estado;
use App\Historial;
use App\Card_sim;
use App\Plataforma;
use App\Abonadotype;
use App\Password_abonado;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SdiController extends Controller
{
    public function showAbonados(Request $request)
    {
        $user = $request->user();
        $abonado = Abonado::all();
        //dd($user->roles[0]->name == 'OPERACIONES');
        if ($user->roles[0]->name == 'OPERACIONES') {
            //dd('asd');
            return view('dispositivos.tables.sdis.abonados_op', [
          'abonados' => $abonado,
          'user' => $user,
        ]);
        }
        return view('dispositivos.tables.sdis.abonados', [
        'abonados' => $abonado,
        'user' => $user,
      ]);
    }

    public function onlyAbonado($id, Request $request)
    {
        $abonado = $this->findByIdAbonado($id);
        $password_abonado = Password_abonado::where('abonado_id', $abonado->id)->get();
        $now = Carbon::now();
        //dd($password_abonado);
        return view('dispositivos.onlys.sdis.abonado', [
          'abonado' => $abonado,
          'password_abonados' => $password_abonado,
          'now' => $now,
      ]);
    }

    public function formAbonado(Request $request)
    {
        $departament = Departament::orderBy('name')->get();
        $plataforma = Plataforma::orderBy('name')->get();
        $abonado_type = Abonadotype::orderBy('name')->get();
        return view('dispositivos.forms.sdis.add_abonado', [
        'departaments' => $departament,
        'plataformas' => $plataforma,
        'abonado_types' => $abonado_type,

       ]);
    }

    public function createAbonado(Request $request)
    {
        $user = $request->user();
        $abonado = Abonado::create([

          'departament_id' => $request->input('departament_id'),
          'abonadotype_id' => $request->input('abonadotype_id'),
          'plataforma_id' => $request->input('plataforma_id'),
          'email' => $request->input('email'),
          'direccion' => $request->input('direccion'),
          'cp' => $request->input('cp'),
          'localidad' => $request->input('localidad'),
          'numero' => $request->input('numero'),
          'palabra_clave' => $request->input('palabra_clave'),
          'partido' => $request->input('partido'),
          'provincia' => $request->input('provincia'),
          'telefono' => $request->input('telefono'),
          'comentario' => $request->input('comentario'),
            ]);

        return redirect('/abonados');
    }

    public function editAbonado($id, Request $request)
    {
        $abonado = $this->findByIdAbonado($id);
        $departament = Departament::orderBy('name')->get();
        $plataforma = Plataforma::orderBy('name')->get();
        $abonado_type = Abonadotype::orderBy('name')->get();
        //$estado = Estado::all();

        return view('dispositivos.edit.sdis.abonado', [
            'abonado' => $abonado,
            'plataformas' => $plataforma,
            'abonado_types' => $abonado_type,
            'departaments' => $departament,
        ]);
    }

    public function updateAbonado($id, Request $request)
    {
        $user = $request->user();
        $abonado = $this->findByIdAbonado($id);

        $abonado->departament_id = $request->input('departament_id');
        $abonado->abonadotype_id = $request->input('abonadotype_id');
        $abonado->plataforma_id = $request->input('plataforma_id');
        $abonado->email = $request->input('email');
        $abonado->direccion = $request->input('direccion');
        $abonado->cp = $request->input('cp');
        $abonado->localidad = $request->input('localidad');
        $abonado->numero = $request->input('numero');
        $abonado->partido = $request->input('partido');
        $abonado->provincia = $request->input('provincia');
        $abonado->palabra_clave = $request->input('palabra_clave');
        $abonado->telefono = $request->input('telefono');
        $abonado->comentario = $request->input('comentario');
        $abonado->save();

        // $historial = Historial::create([
        //     'user_id' => $user->id,
        //     'host_id' => $host->id,
        //     'type' => 1,
        //   ]);


        return redirect('/only_abonado/' . $id);
    }


    public function showPanelAlarm(Request $request)
    {
        $host = Host::where('host_type_id', 40)->where('estado_id', 1)->get();
        return view('dispositivos.tables.sdis.panel_alarms', [
        'hosts' => $host,
      ]);
    }

    public function onlyPanelAlarm($id, Request $request)
    {
        $host = $this->findByIdHost($id);
        $hostwork = Host_work::where('host_id', $id)->get();
        $now = Carbon::now();

        return view('dispositivos.onlys.sdis.panel_alarm', [
          'host' => $host,
          'hostworks' => $hostwork,
          'now' => $now,
      ]);
    }

    public function formPanelAlarm(Request $request)
    {
        $cliente = Cliente::orderBy('name')->get();
        $modelo = Modelo::where('host_type_id', 40)->get();
        $abonado = Abonado::orderBy('id')->get();

        return view('dispositivos.forms.sdis.add_panel_alarm', [
        'clientes' => $cliente,
        'modelos'  => $modelo,
        'abonados'  => $abonado,

       ]);
    }

    public function createPanelAlarm(Request $request)
    {
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

    public function editPanelAlarm($id, Request $request)
    {
        $host = $this->findByIdHost($id);
        $estado = Estado::all();
        $modelo = Modelo::where('host_type_id', 40)->get();
        $abonado = Abonado::all();

        return view('dispositivos.edit.sdis.panel_alarm', [
            'host' => $host,
            'estados' => $estado,
            'abonados' => $abonado,
            'modelos' => $modelo,
        ]);
    }

    public function updatePanelAlarm($id, Request $request)
    {
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


    public function showTeclado(Request $request)
    {
        $host = Host::where('host_type_id', 44)->where('estado_id', 1)->get();
        return view('dispositivos.tables.sdis.teclados', [
        'hosts' => $host,
      ]);
    }

    public function onlyTeclado($id, Request $request)
    {
        $host = $this->findByIdHost($id);
        $hostwork = Host_work::where('host_id', $id)->get();
        $now = Carbon::now();

        return view('dispositivos.onlys.sdis.teclado', [
          'host' => $host,
          'hostworks' => $hostwork,
          'now' => $now,
      ]);
    }

    public function formTeclado(Request $request)
    {
        $cliente = Cliente::orderBy('name')->get();
        $modelo = Modelo::where('host_type_id', 44)->get();
        $cctv = Host::where('host_type_id', 40)->get();

        return view('dispositivos.forms.sdis.add_teclado', [
        'clientes' => $cliente,
        'modelos'  => $modelo,
        'cctvs'  => $cctv,

       ]);
    }

    public function createTeclado(Request $request)
    {
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

    public function editTeclado($id, Request $request)
    {
        $host = $this->findByIdHost($id);
        $estado = Estado::all();
        $modelo = Modelo::where('host_type_id', 44)->get();
        $cctv = Host::where('host_type_id', 40)->get();

        return view('dispositivos.edit.sdis.teclado', [
            'host' => $host,
            'estados' => $estado,
            'modelos' => $modelo,
            'cctvs' => $cctv,
        ]);
    }

    public function updateTeclado($id, Request $request)
    {
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

    public function showExpansora(Request $request)
    {
        $host = Host::where('host_type_id', 41)->where('estado_id', 1)->get();
        return view('dispositivos.tables.sdis.expansoras', [
        'hosts' => $host,
      ]);
    }

    public function onlyExpansora($id, Request $request)
    {
        $host = $this->findByIdHost($id);
        $hostwork = Host_work::where('host_id', $id)->get();
        $now = Carbon::now();

        return view('dispositivos.onlys.sdis.expansora', [
          'host' => $host,
          'hostworks' => $hostwork,
          'now' => $now,
      ]);
    }

    public function formExpansora(Request $request)
    {
        $cliente = Cliente::orderBy('name')->get();
        $modelo = Modelo::where('host_type_id', 41)->get();
        $cctv = Host::where('host_type_id', 40)->get();

        return view('dispositivos.forms.sdis.add_expansora', [
        'clientes' => $cliente,
        'modelos'  => $modelo,
        'cctvs'  => $cctv,

       ]);
    }

    public function createExpansora(Request $request)
    {
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

    public function editExpansora($id, Request $request)
    {
        $host = $this->findByIdHost($id);
        $estado = Estado::all();
        $modelo = Modelo::where('host_type_id', 41)->get();
        $cctv = Host::where('host_type_id', 40)->get();

        return view('dispositivos.edit.sdis.expansora', [
            'host' => $host,
            'estados' => $estado,
            'modelos' => $modelo,
            'cctvs' => $cctv,
        ]);
    }

    public function updateExpansora($id, Request $request)
    {
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

    public function showComunicator(Request $request)
    {
        $host = Host::where('host_type_id', 42)->where('estado_id', 1)->get();
        return view('dispositivos.tables.sdis.comunicators', [
          'hosts' => $host,
        ]);
    }

    public function onlyComunicator($id, Request $request)
    {
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

    public function formComunicator(Request $request)
    {
        $cliente = Cliente::orderBy('name')->get();
        $modelo = Modelo::where('host_type_id', 42)->get();
        $abonado = Abonado::orderBy('id')->get();
        $cctv = Host::where('host_type_id', 40)->get();
        $cardsim = Card_sim::where('host_id', null)->get();

        return view('dispositivos.forms.sdis.add_comunicator', [
        'clientes' => $cliente,
        'modelos'  => $modelo,
        'abonados'  => $abonado,
        'cctvs'  => $cctv,
        'cardsims'  => $cardsim,

       ]);
    }

    public function createComunicator(Request $request)
    {
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

    public function editComunicator($id, Request $request)
    {
        $host = $this->findByIdHost($id);
        $estado = Estado::all();
        $modelo = Modelo::where('host_type_id', 42)->get();
        $abonado = Abonado::all();
        $cardsim = Card_sim::where('host_id', null)->get();
        $cctv = Host::where('host_type_id', 40)->get();

        return view('dispositivos.edit.sdis.comunicator', [
            'host' => $host,
            'estados' => $estado,
            'abonados' => $abonado,
            'modelos' => $modelo,
            'cardsims' => $cardsim,
            'cctvs' => $cctv,
        ]);
    }

    public function updateComunicator($id, Request $request)
    {
        $user = $request->user();
        $host = $this->findByIdHost($id);

        if (!is_null($request->input('card_sim_i'))) {
            if (!is_null($host->sim_i)) {
                $deletehostid = $this->findByIdCardsim($host->sim_i->id);
                $deletehostid->host_id = null;
                $deletehostid->save();
            }

            $cardsim_i = $this->findByIdCardsim($request->input('card_sim_i'));
            $cardsim_i->host_id = $host->id;
            $cardsim_i->save();
        } else {
            if (!is_null($host->sim_i)) {
                $cardsim_i = $this->findByIdCardsim($host->sim_i->id);
                $cardsim_i->host_id = null;
                $cardsim_i->save();
            }
        }


        if (!is_null($request->input('card_sim_ii'))) {
            if (!is_null($host->sim_ii)) {
                $deletehostid = $this->findByIdCardsim($host->sim_ii->id);
                $deletehostid->host_id = null;
                $deletehostid->save();
            }

            $cardsim_ii = $this->findByIdCardsim($request->input('card_sim_ii'));
            $cardsim_ii->host_id = $host->id;
            $cardsim_ii->save();
        } else {
            if (!is_null($host->sim_ii)) {
                $cardsim_ii = $this->findByIdCardsim($host->sim_ii->id);
                $cardsim_ii->host_id = null;
                $cardsim_ii->save();
            }
        }

        if (!is_null($request->input('card_sim_iii'))) {
            if (!is_null($host->sim_iii)) {
                $deletehostid = $this->findByIdCardsim($host->sim_iii->id);
                $deletehostid->host_id = null;
                $deletehostid->save();
            }

            $cardsim_iii = $this->findByIdCardsim($request->input('card_sim_iii'));
            $cardsim_iii->host_id = $host->id;
            $cardsim_iii->save();
        } else {
            if (!is_null($host->sim_iii)) {
                $cardsim_iii = $this->findByIdCardsim($host->sim_iii->id);
                $cardsim_iii->host_id = null;
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




    public function showSirena(Request $request)
    {
        $host = Host::where('host_type_id', 45)->where('estado_id', 1)->get();
        return view('dispositivos.tables.sdis.sirenas', [
        'hosts' => $host,
      ]);
    }

    public function onlySirena($id, Request $request)
    {
        $host = $this->findByIdHost($id);
        $hostwork = Host_work::where('host_id', $id)->get();
        $now = Carbon::now();

        return view('dispositivos.onlys.sdis.sirena', [
          'host' => $host,
          'hostworks' => $hostwork,
          'now' => $now,
      ]);
    }

    public function formSirena(Request $request)
    {
        $cliente = Cliente::orderBy('name')->get();
        $modelo = Modelo::where('host_type_id', 45)->get();
        $panel_alarm = Host::where('host_type_id', 40)->get();

        return view('dispositivos.forms.sdis.add_sirena', [
        'clientes' => $cliente,
        'modelos'  => $modelo,
        'panel_alarms'  => $panel_alarm,

       ]);
    }

    public function createSirena(Request $request)
    {
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

    public function editSirena($id, Request $request)
    {
        $host = $this->findByIdHost($id);
        $estado = Estado::all();
        $modelo = Modelo::where('host_type_id', 43)->get();

        $panel_alarm = Host::where('host_type_id', 40)->get();

        return view('dispositivos.edit.sdis.sirena', [
            'host' => $host,
            'estados' => $estado,
            'modelos' => $modelo,
            'panel_alarms' => $panel_alarm,
        ]);
    }

    public function updateSirena($id, Request $request)
    {
        $user = $request->user();
        $host = $this->findByIdHost($id);
        $host->name = $request->input('name');
        $host->serial = $request->input('serial');
        $host->estado_id = $request->input('estado');
        $host->modelo_id = $request->input('modelo_id');
        $host->cctv_id = $request->input('cctv_id');
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


        return redirect('/only_sirena/' . $id);
    }




    public function showSensor(Request $request)
    {
        $host = Host::where('host_type_id', 43)->where('estado_id', 1)->get();
        return view('dispositivos.tables.sdis.sensors', [
        'hosts' => $host,
      ]);
    }

    public function onlySensor($id, Request $request)
    {
        $host = $this->findByIdHost($id);
        $hostwork = Host_work::where('host_id', $id)->get();
        $now = Carbon::now();

        return view('dispositivos.onlys.sdis.sensor', [
          'host' => $host,
          'hostworks' => $hostwork,
          'now' => $now,
      ]);
    }

    public function formSensor(Request $request)
    {
        $cliente = Cliente::orderBy('name')->get();
        $modelo = Modelo::where('host_type_id', 43)->get();
        $panel_alarm = Host::where('host_type_id', 40)->get();
        $expansora = Host::where('host_type_id', 41)->get();
        $teclado = Host::where('host_type_id', 44)->get();

        return view('dispositivos.forms.sdis.add_sensor', [
        'clientes' => $cliente,
        'modelos'  => $modelo,
        'panel_alarms'  => $panel_alarm,
        'expansoras'  => $expansora,
        'teclados'  => $teclado,

       ]);
    }

    public function createSensor(Request $request)
    {
        $user = $request->user();
        $host = Host::create([

        'host_type_id' => 43,
        'estado_id' => 1,
        'name' => $request->input('name'),
        'modelo_id' => $request->input('modelo_id'),
        'serial' => $request->input('serial'),
        'cctv_id' => $request->input('cctv_id'),
        'valor' => $request->input('valor'),
        'zona' => $request->input('zona'),
        'comentario' => $request->input('comentario'),
          ]);

        return redirect('/sensors');
    }

    public function editSensor($id, Request $request)
    {
        $host = $this->findByIdHost($id);
        $estado = Estado::all();
        $modelo = Modelo::where('host_type_id', 43)->get();

        $panel_alarm = Host::where('host_type_id', 40)->get();
        $expansora = Host::where('host_type_id', 41)->get();
        $teclado = Host::where('host_type_id', 44)->get();

        return view('dispositivos.edit.sdis.sensor', [
            'host' => $host,
            'estados' => $estado,
            'modelos' => $modelo,
            'panel_alarms' => $panel_alarm,
            'expansoras' => $expansora,
            'teclados' => $teclado,
        ]);
    }

    public function updateSensor($id, Request $request)
    {
        $user = $request->user();
        $host = $this->findByIdHost($id);
        $host->name = $request->input('name');
        $host->serial = $request->input('serial');
        $host->estado_id = $request->input('estado');
        $host->modelo_id = $request->input('modelo_id');
        $host->cctv_id = $request->input('cctv_id');
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




    public function showPanicos(Request $request)
    {
        $host = Host::where('host_type_id', 46)->where('estado_id', 1)->get();
        return view('dispositivos.tables.sdis.panicos', [
        'hosts' => $host,
      ]);
    }

    public function onlyPanico($id, Request $request)
    {
        $host = $this->findByIdHost($id);
        $hostwork = Host_work::where('host_id', $id)->get();
        $now = Carbon::now();

        return view('dispositivos.onlys.sdis.panico', [
          'host' => $host,
          'hostworks' => $hostwork,
          'now' => $now,
      ]);
    }

    public function formPanico(Request $request)
    {
        $abonado = Abonado::all();
        $cardsim = Card_sim::where('host_id', null)->get();
        $modelo = Modelo::where('host_type_id', 46)->get();
        $departament = Departament::orderBy('name')->get();
        //dd($abonado);

        return view('dispositivos.forms.sdis.add_panico', [
        'abonados' => $abonado,
        'modelos'  => $modelo,
        'cardsims'  => $cardsim,
        'departaments' => $departament

       ]);
    }

    public function createPanico(Request $request)
    {
        $user = $request->user();
        $host = Host::create([
          'host_type_id' => 46,
          'estado_id' => 1,
          'name' => $request->input('name'),
          'modelo_id' => $request->input('modelo_id'),
          'serial' => $request->input('serial'),
          'card_sim_i' => $request->input('card_sim_i'),
          'card_sim_ii' => $request->input('card_sim_ii'),
          'card_sim_iii' => $request->input('card_sim_iii'),
          'valor' => $request->input('valor'),
          'zona' => $request->input('zona'),
          'comentario' => $request->input('comentario'),
          ]);

        if ($request->input('abonado_id')) {
            $host->abonado_id = $request->input('abonado_id');
        }

        if ($request->input('departament_id')) {
            $host->departament_id = $request->input('departament_id');
        }
        $host->save();


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


        return redirect('/panicos');
    }

    public function editPanico($id, Request $request)
    {
        $host = $this->findByIdHost($id);
        $abonado = Abonado::all();
        $departament = Departament::orderBy('name')->get();
        $estado = Estado::all();
        $modelo = Modelo::where('host_type_id', 46)->get();
        $cardsim = Card_sim::where('host_id', null)->get();

        return view('dispositivos.edit.sdis.panico', [
            'host' => $host,
            'abonados' => $abonado,
            'departaments' => $departament,
            'estados' => $estado,
            'modelos' => $modelo,
            'cardsims' => $cardsim,
        ]);
    }

    public function updatePanico($id, Request $request)
    {
        $user = $request->user();
        $host = $this->findByIdHost($id);


        if (!is_null($request->input('card_sim_i'))) {
            if (!is_null($host->sim_i)) {
                $deletehostid = $this->findByIdCardsim($host->sim_i->id);
                $deletehostid->host_id = null;
                $deletehostid->save();
            }

            $cardsim_i = $this->findByIdCardsim($request->input('card_sim_i'));
            $cardsim_i->host_id = $host->id;
            $cardsim_i->save();
        } else {
            if (!is_null($host->sim_i)) {
                $cardsim_i = $this->findByIdCardsim($host->sim_i->id);
                $cardsim_i->host_id = null;
                $cardsim_i->save();
            }
        }

        if (!is_null($request->input('card_sim_ii'))) {
            if (!is_null($host->sim_ii)) {
                $deletehostid = $this->findByIdCardsim($host->sim_ii->id);
                $deletehostid->host_id = null;
                $deletehostid->save();
            }

            $cardsim_ii = $this->findByIdCardsim($request->input('card_sim_ii'));
            $cardsim_ii->host_id = $host->id;
            $cardsim_ii->save();
        } else {
            if (!is_null($host->sim_ii)) {
                $cardsim_ii = $this->findByIdCardsim($host->sim_ii->id);
                $cardsim_ii->host_id = null;
                $cardsim_ii->save();
            }
        }

        if (!is_null($request->input('card_sim_iii'))) {
            if (!is_null($host->sim_iii)) {
                $deletehostid = $this->findByIdCardsim($host->sim_iii->id);
                $deletehostid->host_id = null;
                $deletehostid->save();
            }

            $cardsim_iii = $this->findByIdCardsim($request->input('card_sim_iii'));
            $cardsim_iii->host_id = $host->id;
            $cardsim_iii->save();
        } else {
            if (!is_null($host->sim_iii)) {
                $cardsim_iii = $this->findByIdCardsim($host->sim_iii->id);
                $cardsim_iii->host_id = null;
                $cardsim_iii->save();
            }
        }


        $host->name = $request->input('name');
        $host->serial = $request->input('serial');
        $host->estado_id = $request->input('estado');
        $host->modelo_id = $request->input('modelo_id');
        $host->abonado_id = $request->input('abonado_id');
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


        return redirect('/only_panico/' . $id);
    }



    public function showTrackers(Request $request)
    {
        $host = Host::where('host_type_id', 47)->where('estado_id', 1)->get();
        return view('dispositivos.tables.sdis.trackers', [
        'hosts' => $host,
      ]);
    }

    public function onlyTracker($id, Request $request)
    {
        $host = $this->findByIdHost($id);
        $hostwork = Host_work::where('host_id', $id)->get();
        $now = Carbon::now();

        return view('dispositivos.onlys.sdis.tracker', [
          'host' => $host,
          'hostworks' => $hostwork,
          'now' => $now,
      ]);
    }

    
    public function formTracker(Request $request)
    {
        $abonado = Abonado::all();
        $cardsim = Card_sim::where('host_id', null)->get();
        $modelo = Modelo::where('host_type_id', 47)->get();
        //dd($abonado);

        return view('dispositivos.forms.sdis.add_tracker', [
        'abonados' => $abonado,
        'modelos'  => $modelo,
        'cardsims'  => $cardsim,

       ]);
    }

    public function createTracker(Request $request)
    {
        $user = $request->user();
        $host = Host::create([

        'host_type_id' => 47,
        'estado_id' => 1,
        'name' => $request->input('name'),
        'modelo_id' => $request->input('modelo_id'),
        'serial' => $request->input('serial'),
        'abonado_id' => $request->input('abonado_id'),
        'card_sim_i' => $request->input('card_sim_i'),
        'card_sim_ii' => $request->input('card_sim_ii'),
        'card_sim_iii' => $request->input('card_sim_iii'),
        'valor' => $request->input('valor'),
        'zona' => $request->input('zona'),
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


        return redirect('/trackers');
    }

    public function editTracker($id, Request $request)
    {
        $host = $this->findByIdHost($id);
        $abonado = Abonado::all();
        $estado = Estado::all();
        $modelo = Modelo::where('host_type_id', 46)->get();
        $cardsim = Card_sim::where('host_id', null)->get();

        return view('dispositivos.edit.sdis.panico', [
            'host' => $host,
            'abonados' => $abonado,
            'estados' => $estado,
            'modelos' => $modelo,
            'cardsims' => $cardsim,
        ]);
    }

    public function updateTracker($id, Request $request)
    {
        $user = $request->user();
        $host = $this->findByIdHost($id);


        if (!is_null($request->input('card_sim_i'))) {
            if (!is_null($host->sim_i)) {
                $deletehostid = $this->findByIdCardsim($host->sim_i->id);
                $deletehostid->host_id = null;
                $deletehostid->save();
            }

            $cardsim_i = $this->findByIdCardsim($request->input('card_sim_i'));
            $cardsim_i->host_id = $host->id;
            $cardsim_i->save();
        } else {
            if (!is_null($host->sim_i)) {
                $cardsim_i = $this->findByIdCardsim($host->sim_i->id);
                $cardsim_i->host_id = null;
                $cardsim_i->save();
            }
        }

        if (!is_null($request->input('card_sim_ii'))) {
            if (!is_null($host->sim_ii)) {
                $deletehostid = $this->findByIdCardsim($host->sim_ii->id);
                $deletehostid->host_id = null;
                $deletehostid->save();
            }

            $cardsim_ii = $this->findByIdCardsim($request->input('card_sim_ii'));
            $cardsim_ii->host_id = $host->id;
            $cardsim_ii->save();
        } else {
            if (!is_null($host->sim_ii)) {
                $cardsim_ii = $this->findByIdCardsim($host->sim_ii->id);
                $cardsim_ii->host_id = null;
                $cardsim_ii->save();
            }
        }

        if (!is_null($request->input('card_sim_iii'))) {
            if (!is_null($host->sim_iii)) {
                $deletehostid = $this->findByIdCardsim($host->sim_iii->id);
                $deletehostid->host_id = null;
                $deletehostid->save();
            }

            $cardsim_iii = $this->findByIdCardsim($request->input('card_sim_iii'));
            $cardsim_iii->host_id = $host->id;
            $cardsim_iii->save();
        } else {
            if (!is_null($host->sim_iii)) {
                $cardsim_iii = $this->findByIdCardsim($host->sim_iii->id);
                $cardsim_iii->host_id = null;
                $cardsim_iii->save();
            }
        }


        $host->name = $request->input('name');
        $host->serial = $request->input('serial');
        $host->estado_id = $request->input('estado');
        $host->modelo_id = $request->input('modelo_id');
        $host->abonado_id = $request->input('abonado_id');
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


        return redirect('/only_tracker/' . $id);
    }



    //ADMINISTRACION SDI
    public function showPlataformas(Request $request)
    {
        $plataforma = Plataforma::all();
        $ver = "agregar";
        return view('dispositivos.tables.sdis.plataformas', [
        'plataformas' => $plataforma,
        'ver' => $ver,
      ]);
    }

    public function createPlataforma(Request $request)
    {
        $user = $request->user();
        $plataforma = Plataforma::create([
        'name' => $request->input('name'),
          ]);

        return redirect('/plataformas');
    }

    public function editPlataforma($id, Request $request)
    {
        $plataforma = Plataforma::all();
        $onlyPlataforma = $this->findByIdPlataforma($id);
        $ver = "editar";

        return view('dispositivos.tables.sdis.plataformas', [
            'onlyPlataforma' => $onlyPlataforma,
            'ver' => $ver,
            'plataformas' => $plataforma,
        ]);
    }

    public function updatePlataforma($id, Request $request)
    {
        $user = $request->user();
        $plataforma = $this->findByIdPlataforma($id);
        $plataforma->name = $request->input('name');
        $plataforma->save();

        // $historial = Historial::create([
        //     'user_id' => $user->id,
        //     'host_id' => $host->id,
        //     'type' => 1,
        //   ]);


        return redirect('/plataformas');
    }




    public function showAbonadoTypes(Request $request)
    {
        $abonado_type = Abonadotype::all();
        $ver = "agregar";
        return view('dispositivos.tables.sdis.abonados_type', [
        'abonado_types' => $abonado_type,
        'ver' => $ver,
      ]);
    }

    public function createAbonadoType(Request $request)
    {
        $user = $request->user();
        $abonado_type = Abonadotype::create([
        'name' => $request->input('name'),
          ]);

        return redirect('/abonado_types');
    }

    public function editAbonadoType($id, Request $request)
    {
        $abonado_type = Abonadotype::all();
        $onlyAbonadoType = $this->findByIdAbonadoType($id);
        $ver = "editar";

        return view('dispositivos.tables.sdis.abonados_type', [
            'onlyAbonadoType' => $onlyAbonadoType,
            'abonado_types' => $abonado_type,
            'ver' => $ver,

        ]);
    }

    public function updateAbonadoType($id, Request $request)
    {
        $user = $request->user();
        $abonado = $this->findByIdAbonadoType($id);
        $abonado->name = $request->input('name');
        $abonado->save();

        // $historial = Historial::create([
        //     'user_id' => $user->id,
        //     'host_id' => $host->id,
        //     'type' => 1,
        //   ]);


        return redirect('/abonado_types');
    }


    //PASSWOR ABONADOS
    public function showPasswordAbonado($id, Request $request)
    {
        $abonado = $this->findByIdAbonado($id);

        $passwordAbonado = Password_abonado::where('abonado_id', $abonado->id)->get();
        $ver = "agregar";
        return view('dispositivos.tables.sdis.password_abonados', [
        'abonado' => $abonado,
        'passwordAbonados' => $passwordAbonado,
        'ver' => $ver,
      ]);
    }

    public function createPasswordAbonado(Request $request)
    {
        //dd($request->input('abonado_id'));
        $user = $request->user();
        $password_abonado = Password_abonado::create([
          'abonado_id' => $request->input('abonado_id'),
          'password' => $request->input('password'),
          'particion' => $request->input('particion'),
          ]);

        return redirect('/passwords_abonado/' . $request->input('abonado_id'));
    }





    //FUNCIONES
    private function findByIdHost($id)
    {
        return Host::where('id', $id)->firstOrFail();
    }

    private function findByIdAbonado($id)
    {
        return Abonado::where('id', $id)->firstOrFail();
    }

    private function findByIdCardsim($id)
    {
        return Card_sim::where('id', $id)->firstOrFail();
    }

    private function findByIdPlataforma($id)
    {
        return Plataforma::where('id', $id)->firstOrFail();
    }

    private function findByIdAbonadoType($id)
    {
        return Abonadotype::where('id', $id)->firstOrFail();
    }

    private function findByIdPasswordAbonado($id)
    {
        return Abonadotype::where('id', $id)->firstOrFail();
    }

    private function deleteCardSim()
    {
    }

    private function saveHostIdCardSim()
    {
    }
}
