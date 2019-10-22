<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Abonado extends Model
{
    protected $guarded = [];

    public function cliente(){

      return $this->belongsTo('App\Cliente');
    }

    public function host(){

      return $this->hasMany('App\Host');
    }

}
