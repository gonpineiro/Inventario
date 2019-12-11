<?php

namespace App\Http\Controllers;
use App\Modelo;
use Illuminate\Http\Request;
use App\Host_type;
use App\Marca;


class ModelosController extends Controller
{
        public function showModelos(Request $request){

          $modelo = Modelo::orderBy('name')->get();
          $host_type = Host_type::orderBy('name')->get();
          $marca = Marca::orderBy('name')->get();
          $ver = "agregar";
          return view('administracion.marcamodelo.modelos', [

            'modelos' => $modelo,
            'host_types' => $host_type,
            'marcas' => $marca,
            'ver' => $ver,
          ]);

        }
        public function createModelo(Request $request){


            $modelo = Modelo::create([

              'name' => $request->input('name'),
              'marca_id' => $request->input('marca_id'),
              'host_type_id' =>$request->input('host_type_id'),
                ]);

          return redirect('/modelos');
        }

        public function editModelo($id, Request $request){

          $modelo = Modelo::orderBy('name')->get();
          $onlyModelo = $this->findByIdModelo($id);
          $host_type = Host_type::orderBy('name')->get();
          $marca = Marca::orderBy('name')->get();
          $ver = "editar";

            return view('administracion.marcamodelo.modelos', [
                'modelos' => $modelo,
                'onlyModelo' => $onlyModelo,
                'host_types' => $host_type,
                'marcas' => $marca,
                'ver' => $ver,
            ]);

        }

        public function updateModelo($id, Request $request){

          $onlyModelo = $this->findByIdModelo($id);
          $onlyModelo->name = $request->input('name');
          $onlyModelo->marca_id = $request->input('marca_id');
          $onlyModelo->host_type_id = $request->input('host_type_id');
          $onlyModelo->save();

          return redirect('/modelos/');
        }

        public function showMarcas(Request $request){

          $marca = Marca::orderBy('name')->get();
          $ver = "agregar";
          return view('administracion.marcamodelo.marcas', [

            'marcas' => $marca,
            'ver' => $ver,
          ]);

        }
        public function createMarca(Request $request){

            $marca = Marca::create([
              'name' => $request->input('name'),
                ]);

          return redirect('/marcas');
        }

        public function editMarca($id, Request $request){

          $marca = Modelo::orderBy('name')->get();
          $onlyMarca = $this->findByIdMarca($id);
          $ver = "editar";

            return view('administracion.marcamodelo.marcas', [
                'marcas' => $marca,
                'onlyMarca' => $onlyMarca,
                'ver' => $ver,
            ]);

        }

        public function updateMarca($id, Request $request){

          $onlyMarca = $this->findByIdMarca($id);
          $onlyMarca->name = $request->input('name');
          $onlyMarca->save();

          return redirect('/marcas/');
        }

        private function findByIdModelo($id){
            return Modelo::where('id', $id)->firstOrFail();
        }

        private function findByIdMarca($id){
            return Marca::where('id', $id)->firstOrFail();
        }
}
