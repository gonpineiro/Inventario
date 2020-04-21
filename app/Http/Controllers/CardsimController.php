<?php

namespace App\Http\Controllers;
use App\Host;
use App\Card_sim;
use App\Sim_deposito;

use Illuminate\Http\Request;

class CardsimController extends Controller
{

    public function showCardsim(Request $request){

      $cardSim = Card_sim::all();
      $deposito = Sim_deposito::all();
      

      return view('dispositivos.forms.sdis.add_cardsim', [
        'cardSims' => $cardSim,
        'depositos' => $deposito,
       ]);

    }

    public function createCardsim(Request $request){
        $user = $request->user();
        $cardsim = Card_sim::create([

          'line_phone' => $request->input('line_phone'),
          'cod_sim' => $request->input('cod_sim'),
          'sim_deposito_id' => $request->input('sim_deposito_id'),
      ]);

      return redirect('/card_sims');
    }

    public function createDeposito(Request $request){
        $user = $request->user();
        $deposito = Sim_deposito::create([

          'name' => $request->input('name'),
      ]);

      return redirect('/card_sims');
    }


}
