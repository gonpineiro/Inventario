<?php
//NETWORKING
//Route::get('/networking', 'NetworkingController@show');

Route::get('/modems', 'NetworkingController@showModems')->middleware('can:modems.show');
Route::get('/modems_disable', 'NetworkingController@showModemsDisable')->middleware('can:modems.show');
Route::get('/modems_stock', 'NetworkingController@showModemsStock')->middleware('can:modems.show');
Route::get('/only_modem/{id}', 'NetworkingController@onlyModem')->middleware('can:modems.only');
Route::get('/form_modem', 'NetworkingController@formModem')->middleware('can:modems.create');
Route::post('/add_modem', 'NetworkingController@createModem')->middleware('can:modems.create');
Route::post('/update_modem/{id}', 'NetworkingController@updateModem')->middleware('can:modems.edit');
Route::get('/edit_modem/{id}', 'NetworkingController@editModem')->middleware('can:modems.edit');

Route::get('/routers', 'NetworkingController@showRouters')->middleware('can:routers.show');
Route::get('/routers_disable', 'NetworkingController@showRoutersDisable')->middleware('can:routers.show');
Route::get('/routers_stock', 'NetworkingController@showRoutersStock')->middleware('can:routers.show');
Route::get('/only_router/{id}', 'NetworkingController@onlyRouter')->middleware('can:routers.only');
Route::get('/form_router', 'NetworkingController@formRouter')->middleware('can:routers.create');
Route::post('/add_router', 'NetworkingController@createRouter')->middleware('can:routers.create');
Route::post('/update_router/{id}', 'NetworkingController@updateRouter')->middleware('can:routers.edit');
Route::get('/edit_router/{id}', 'NetworkingController@editRouter')->middleware('can:routers.edit');

Route::get('/switchs', 'NetworkingController@showSwitchs')->middleware('can:switchs.show');
Route::get('/switchs_disable', 'NetworkingController@showSwitchsDisable')->middleware('can:switchs.show');
Route::get('/switchs_stock', 'NetworkingController@showSwitchsStock')->middleware('can:switchs.show');
Route::get('/only_switch/{id}', 'NetworkingController@onlySwitch')->middleware('can:switchs.only');
Route::get('/form_switch', 'NetworkingController@formSwitch')->middleware('can:switchs.create');
Route::post('/add_switch', 'NetworkingController@createSwitch')->middleware('can:switchs.create');
Route::post('/update_switch/{id}', 'NetworkingController@updateSwitch')->middleware('can:switchs.edit');
Route::get('/edit_switch/{id}', 'NetworkingController@editSwitch')->middleware('can:switchs.edit');

Route::get('/accespoints', 'NetworkingController@showAccespoints')->middleware('can:accespoints.show');
Route::get('/accespoints_disable', 'NetworkingController@showAccespointsDisable')->middleware('can:accespoints.show');
Route::get('/accespoints_stock', 'NetworkingController@showAccespointsStock')->middleware('can:accespoints.show');
Route::get('/only_accespoint/{id}', 'NetworkingController@onlyAccespoint')->middleware('can:accespoints.only');
Route::get('/form_accespoint', 'NetworkingController@formAccespoint')->middleware('can:accespoints.create');
Route::post('/add_accespoint', 'NetworkingController@createAccespoint')->middleware('can:accespoints.create');
Route::post('/update_accespoint/{id}', 'NetworkingController@updateAccespoint')->middleware('can:accespoints.edit');
Route::get('/edit_accespoint/{id}', 'NetworkingController@editAccespoint')->middleware('can:accespoints.edit');
////////////////////////////////////////////////////////////////////////
//CREDENCIALES
Route::get('/form_cred_net', 'NetworkingController@showCred')->middleware('can:crednets.show');
Route::get('/form_cred_net/{id}', 'NetworkingController@showAddcred')->middleware('can:crednets.create');
Route::post('/add_cred_net', 'NetworkingController@createCred')->middleware('can:crednets.create');
Route::get('/edit_cred_net/{id}', 'NetworkingController@editCred')->middleware('can:crednets.edit');
Route::post('/update_cred_net/{id}', 'NetworkingController@updateCred')->middleware('can:crednets.edit');
    ////////////////////////////////////////////////////////////////////////
 ?>
