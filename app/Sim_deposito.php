<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sim_deposito extends Model
{
    protected $guarded = [];

    public function card_sim_instaladas(){

      return $this->hasMany('App\Card_sim')->whereNull('host_id');
    }

    public function card_sim_total(){

      return $this->hasMany('App\Card_sim');
    }
}
