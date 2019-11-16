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
          $ver = "agregar";
          return view('administracion.modelos', [

            'modelos' => $modelo,
            'host_types' => $host_type,
            'ver' => $ver,
          ]);

        }
        public function createModelo(Request $request){


            $modelo = Modelo::create([

              'name' => $request->input('name'),
              'marca' => $request->input('marca'),
              'host_type_id' =>$request->input('host_type_id'),
                ]);

          return redirect('/modelos');
        }

        public function editModelo($id, Request $request){

          $modelo = Modelo::orderBy('name')->get();
          $onlyModelo = $this->findByIdModelo($id);
          $host_type = Host_type::orderBy('name')->get();
          $ver = "editar";

            return view('administracion.modelos', [
                'modelos' => $modelo,
                'onlyModelo' => $onlyModelo,
                'host_types' => $host_type,
                'ver' => $ver,
            ]);

        }

        public function updateModelo($id, Request $request){

            $onlyModelo = $this->findByIdModelo($id);
            $onlyModelo->name = $request->input('name');
            $onlyModelo->marca = $request->input('marca');
            $onlyModelo->save();

            return redirect('/modelos/');
          }

        private function findByIdModelo($id){
            return Modelo::where('id', $id)->firstOrFail();
        }
}
