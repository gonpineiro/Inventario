<?php

namespace App\Http\Controllers;
use App\Host;
use App\Card_sim;

use Illuminate\Http\Request;

class CardsimController extends Controller
{

    public function showCardsim(Request $request){

      $cardSim = Card_sim::all();

      return view('dispositivos.forms.sdis.add_cardsim', [
        'cardSims' => $cardSim,
       ]);

    }

    public function createCardsim(Request $request){
        $user = $request->user();
        $cardsim = Card_sim::create([

          'line_phone' => $request->input('line_phone'),
          'cod_sim' => $request->input('cod_sim'),
      ]);



      return redirect('/card_sims');
    }
}
