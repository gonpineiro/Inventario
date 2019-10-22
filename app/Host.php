<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
    protected $guarded = [];

    public function departament(){

      return $this->belongsTo('App\Departament');
    }

    public function host_type(){

      return $this->belongsTo('App\Host_type');
    }

    public function modelo(){

      return $this->belongsTo('App\Modelo','modelo_id', 'id');
    }

    public function estado(){

      return $this->belongsTo('App\Estado');
    }
    public function host(){

      return $this->hasOne('App\Host','id', 'cctv_id');
    }
    public function historial(){

      return $this->belongsTo('App\Historial');
    }

    public function host_work(){

      return $this->belongsTo('App\Host_work');
    }

    public function user_host(){

      return $this->belongsTo('App\User_host');
    }

    public function credential(){

      return $this->belongsTo('App\Credential');
    }

    public function abonado(){

      return $this->belongsTo('App\Abonado');
    }
    public function sim_i(){

      return $this->belongsTo('App\Card_sim','card_sim_i', 'id');
    }

    public function sim_ii(){

      return $this->belongsTo('App\Card_sim','card_sim_ii', 'id');
    }

    public function sim_iii(){

      return $this->belongsTo('App\Card_sim','card_sim_iii', 'id');
    }

    public function onlyhost(){

      return $this->hasMany('App\Host','cctv_id', 'id');
    }

    public function exppanel(){

      return $this->hasMany('App\Host','cctv_id', 'id')->where('host_type_id',41);
    }

    public function teclapanel(){

      return $this->hasMany('App\Host','cctv_id', 'id')->where('host_type_id',44);
    }

    public function companel(){

      return $this->hasMany('App\Host','cctv_id', 'id')->where('host_type_id',42);
    }

    public function sensorpanel(){

      return $this->hasMany('App\Host','cctv_id', 'id')->where('host_type_id',43);
    }

    public function sensorexp(){

      return $this->hasMany('App\Host','cctv_id', 'id')->where('host_type_id',43);
    }

    public function sensortecla(){

      return $this->hasMany('App\Host','cctv_id', 'id')->where('host_type_id',43);
    }

}
