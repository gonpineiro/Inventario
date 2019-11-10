<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Host_mov extends Model
{
  protected $guarded = [];

  public function host(){

    return $this->belongsTo('App\Host');
  }
  public function user_host(){

    return $this->belongsTo('App\User_host');
  }
  public function ficha_entrega(){

    return $this->belongsTo('App\Fichas_entregas');
  }
}
