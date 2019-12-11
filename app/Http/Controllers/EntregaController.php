<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Modelo;
use App\Departament;
use App\User_host;
use App\Cliente;
use App\Host;
use App\Host_mov;
use App\Fichas_entregas;
use Carbon\Carbon;


class EntregaController extends Controller
{

  public function showFichaentrega(Request $request){
    $ficha = Fichas_entregas::orderBy('id')->get();

    return view('administracion.fichasentrega.fichasentrega', [
      'fichas' => $ficha,
    ]);

  }

  public function showEntregas(Request $request){
    $host_mov = Host_mov::orderBy('ficha_entrega_id')->get();

    return view('administracion.fichasentrega.entregas', [
      'host_movs' => $host_mov,
    ]);

  }

  public function formFichaentrega(Request $request){

    $last = Fichas_entregas::all()->max('id')+1;
    $modelo = Modelo::all();

    $host = Host::whereNull('user_host_id')
      ->whereIn('host_type_id', [1, 2])
      ->orderBy('host_type_id','DESC')
      ->get();

    $departament = Departament::all();
    $userhost = User_host::orderBy('name')->get();
    $cliente = Cliente::all();
    $entrega_id = Fichas_entregas::all()->max('id') + 1;

    return view('administracion.fichasentrega.add_fichaentrega', [
      'departaments' => $departament,
      'clientes' => $cliente,
      'userhosts' => $userhost,
      'hosts' => $host,
      'last' => $last,

     ]);

  }

  public function formFichaentregaonly($id,Request $request){

    $last = Fichas_entregas::all()->max('id')+1;
    $host = Host::where('id',$id)->firstOrFail();
    $userhost = User_host::orderBy('name')->get();

    return view('administracion.fichasentrega.add_fichaentregaonly', [
      'userhosts' => $userhost,
      'host' => $host,
      'last' => $last,

     ]);

  }

  public function createFichaentrega(Request $request){
      $detalle = $request->input('detalle');

      $fichas = Fichas_entregas::create([
        'name' => Carbon::now()->format('Ymd')."USH".$request->input('user_host_id')."DPR".User_host::where('id',$request->input('user_host_id'))->firstOrFail()->departament->name,
        'user_host_id' => $request->input('user_host_id'),
        'detalle'=> $request->input('detalle'),
        'fecha'=> $request->input('fecha'),
        'type'=> 1, //ENTREGA
      ]);

      //dd($request->input('fecha'));

        for ($i=0; $i < count($detalle); $i++) {
          $host_id = (int)$detalle[$i]['host_id'];
          if ($host_id != 0) {
          $entrega = Host_mov::create([
            'host_id' => $host_id,
            'ficha_entrega_id' => $fichas->id,
            'user_host_id' => $request->input('user_host_id'),
            'type' => 1,
          ]);
          $host = $this->findByIdHost($host_id);
          $host->user_host_id = $request->input('user_host_id');
          $host->save();
        }
      }

      switch ($request->input('reddi')) {
        case 0:
           if ($host->host_type_id == 1) { return redirect('/only_computadora/'.$host->id); }
           if ($host->host_type_id == 2) { return redirect('/only_notebook/'.$host->id); }
          break;
        case 1:
            return redirect('/entregas/');
          break;

        default:
          // code...
          break;
      }

  }

  public function downdFichaentrega($id,$type, Request $request){
      $host_02 = "";
      $fichasentrega = Fichas_entregas::where('id',$id)->firstOrFail();

      if (isset($fichasentrega->detalle[0]["host_id"])) {
        $host_01 = Host::where('id',$fichasentrega->detalle[0]["host_id"])->firstOrFail();
        $modelo_01 = Modelo::where('id',$host_01->modelo_id)->firstOrFail();

      }

      if (isset($fichasentrega->detalle[1]["host_id"])) {
        $host_02 = Host::where('id',$fichasentrega->detalle[1]["host_id"])->firstOrFail();
        $modelo_02 = Modelo::where('id',$host_02->modelo_id)->firstOrFail();
      }else {
        $host_02 = NULL;
        $modelo_02 = NULL;
      }

      if (isset($fichasentrega->detalle[2]["host_id"])) {
        $host_03 = Host::where('id',$fichasentrega->detalle[2]["host_id"])->firstOrFail();
        $modelo_03 = Modelo::where('id',$host_03->modelo_id)->firstOrFail();
      }else {
        $host_03 = NULL;
        $modelo_03 = NULL;
      }

      if (isset($fichasentrega->detalle[3]["host_id"])) {
        $host_04 = Host::where('id',$fichasentrega->detalle[3]["host_id"])->firstOrFail();
        $modelo_04 = Modelo::where('id',$host_04->modelo_id)->firstOrFail();
      }else {
        $host_04 = NULL;
        $modelo_04 = NULL;
      }

      if (isset($fichasentrega->detalle[4]["host_id"])) {
        $host_05 = Host::where('id',$fichasentrega->detalle[4]["host_id"])->firstOrFail();
        $modelo_05 = Modelo::where('id',$host_05->modelo_id)->firstOrFail();
      }else {
        $host_05 = NULL;
        $modelo_05 = NULL;
      }

      //$departament = Departament::where('id',$fichasentrega->departament_id)->firstOrFail();
      //dd($departament);
      //dd($departament->id. " ".$departament->name);
      //$cliente = Cliente::where('id',$departament->cliente_id)->firstOrFail();
      //dd($cliente->id." ".$cliente->name);

      $cliente_id = $fichasentrega->user_host->departament->cliente->id;
      $view =  \View::make('administracion.fichasentrega.pdf.fichadeentega',
      compact('fichasentrega','host_01','modelo_01','host_02','modelo_02','host_03','modelo_03','host_04','modelo_04','host_05','modelo_05','cliente_id'
      ))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      //$pdf->download('fichasentrega.pdf');


      //return $pdf->stream('fichadeentega.pdf');
    if ($type == "d") {return $pdf->download($fichasentrega->name.'.pdf');}
    if ($type == "v") {return $pdf->stream($fichasentrega->name.'.pdf');}
  }

  private function findByIdHost($id){
      return Host::where('id', $id)->firstOrFail();
  }
  private function findByIdHostmov($id){
      return Host_mov::where('id', $id)->firstOrFail();
  }


}
