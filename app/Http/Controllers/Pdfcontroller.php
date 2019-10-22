<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Host;
use App\Credential;
use App\Abonado;
use Carbon\Carbon;
class Pdfcontroller extends Controller
{

      public function ReporteComputadorasPdf($tipo) {

         $hosts = Host::where('host_type_id', 1)->get();
         $cantHosts = Host::where('host_type_id',1)->count();
         $sumPrice = Host::where('host_type_id',1)->sum('valor');
         $reportName = "Computadoras";

         $view =  \View::make('pdf.computadoras',
         compact('hosts','cantHosts','sumPrice','reportName'))
         ->render();

         $pdf = \App::make('dompdf.wrapper');
         $pdf->loadHTML($view);

        // $nombreArchivo = $_SERVER['DOCUMENT_ROOT']."/Fichas de entrega/".Carbon::now()->format('Ymd')."_".".pdf";
         //$output = $pdf->output();

         //dd($nombreArchivo);

         if($tipo==1){return $pdf->stream('computadoras');}
         if($tipo==2){return $pdf->download('computadoras.pdf');}
         //if($tipo==3){return file_put_contents( $nombreArchivo, $output);}
        }

      public function ReporteNotebooksPdf($tipo) {

        $hosts = Host::where('host_type_id', 2)->get();
        $cantHosts = Host::where('host_type_id',2)->count();
        $sumPrice = Host::where('host_type_id',2)->sum('valor');
        $reportName = "Notebooks";

        $view =  \View::make('pdf.notebooks',
        compact('hosts','cantHosts','sumPrice','reportName'))
        ->render();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        if($tipo==1){return $pdf->stream('notebooks');}
        if($tipo==2){return $pdf->download('notebooks.pdf');}
        }

      public function ReporteImpresorasPdf($tipo) {

        $hosts = Host::where('host_type_id', 3)->get();
        $cantHosts = Host::where('host_type_id',3)->count();
        $sumPrice = Host::where('host_type_id',3)->sum('valor');
        $reportName = "Impresoras";

        $view =  \View::make('pdf.impresoras',
        compact('hosts','cantHosts','sumPrice','reportName'))
        ->render();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        if($tipo==1){return $pdf->stream('imppresoras');}
        if($tipo==2){return $pdf->download('imppresoras.pdf');}
        }

      public function ReporteTelefonosIpPdf($tipo) {

        $hosts = Host::where('host_type_id', 4)->get();
        $cantHosts = Host::where('host_type_id',4)->count();
        $sumPrice = Host::where('host_type_id',4)->sum('valor');
        $reportName = "Telefonos IP";

        $view =  \View::make('pdf.telefonos',
        compact('hosts','cantHosts','sumPrice','reportName'))
        ->render();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        if($tipo==1){return $pdf->stream('telefonos');}
        if($tipo==2){return $pdf->download('telefonos.pdf');}
        }

      public function ReporteModemsPdf($tipo) {

        $hosts = Host::where('host_type_id', 10)->get();
        $cantHosts = Host::where('host_type_id',10)->count();
        $sumPrice = Host::where('host_type_id',10)->sum('valor');
        $reportName = "Modems";

        $view =  \View::make('pdf.modems',
        compact('hosts','cantHosts','sumPrice','reportName'))
        ->render();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        if($tipo==1){return $pdf->stream('modems');}
        if($tipo==2){return $pdf->download('modems.pdf');}
        }

      public function ReporteRoutersPdf($tipo) {

        $hosts = Host::where('host_type_id', 11)->get();
        $cantHosts = Host::where('host_type_id',11)->count();
        $sumPrice = Host::where('host_type_id',11)->sum('valor');
        $reportName = "Routers";

        $view =  \View::make('pdf.routers',
        compact('hosts','cantHosts','sumPrice','reportName'))
        ->render();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        if($tipo==1){return $pdf->stream('routers');}
        if($tipo==2){return $pdf->download('routers.pdf');}
        }

      public function ReporteSwitchsPdf($tipo) {

        $hosts = Host::where('host_type_id', 12)->get();
        $cantHosts = Host::where('host_type_id',12)->count();
        $sumPrice = Host::where('host_type_id',12)->sum('valor');
        $reportName = "Switchs";

        $view =  \View::make('pdf.switchs',
        compact('hosts','cantHosts','sumPrice','reportName'))
        ->render();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        if($tipo==1){return $pdf->stream('switchs');}
        if($tipo==2){return $pdf->download('switchs.pdf');}
        }

      public function ReporteAccespointsPdf($tipo) {

        $hosts = Host::where('host_type_id', 13)->get();
        $cantHosts = Host::where('host_type_id',13)->count();
        $sumPrice = Host::where('host_type_id',13)->sum('valor');
        $reportName = "Acces Points";

        $view =  \View::make('pdf.accespoints',
        compact('hosts','cantHosts','sumPrice','reportName'))
        ->render();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        if($tipo==1){return $pdf->stream('accespoints');}
        if($tipo==2){return $pdf->download('accespoints.pdf');}
        }

      public function ReporteCamarasIpPdf($tipo) {

        $hosts = Host::where('host_type_id', 20)->get();
        $cantHosts = Host::where('host_type_id',20)->count();
        $sumPrice = Host::where('host_type_id',20)->sum('valor');
        $reportName = "Camaras IP";

        $view =  \View::make('pdf.camarasip',
        compact('hosts','cantHosts','sumPrice','reportName'))
        ->render();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        if($tipo==1){return $pdf->stream('camarasip');}
        if($tipo==2){return $pdf->download('camarasip.pdf');}
        }

      public function ReporteCamarasanaPdf($tipo) {

        $hosts = Host::where('host_type_id', 24)->get();
        $cantHosts = Host::where('host_type_id',24)->count();
        $sumPrice = Host::where('host_type_id',24)->sum('valor');
        $reportName = "Camaras Analógicas";

        $view =  \View::make('pdf.camarasana',
        compact('hosts','cantHosts','sumPrice','reportName'))
        ->render();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        if($tipo==1){return $pdf->stream('camarasana_pdf');}
        if($tipo==2){return $pdf->download('camarasana_pdf.pdf');}
        }

      public function ReporteDvrsPdf($tipo) {

        $hosts = Host::where('host_type_id', 21)
          ->orWhere('host_type_id', 22)
          ->orWhere('host_type_id', 23)
          ->orWhere('host_type_id', 24)->get();
        $cantHosts = Host::where('host_type_id',24)
          ->orWhere('host_type_id', 22)
          ->orWhere('host_type_id', 23)
          ->orWhere('host_type_id', 24)->count();
        $sumPrice = Host::where('host_type_id',24)
          ->orWhere('host_type_id', 22)
          ->orWhere('host_type_id', 23)
          ->orWhere('host_type_id', 24)->sum('valor');
        $reportName = "DVRs";

        $view =  \View::make('pdf.dvrs',
        compact('hosts','cantHosts','sumPrice','reportName'))
        ->render();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        if($tipo==1){return $pdf->stream('dvrs');}
        if($tipo==2){return $pdf->download('dvrs.pdf');}
        }

      public function ReporteDvrPdf($id) {

        $dvr = Host::where('id', $id)->firstOrFail();
        $camaras = Host::where('cctv_id',$id)->get();
        $cantCam = Host::where('cctv_id',$id)->count();
        $creds = Credential::where('host_id',$id)->get();
        $cantCred = Credential::where('host_id',$id)->count();

        $reportName = "DVRs";

        $view =  \View::make('pdf.reportes.dvrs',
        compact('dvr','camaras','creds','cantCam','cantCred'))
        ->render();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('dvrs.pdf');
        }

      public function ReporteAbonadosPdf($id) {
        $abonado = Abonado::where('id', $id)->firstOrFail();
        $reportName = "DVRs";
        $view =  \View::make('pdf.reportes.abonados',
        compact('abonado','reportName'))
        ->render();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        return $pdf->stream('abonado.pdf');
        }

      private function findByIdAbonado($id){
          return Abonado::where('id', $id)->firstOrFail();
      }



}
