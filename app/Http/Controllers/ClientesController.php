<?php

namespace App\Http\Controllers;
use App\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
        public function show(Request $request){

          $cliente = Cliente::orderBy('name')->get();
          $ver = "agregar";

          return view('administracion.cliente', [
            'clientes' => $cliente,
            'ver' => $ver,
          ]);
        }


        public function createCliente(Request $request){
            $user = $request->user();

            $cliente = Cliente::create([
              'name' => $request->input('name'),
                ]);

          return redirect('/clientes');
        }

        public function editCliente($id, Request $request){
          $cliente = Cliente::orderBy('name')->get();
          $ver = "agregar";
          $onlyCliente = $this->findByIdCliente($id);
          $ver = "editar";

            return view('administracion.cliente', [
                'clientes' => $cliente,
                'onlyCliente' => $onlyCliente,
                'ver' => $ver,
            ]);

        }

        public function updateCliente($id, Request $request){

            $onlyCliente = $this->findByIdCliente($id);
            $onlyCliente->name = $request->input('name');
            $onlyCliente->save();

            return redirect('/clientes/');
          }


        private function findByIdCliente($id){
            return Cliente::where('id', $id)->firstOrFail();
        }
}
