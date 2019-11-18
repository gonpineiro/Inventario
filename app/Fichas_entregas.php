<?php

namespace App;



use Illuminate\Database\Eloquent\Model;

class Fichas_entregas extends Model

{
      protected $guarded = [];
      protected $casts = [
      'id' => 'int',
      'departament_id' => 'int',
      'name'=> 'string',
      'user_host_id' => 'int',
      'type' => 'int',
      'detalle' => 'array',
      'fecha' => 'date',
      ];

      protected $fillable = [
      'id',
      'name',
      'detalle',
      'departament_id',
      'user_host_id',
      'type',
      'detalle' => 'array',
      'fecha',
      ];
      public function departament(){

        return $this->belongsTo('App\Departament');
      }
      public function user_host(){

        return $this->belongsTo('App\User_host');
      }

}
