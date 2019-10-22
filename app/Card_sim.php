<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card_sim extends Model
{
    protected $guarded = [];

    public function host(){

        return $this->belongsTo('App\Host');
      }
}
