<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Abonado extends Model
{
    protected $guarded = [];

    public function departament(){

      return $this->belongsTo('App\Departament');
    }

    public function plataforma(){

      return $this->belongsTo('App\Plataforma');
    }

    public function abonadotype(){

      return $this->belongsTo('App\Abonadotype');
    }

    public function host(){

      return $this->hasMany('App\Host');
    }

}
