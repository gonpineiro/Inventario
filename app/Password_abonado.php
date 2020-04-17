<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Password_abonado extends Model
{
    protected $guarded = [];

    public function abonado(){

      return $this->belongsTo('App\Abonado');
    }

}
