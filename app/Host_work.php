<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Host_work extends Model
{
  protected $guarded = [];
  protected $dates = ['fecha'];

  public function host(){

    return $this->belongsTo('App\Host');
  }
}
