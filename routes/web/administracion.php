<?php

  //ADMINISTRACION
  Route::get('/administracion', 'AdministracionController@index')->name('administracion');
  Route::get('/users_host', 'AdministracionController@showUsersHost')->middleware('can:userhosts.show');
  Route::post('/add_user_host', 'AdministracionController@createUserhost')->middleware('can:userhost.create');
  Route::get('/historial', 'AdministracionController@showHistorials')->middleware('can:historials.show');
  Route::get('/modelos', 'ModelosController@show')->middleware('can:marcas.show');
  Route::post('/add_model', 'ModelosController@createModel')->middleware('can:marcas.create');
  Route::get('/clientes', 'ClientesController@show')->middleware('can:clients.show');
  Route::post('/add_cliente', 'ClientesController@CreateCliente')->middleware('can:clients.create');
  Route::get('/departaments', 'AdministracionController@showDepartaments')->middleware('can:departaments.show');
  Route::post('/add_departament', 'AdministracionController@createDepartament')->middleware('can:departaments.create');
  //////////////////////////////////////////////////////////////////////////REGISTRO DE TRABAJOS POR HOST
  Route::post('/add_work/{id}', 'HostworksController@createHostwork');
  ////////////////////////////////////////////////////////////////////////

  //FICHAS
  Route::get('fichas_entrega', 'EntregaController@showFichaentrega')->middleware('can:entregas.show');
  Route::get('entregas', 'EntregaController@showEntregas')->middleware('can:entregas.show');
  Route::get('form_entregas', 'EntregaController@formFichaentrega')->middleware('can:entregas.create');
  Route::get('form_entregas/{id}', 'EntregaController@formFichaentregaonly')->middleware('can:entregas.create');
  Route::post('add_ficha_entrega', 'EntregaController@createFichaentrega')->middleware('can:entregas.create');
  Route::get('entregas/{id}/{type}', 'EntregaController@downdFichaentrega')->middleware('can:entregas.create');
  ////////////////////////////////////////////////////////////////////////

 ?>
