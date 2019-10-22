<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
  protected $guarded = [];

  public function cliente(){

    return $this->belongsTo('App\Cliente');
  }
}
