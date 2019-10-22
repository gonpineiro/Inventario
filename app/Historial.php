<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $guarded = [];

    public function user(){

      return $this->belongsTo('App\User');
    }
    public function host(){

      return $this->belongsTo('App\Host');
    }
}
