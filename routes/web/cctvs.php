<?php

  //SEGURIDAD
  //Route::get('/seguridads', 'SeguridadController@show');
  Route::get('/camarasip', 'SeguridadController@showCamarasIp')->middleware('can:camaraips.show');
  Route::get('/only_camaraip/{id}', 'SeguridadController@onlyCamaraIp')->middleware('can:camaraips.only');
  Route::get('/form_camaraip', 'SeguridadController@formCamaraIp')->middleware('can:camaraips.create');
  Route::post('/add_camaraip', 'SeguridadController@createCamaraIp')->middleware('can:camaraips.create');
  Route::post('/update_camaraip/{id}', 'SeguridadController@updateCamaraIp')->middleware('can:camaraips.edit');
  Route::get('/edit_camaraip/{id}', 'SeguridadController@editCamaraIp')->middleware('can:camaraips.edit');

  Route::get('/dvrs', 'SeguridadController@showDvrs')->middleware('can:dvrs.show');
  Route::get('/only_dvr/{id}', 'SeguridadController@onlyDvr')->middleware('can:dvrs.only');
  Route::get('/form_dvr', 'SeguridadController@formDvr')->middleware('can:dvrs.create');
  Route::post('/add_dvr', 'SeguridadController@createDvr')->middleware('can:dvrs.create');
  Route::post('/update_dvr/{id}', 'SeguridadController@updateDvr')->middleware('can:dvrs.edit');
  Route::get('/edit_dvr/{id}', 'SeguridadController@editDvr')->middleware('can:dvrs.edit');

  Route::get('/camarasana', 'SeguridadController@showCamarasAna')->middleware('can:camarasanas.show');
  Route::get('/only_camaraana/{id}', 'SeguridadController@onlyCamaraAna')->middleware('can:camarasanas.only');
  Route::get('/form_camaraana', 'SeguridadController@formCamaraAna')->middleware('can:camarasanas.create');
  Route::post('/add_camaraana', 'SeguridadController@createCamaraAna')->middleware('can:camarasanas.create');
  Route::post('/update_camaraana/{id}', 'SeguridadController@updateCamaraAna')->middleware('can:camarasanas.edit');
  Route::get('/edit_camaraana/{id}', 'SeguridadController@editCamaraAna')->middleware('can:camarasanas.edit');
  ////////////////////////////////////////////////////////////////////////

  //CREDENCIALES CCTV
  Route::get('/form_cred_cctv', 'SeguridadController@showCred')->middleware('can:credcctvs.show');
  Route::get('/form_cred_cctv/{id}', 'SeguridadController@showAddcred')->middleware('can:credcctvs.create');
  Route::post('/add_cred_cctv', 'SeguridadController@createCred')->middleware('can:credcctvs.create');
  Route::get('/edit_cred_cctv/{id}', 'SeguridadController@editCred')->middleware('can:credcctvs.edit');
  Route::post('/update_cred_cctv/{id}', 'SeguridadController@updateCred')->middleware('can:credcctvs.edit');
  ////////////////////////////////////////////////////////////////////////
 ?>
