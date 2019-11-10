<?php
//SDI

Route::get('/abonados', 'SdiController@showAbonados')->middleware('can:abonados.show');
Route::get('/form_abonado', 'SdiController@formAbonado')->middleware('can:abonados.create');
Route::post('/add_abonado', 'SdiController@createAbonado')->middleware('can:abonados.create');

Route::get('/panel_alarms', 'SdiController@showPanelAlarm')->middleware('can:panelalarms.show');
Route::get('/only_panel_alarm/{id}', 'SdiController@onlyPanelAlarm')->middleware('can:panelalarms.only');
Route::get('/form_panel_alarm', 'SdiController@formPanelAlarm')->middleware('can:panelalarms.create');
Route::post('/add_panel_alarm', 'SdiController@createPanelAlarm')->middleware('can:panelalarms.create');
Route::post('/update_panel_alarm/{id}', 'SdiController@updatePanelAlarm')->middleware('can:panelalarms.edit');
Route::get('/edit_panel_alarm/{id}', 'SdiController@editPanelAlarm')->middleware('can:panelalarms.edit');

Route::get('/teclado_sdis', 'SdiController@showTeclado')->middleware('can:tecladosdis.show');
Route::get('/only_teclado_sdi/{id}', 'SdiController@onlyTeclado')->middleware('can:tecladosdis.only');
Route::get('/form_teclado_sdi', 'SdiController@formTeclado')->middleware('can:tecladosdis.create');
Route::post('/add_teclado_sdi', 'SdiController@createTeclado')->middleware('can:tecladosdis.create');
Route::post('/update_teclado_sdi/{id}', 'SdiController@updateTeclado')->middleware('can:tecladosdis.edit');
Route::get('/edit_teclado_sdi/{id}', 'SdiController@editTeclado')->middleware('can:tecladosdis.edit');

Route::get('/expansoras', 'SdiController@showExpansora')->middleware('can:expansoras.show');
Route::get('/only_expansora/{id}', 'SdiController@onlyExpansora')->middleware('can:expansoras.only');
Route::get('/form_expansora', 'SdiController@formExpansora')->middleware('can:expansoras.create');
Route::post('/add_expansora', 'SdiController@createExpansora')->middleware('can:expansoras.create');
Route::post('/update_expansora/{id}', 'SdiController@updateExpansora')->middleware('can:expansoras.edit');
Route::get('/edit_expansora/{id}', 'SdiController@editExpansora')->middleware('can:expansoras.edit');

Route::get('/comunicators', 'SdiController@showComunicator')->middleware('can:comunicators.show');
Route::get('/only_comunicator/{id}', 'SdiController@onlyComunicator')->middleware('can:comunicators.only');
Route::get('/form_comunicator', 'SdiController@formComunicator')->middleware('can:comunicators.create');
Route::post('/add_comunicator', 'SdiController@createComunicator')->middleware('can:comunicators.create');
Route::post('/update_comunicator/{id}', 'SdiController@updateComunicator')->middleware('can:comunicators.edit');
Route::get('/edit_comunicator/{id}', 'SdiController@editComunicator')->middleware('can:comunicators.edit');

Route::get('/sensors', 'SdiController@showSensor')->middleware('can:sensors.show');
Route::get('/only_sensor/{id}', 'SdiController@onlySensor')->middleware('can:sensors.only');
Route::get('/form_sensor', 'SdiController@formSensor')->middleware('can:sensors.create');
Route::post('/add_sensor', 'SdiController@createSensor')->middleware('can:sensors.create');
Route::post('/update_sensor/{id}', 'SdiController@updateSensor')->middleware('can:sensors.edit');
Route::get('/edit_sensor/{id}', 'SdiController@editSensor')->middleware('can:sensors.edit');

Route::get('/sirenas', 'SdiController@showSirena')->middleware('can:sirenas.edit');
Route::get('/only_sirena/{id}', 'SdiController@onlySirena')->middleware('can:sirenas.only');
Route::get('/form_sirena', 'SdiController@formSirena')->middleware('can:sirenas.create');
Route::post('/add_sirena', 'SdiController@createSirena')->middleware('can:sirenas.create');
Route::post('/update_sirena/{id}', 'SdiController@updateSirena')->middleware('can:sirenas.edit');
Route::get('/edit_sirena/{id}', 'SdiController@editSirena')->middleware('can:sirenas.edit');

Route::get('/card_sims', 'CardsimController@showCardsim')->middleware('can:cardsims.show');
Route::post('/add_card_sim', 'CardsimController@createCardsim')->middleware('can:cardsims.create');
////////////////////////////////////////////////////////////////////////
 ?>
