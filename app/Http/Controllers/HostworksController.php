<?php

namespace App\Http\Controllers;


use App\Host_work;
use Illuminate\Http\Request;

class HostworksController extends Controller
{
        public function createHostwork($id, Request $request){

            $hostwork = Host_work::create([

              'fecha' => $request->input('fecha'),
              'trabajo' =>$request->input('trabajo'),
              'host_id' => $id,
              'comentario' => $request->input('comentario'),
                ]);

          if ($hostwork->host->host_type_id == 1) {return redirect('/only_computadora/'.$id);}
          if ($hostwork->host->host_type_id == 2) {return redirect('/only_notebook/'.$id);}
          if ($hostwork->host->host_type_id == 3) {return redirect('/only_impresora/'.$id);}
          if ($hostwork->host->host_type_id == 4) {return redirect('/only_telefonoip/'.$id);}

          if ($hostwork->host->host_type_id == 10) {return redirect('/only_modem/'.$id);}
          if ($hostwork->host->host_type_id == 11) {return redirect('/only_router/'.$id);}
          if ($hostwork->host->host_type_id == 12) {return redirect('/only_switch/'.$id);}
          if ($hostwork->host->host_type_id == 13) {return redirect('/only_accespoint/'.$id);}

          if ($hostwork->host->host_type_id == 20) {return redirect('/only_camaraip/'.$id);}
          if ($hostwork->host->host_type_id == 21) {return redirect('/only_dvr/'.$id);}
          if ($hostwork->host->host_type_id == 22) {return redirect('/only_camaraana/'.$id);}

          if ($hostwork->host->host_type_id == 30) {return redirect('/only_monitor/'.$id);}
          if ($hostwork->host->host_type_id == 31) {return redirect('/only_televisor/'.$id);}
          if ($hostwork->host->host_type_id == 32) {return redirect('/only_teclado/'.$id);}
          if ($hostwork->host->host_type_id == 33) {return redirect('/only_mouse/'.$id);}
          if ($hostwork->host->host_type_id == 34) {return redirect('/only_web_cam/'.$id);}

          if ($hostwork->host->host_type_id == 40) {return redirect('/only_panel_alarm/'.$id);}
          if ($hostwork->host->host_type_id == 41) {return redirect('/only_expansora/'.$id);}
          if ($hostwork->host->host_type_id == 42) {return redirect('/only_comunicator/'.$id);}
          if ($hostwork->host->host_type_id == 43) {return redirect('/only_sensor/'.$id);}
          if ($hostwork->host->host_type_id == 44) {return redirect('/only_teclado_sdi/'.$id);}
          if ($hostwork->host->host_type_id == 45) {return redirect('/only_sirena/'.$id);}

        }
}
