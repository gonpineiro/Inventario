<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Licensekey extends Model
{
    protected $guarded = [];

    public function host(){

      return $this->belongsTo('App\Host');
    }
}
