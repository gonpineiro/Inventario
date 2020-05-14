<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Host;
use App\Departament;
use App\Estado;
use App\Modelo;
use App\Historial;
use App\Cliente;
use App\Host_work;
use App\User_host;
use App\Host_mov;
use App\Fichas_entregas;
use Carbon\Carbon;
use App\Credential;
use App\Licensekey;

class HostsController extends Controller
{
    public function show(Request $request)
    {
        $host = Host::where('host_type_id', 1)
            ->orWhere('host_type_id', 2)
            ->orWhere('host_type_id', 3)
            ->orWhere('host_type_id', 4)
            ->where('estado_id', 1)
            ->get();

        return view('dispositivos.tables.hosts.hosts', [
            'hosts' => $host,
          ]);
    }


    //COMPUTADORAS CONTROLLER
    public function showComputadoras(Request $request)
    {
        $host = Host::where('host_type_id', 1)->where('estado_id', 1)->get();

        return view('dispositivos.tables.hosts.computadoras', [
            'hosts' => $host,
          ]);
    }

    public function showComputadorasDisable(Request $request)
    {
        $host = Host::where('host_type_id', 1)->where('estado_id', 2)->get();

        return view('dispositivos.tables.hosts.computadoras', [
            'hosts' => $host,
          ]);
    }

    public function showComputadorasStock(Request $request)
    {
        $host = Host::where('host_type_id', 1)->where('estado_id', 3)->get();

        return view('dispositivos.tables.hosts.computadoras', [
            'hosts' => $host,
          ]);
    }

    public function onlyComputadora($id, Request $request)
    {
        $host = $this->findByIdHost($id);
        $hostwork = Host_work::where('host_id', $id)->get();
        $license = Licensekey::where('host_id', $id)->get();
        $now = Carbon::now();

        return view('dispositivos.onlys.hosts.computadora', [
              'host' => $host,
              'hostworks' => $hostwork,
              'now' => $now,
              'licenses' => $license,
          ]);
    }

    public function formComputadora(Request $request)
    {
        $estado = Estado::all();
        $modelo = Modelo::where('host_type_id', 1)->get();
        $departament = Departament::orderBy('name')->get();
        $userhost = User_host::orderBy('name')->get();
        $cliente = Cliente::all();

        return view('dispositivos.forms.hosts.add_computadora', [
            'estados' => $estado,
            'departaments' => $departament,
            'modelos' => $modelo,
            'clientes' => $cliente,
            'userhosts' => $userhost,

           ]);
    }

    public function createComputaora(Request $request)
    {
        $user = $request->user();
        $computadora = Host::create([

              'name' => $request->input('name'),
              'host_type_id' =>1,
              'modelo_id' => $request->input('modelo'),
              'serial' => $request->input('serial'),
              'estado_id' => $request->input('estado'),
              'mac_adress' => $request->input('mac_adress'),
              'ip_local' => $request->input('ip_local'),
              'departament_id' => $request->input('departament'),
              'comentario' => $request->input('comentario'),
              'valor' => $request->input('valor'),
              'estado_id' => 1,
              'class' => $request->input('class'),
              'os_cred' => $request->input('os_cred'),
              'user_host_id' => $request->input('user_host_id'),
                ]);

        $historial = Historial::create([
              'user_id' => $user->id,
              'host_id' => $computadora->id,
              'type' => 0,
              ]);

        return redirect('/computadoras');
    }

    public function editComputadora($id, Request $request)
    {
        $host = $this->findByIdHost($id);
        $estado = Estado::all();
        $departament = Departament::all();
        $modelo = Modelo::where('host_type_id', 1)->get();

        return view('dispositivos.edit.hosts.computadora', [
                'host' => $host,
                'estados' => $estado,
                'departaments' => $departament,
                'modelos' => $modelo,

            ]);
    }

    public function updateComputadora($id, Request $request)
    {
        $user = $request->user();
        $host = $this->findByIdHost($id);

        $host->name = $request->input('name');
        $host->modelo_id = $request->input('modelo_id');
        $host->serial = $request->input('serial');
        $host->estado_id = $request->input('estado');
        $host->mac_adress = $request->input('mac_adress');
        $host->ip_local = $request->input('ip_local');
        $host->departament_id = $request->input('departament');
        $host->valor = $request->input('valor');
        $host->comentario = $request->input('comentario');
        $host->class = $request->input('class');
        $host->os_cred = $request->input('os_cred');
        $host->estado_id = $request->input('estado');

        if ($request->input('retirar_host') == true) {

              //CREAMOS EL ARRAY QUE CONTIENE EL DETALLE DE LA DEVOLUCION PARA LA FICHA
            $detalle[0] = [
                "cantidad" => "1",
                "host_id" => $host->id,
                "obs" => $request->input('comentario_entrega')];
            //dd($detalle);
            $fichas = Fichas_entregas::create([
                'name' => Carbon::now()->format('Ymd')."USH".$request->input('user_host_id')."DPR".User_host::where('id', $host->user_host_id)->firstOrFail()->departament->name,
                'user_host_id' => $host->user_host_id,
                'detalle'=> $detalle,
                'fecha'=> $request->input('fecha'),
                'type'=> 0, //DEVOLUCION
              ]);


            $host->user_host_id = null;
            $entrega = Host_mov::create([
                'host_id' => $host->id,
                'ficha_entrega_id' => $fichas->id,
                'user_host_id' => $request->input('user_host_id'),
                'type' => 0, //DEVOLUCION
              ]);
        }

        $host->save();

        $historial = Historial::create([
                'user_id' => $user->id,
                'host_id' => $host->id,
                'type' => 1,
              ]);


        return redirect('/only_computadora/' . $id);
    }





    public function showNotebooks(Request $request)
    {
        $host = Host::where('host_type_id', 2)->where('estado_id', 1)->get();

        return view('dispositivos.tables.hosts.notebooks', [
            'hosts' => $host,
          ]);
    }

    public function showNotebooksDisable(Request $request)
    {
        $host = Host::where('host_type_id', 2)->where('estado_id', 2)->get();

        return view('dispositivos.tables.hosts.notebooks', [
            'hosts' => $host,
          ]);
    }

    public function showNotebooksStock(Request $request)
    {
        $host = Host::where('host_type_id', 2)->where('estado_id', 3)->get();

        return view('dispositivos.tables.hosts.notebooks', [
            'hosts' => $host,
          ]);
    }

    public function onlyNotebook($id, Request $request)
    {
        $host = $this->findByIdHost($id);
        $hostwork = Host_work::where('host_id', $id)->get();
        $license = Licensekey::where('host_id', $id)->get();
        $now = Carbon::now();

        return view('dispositivos.onlys.hosts.notebook', [
              'host' => $host,
              'hostworks' => $hostwork,
              'now' => $now,
              'licenses' => $license,
          ]);
    }

    public function formNotebook(Request $request)
    {
        $estado = Estado::all();
        $modelo = Modelo::where('host_type_id', 2)->get();
        $departament = Departament::orderBy('name')->get();
        $cliente = Cliente::all();
        $userhost = User_host::orderBy('name')->get();

        return view('dispositivos.forms.hosts.add_notebook', [
            'estados' => $estado,
            'departaments' => $departament,
            'modelos' => $modelo,
            'clientes' => $cliente,
            'userhosts' => $userhost,

           ]);
    }

    public function createNotebook(Request $request)
    {
        $user = $request->user();
        $computadora = Host::create([

              'name' => $request->input('name'),
              'host_type_id' => 2,
              'modelo_id' => $request->input('modelo'),
              'serial' => $request->input('serial'),
              'estado_id' => $request->input('estado'),
              'mac_adress' => $request->input('mac_adress'),
              'ip_local' => $request->input('ip_local'),
              'departament_id' => $request->input('departament'),
              'comentario' => $request->input('comentario'),
              'valor' => $request->input('valor'),
              'estado_id' => 1,
              'class' => $request->input('class'),
              'os_cred' => $request->input('os_cred'),
                ]);


        $historial = Historial::create([
              'user_id' => $user->id,
              'host_id' => $computadora->id,
              'type' => 0,
              ]);

        return redirect('/notebooks');
    }

    public function editNotebook($id, Request $request)
    {
        $host = $this->findByIdHost($id);
        $estado = Estado::all();
        $departament = Departament::all();
        $modelo = Modelo::where('host_type_id', 2)->get();

        return view('dispositivos.edit.hosts.notebook', [
                'host' => $host,
                'estados' => $estado,
                'departaments' => $departament,
                'modelos' => $modelo,

            ]);
    }

    public function updateNotebook($id, Request $request)
    {
        $user = $request->user();
        $host = $this->findByIdHost($id);

        $host->name = $request->input('name');
        $host->modelo_id = $request->input('modelo_id');
        $host->serial = $request->input('serial');
        $host->estado_id = $request->input('estado');
        $host->mac_adress = $request->input('mac_adress');
        $host->ip_local = $request->input('ip_local');
        $host->departament_id = $request->input('departament');
        $host->valor = $request->input('valor');
        $host->comentario = $request->input('comentario');
        $host->class = $request->input('class');
        $host->os_cred = $request->input('os_cred');
        $host->estado_id = $request->input('estado');


        if ($request->input('retirar_host') == true) {

              //CREAMOS EL ARRAY QUE CONTIENE EL DETALLE DE LA DEVOLUCION PARA LA FICHA
            $detalle[0] = [
                "cantidad" => "1",
                "host_id" => $host->id,
                "obs" => $request->input('comentario_entrega')];
            //dd($detalle);
            $fichas = Fichas_entregas::create([
                'name' => Carbon::now()->format('Ymd')."USH".$request->input('user_host_id')."DPR".User_host::where('id', $host->user_host_id)->firstOrFail()->departament->name,
                'user_host_id' => $host->user_host_id,
                'detalle'=> $detalle,
                'fecha'=> $request->input('fecha'),
                'type'=> 0, //DEVOLUCION
              ]);

            $host->user_host_id = null;

            $entrega = Host_mov::create([
                'host_id' => $host->id,
                'ficha_entrega_id' => $fichas->id,
                'user_host_id' => $request->input('user_host_id'),
                'type' => 0, //DEVOLUCION
              ]);
        }
        $host->save();

        $historial = Historial::create([
                'user_id' => $user->id,
                'host_id' => $host->id,
                'type' => 1,
              ]);


        return redirect('/only_notebook/' . $id);
    }


    //IMPRESORAS CONTROLLER
    public function showImpresoras(Request $request)
    {
        $host = Host::where('host_type_id', 3)->where('estado_id', 1)->get();
        return view('dispositivos.tables.hosts.impresoras', [
            'hosts' => $host,
          ]);
    }

    public function showImpresorasDisable(Request $request)
    {
        $host = Host::where('host_type_id', 3)->where('estado_id', 2)->get();
        return view('dispositivos.tables.hosts.impresoras', [
            'hosts' => $host,
          ]);
    }

    public function showImpresorasStock(Request $request)
    {
        $host = Host::where('host_type_id', 3)->where('estado_id', 3)->get();
        return view('dispositivos.tables.hosts.impresoras', [
            'hosts' => $host,
          ]);
    }

    public function onlyImpresora($id, Request $request)
    {
        $host = $this->findByIdHost($id);
        $hostwork = Host_work::where('host_id', $id)->get();
        $now = Carbon::now();

        return view('dispositivos.onlys.hosts.impresora', [
              'host' => $host,
              'hostworks' => $hostwork,
              'now' => $now,
          ]);
    }

    public function formImpresora(Request $request)
    {
        $estado = Estado::all();
        $modelo = Modelo::where('host_type_id', 3)
          ->orderBy('name')->get();
        $departament = Departament::all();

        $cliente = Cliente::all();

        return view('dispositivos.forms.hosts.add_impresora', [
            'estados' => $estado,
            'departaments' => $departament,
            'modelos' => $modelo,
            'clientes' => $cliente,

           ]);
    }

    public function createImpresora(Request $request)
    {
        $user = $request->user();
        $impresora = Host::create([
              'name' => $request->input('name'),
              'host_type_id' =>3,
              'modelo_id' => $request->input('modelo'),
              'serial' => $request->input('serial'),
              'estado_id' => $request->input('estado'),
              'mac_adress' => $request->input('mac_adress'),
              'ip_local' => $request->input('ip_local'),
              'acceso' => $request->input('acceso'),
              'departament_id' => $request->input('departament'),
              'acceso' => $request->input('acceso'),
              'valor' => $request->input('valor'),
              'comentario' => $request->input('comentario'),
              'estado_id' => 1,
              ]);
        $historial = Historial::create([
              'user_id' => $user->id,
              'host_id' => $impresora->id,
              'type' => 0,
              ]);

        return redirect('/impresoras');
    }

    public function editImpresora($id, Request $request)
    {
        $host = $this->findByIdHost($id);
        $estado = Estado::all();
        $departament = Departament::all();
        $modelo = Modelo::where('host_type_id', 3)->get();

        return view('dispositivos.edit.hosts.impresora', [
                'host' => $host,
                'estados' => $estado,
                'departaments' => $departament,
                'modelos' => $modelo,

            ]);
    }

    public function updateImpresora($id, Request $request)
    {
        $user = $request->user();
        $host = $this->findByIdHost($id);

        $host->name = $request->input('name');
        $host->modelo_id = $request->input('modelo_id');
        $host->serial = $request->input('serial');
        $host->estado_id = $request->input('estado');
        $host->mac_adress = $request->input('mac_adress');
        $host->ip_local = $request->input('ip_local');
        $host->departament_id = $request->input('departament');
        $host->valor = $request->input('valor');
        $host->comentario = $request->input('comentario');
        $host->class = $request->input('class');
        $host->estado_id = $request->input('estado');
        if ($request->input('retirar_host') == true) {
            $host->user_host_id = null;
        } else {
            $host->user_host_id = $request->input('user_host_id');
        }
        $host->save();

        $historial = Historial::create([
                'user_id' => $user->id,
                'host_id' => $host->id,
                'type' => 1,
              ]);


        return redirect('/only_impresora/' . $id);
    }


    //TELEFONOSIP CONTROLLER
    public function showTelefoniaips(Request $request)
    {
        $host = Host::where('host_type_id', 4)->where('estado_id', 1)->get();
        return view('dispositivos.tables.hosts.telefoniaips', [
            'hosts' => $host,
          ]);
    }

    public function showTelefoniaipsDisable(Request $request)
    {
        $host = Host::where('host_type_id', 4)->where('estado_id', 2)->get();
        return view('dispositivos.tables.hosts.telefoniaips', [
            'hosts' => $host,
          ]);
    }

    public function showTelefoniaipsStock(Request $request)
    {
        $host = Host::where('host_type_id', 4)->where('estado_id', 3)->get();
        return view('dispositivos.tables.hosts.telefoniaips', [
            'hosts' => $host,
          ]);
    }

    public function onlyTelefonoip($id, Request $request)
    {
        $host = $this->findByIdHost($id);
        $hostwork = Host_work::where('host_id', $id)->get();
        $now = Carbon::now();

        return view('dispositivos.onlys.hosts.telefoniaip', [
              'host' => $host,
              'hostworks' => $hostwork,
              'now' => $now,
          ]);
    }

    public function formTelefonoip(Request $request)
    {
        $estado = Estado::all();
        $modelo = Modelo::where('host_type_id', 4)
          ->orderBy('name')->get();
        $departament = Departament::all();

        $cliente = Cliente::all();

        return view('dispositivos.forms.hosts.add_telefonoip', [
            'estados' => $estado,
            'departaments' => $departament,
            'modelos' => $modelo,
            'clientes' => $cliente,

           ]);
    }

    public function createTelefonoip(Request $request)
    {
        $user = $request->user();
        $phoneip = Host::create([

              'name' => $request->input('name'),
              'host_type_id' =>4,
              'modelo_id' => $request->input('modelo'),
              'serial' => $request->input('serial'),
              'estado_id' => $request->input('estado'),
              'mac_adress' => $request->input('mac_adress'),
              'ip_local' => $request->input('ip_local'),
              'departament_id' => $request->input('departament'),
              'interno' => $request->input('interno'),
              'valor' => $request->input('valor'),
              'comentario' => $request->input('comentario'),
              'estado_id' => 1,
          ]);

        $historial = Historial::create([
            'user_id' => $user->id,
            'host_id' => $phoneip->id,
            'type' => 0,
          ]);

        return redirect('/telefoniaip');
    }

    public function editTelefonoip($id, Request $request)
    {
        $host = $this->findByIdHost($id);
        $estado = Estado::all();
        $departament = Departament::all();
        $modelo = Modelo::where('host_type_id', 3)->get();

        return view('dispositivos.edit.hosts.telefoniaip', [
                'host' => $host,
                'estados' => $estado,
                'departaments' => $departament,
                'modelos' => $modelo,

            ]);
    }

    public function updateTelefonoip($id, Request $request)
    {
        $user = $request->user();
        $host = $this->findByIdHost($id);

        $host->name = $request->input('name');
        $host->modelo_id = $request->input('modelo_id');
        $host->serial = $request->input('serial');
        $host->estado_id = $request->input('estado');
        $host->mac_adress = $request->input('mac_adress');
        $host->ip_local = $request->input('ip_local');
        $host->interno = $request->input('interno');
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


        return redirect('/only_telefonoip/' . $id);
    }

    public function showHostCred(Request $request)
    {
        $host = Host::where('host_type_id', 1)
            ->orWhere('host_type_id', 2)
            ->where('estado_id', 1)
            ->get();

        return view('dispositivos.tables.hosts.credentials', [
            'hosts' => $host,
          ]);
    }


    private function findByIdHost($id)
    {
        return Host::where('id', $id)->firstOrFail();
    }

    private function findByIdHostmov($id)
    {
        return Host_mov::where('id', $id)->firstOrFail();
    }
}
