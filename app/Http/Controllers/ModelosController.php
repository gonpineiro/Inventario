<?php

namespace App\Http\Controllers;
use App\Modelo;
use Illuminate\Http\Request;
use App\Host_type;


class ModelosController extends Controller
{
        public function show(Request $request){

          $modelo = Modelo::orderBy('name')->get();
          $host_type = Host_type::orderBy('name')->get();

          return view('administracion.modelos', [

            'modelos' => $modelo,
            'host_types' => $host_type,
          ]);

        }
        public function createModel(Request $request){


            $modelo = Modelo::create([

              'name' => $request->input('name'),
              'marca' => $request->input('marca'),
              'host_type_id' =>$request->input('host_type_id'),
                ]);

          return redirect('/modelos');
        }
}
