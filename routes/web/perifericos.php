<?php
//PERIFERICOS
Route::get('/perifericos', 'PerifericoController@show');

Route::get('/monitors', 'PerifericoController@showMonitors')->middleware('can:monitors.show');
Route::get('/only_monitor/{id}', 'PerifericoController@onlyMonitor')->middleware('can:monitors.only');
Route::get('/form_monitor', 'PerifericoController@formMonitor')->middleware('can:monitors.create');
Route::post('/add_monitor', 'PerifericoController@createMonitor')->middleware('can:monitors.create');
Route::post('/update_monitor/{id}', 'PerifericoController@updateMonitor')->middleware('can:monitors.edit');
Route::get('/edit_monitor/{id}', 'PerifericoController@editMonitor')->middleware('can:monitors.edit');

Route::get('/televisors', 'PerifericoController@showTelevisors')->middleware('can:televisors.show');
Route::get('/only_televisor/{id}', 'PerifericoController@onlyTelevisor')->middleware('can:televisors.only');
Route::get('/form_televisor', 'PerifericoController@formTelevisor')->middleware('can:televisors.create');
Route::post('/add_televisor', 'PerifericoController@createTelevisor')->middleware('can:televisors.create');
Route::post('/update_televisor/{id}', 'PerifericoController@updateTelevisor')->middleware('can:televisors.edit');
Route::get('/edit_televisor/{id}', 'PerifericoController@editTelevisor')->middleware('can:televisors.edit');

Route::get('/teclados', 'PerifericoController@showTeclados')->middleware('can:teclados.show');
Route::get('/only_teclado/{id}', 'PerifericoController@onlyTeclado')->middleware('can:teclados.only');
Route::get('/form_teclado', 'PerifericoController@formTeclado')->middleware('can:teclados.create');
Route::post('/add_teclado', 'PerifericoController@createTeclado')->middleware('can:teclados.create');
Route::post('/update_teclado/{id}', 'PerifericoController@updateTeclado')->middleware('can:teclados.edit');
Route::get('/edit_teclado/{id}', 'PerifericoController@editTeclado')->middleware('can:teclados.edit');

Route::get('/mouses', 'PerifericoController@showMouses')->middleware('can:mouses.show');
Route::get('/only_mouse/{id}', 'PerifericoController@onlyMouse')->middleware('can:mouses.only');
Route::get('/form_mouse', 'PerifericoController@formMouse')->middleware('can:mouses.create');
Route::post('/add_mouse', 'PerifericoController@createMouse')->middleware('can:mouses.create');
Route::post('/update_mouse/{id}', 'PerifericoController@updateMouse')->middleware('can:mouses.edit');
Route::get('/edit_mouse/{id}', 'PerifericoController@editMouse')->middleware('can:mouses.edit');

Route::get('/web_cams', 'PerifericoController@showWebcam')->middleware('can:webcams.show');
Route::get('/only_web_cam/{id}', 'PerifericoController@onlyWebcam')->middleware('can:webcams.only');
Route::get('/form_web_cam', 'PerifericoController@formWebcam')->middleware('can:webcams.create');
Route::post('/add_web_cam', 'PerifericoController@createWebcam')->middleware('can:webcams.create');
Route::post('/update_web_cam/{id}', 'PerifericoController@updateWebcam')->middleware('can:webcams.edit');
Route::get('/edit_web_cam/{id}', 'PerifericoController@editWebcam')->middleware('can:webcams.edit');
////////////////////////////////////////////////////////////////////////
 ?>
