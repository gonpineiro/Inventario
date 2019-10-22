<?php

namespace App\Http\Controllers;
use App\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
        public function show(Request $request){

          $cliente = Cliente::orderBy('name')->get();


          return view('administracion.cliente', [

            'clientes' => $cliente,
          ]);

        }

        public function formCliente(Request $request){

          return view('administracion.add_cliente');

        }
        public function createCliente(Request $request){

            $user = $request->user();
            $cliente = Cliente::create([
              'name' => $request->input('name'),
                ]);

          return redirect('/clientes');
        }
}
