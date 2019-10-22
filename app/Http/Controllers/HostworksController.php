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

          return redirect('/hosts/'.$id);
        }
}
