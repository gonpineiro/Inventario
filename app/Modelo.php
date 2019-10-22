<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $guarded = [];

    public function host_type(){

      return $this->belongsTo('App\Host_type');
    }
}
