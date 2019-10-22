<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credential extends Model
{
    protected $guarded = [];

    public function host(){

      return $this->hasOne('App\Host','id', 'host_id');
    }
}
