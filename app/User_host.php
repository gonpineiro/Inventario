<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_host extends Model
{
    protected $guarded = [];

    public function departament(){

      return $this->belongsTo('App\Departament');
    }
}
