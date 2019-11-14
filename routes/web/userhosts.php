<?php
//USER HOSTS
//Route::get('/hosts', 'HostsController@show')

Route::get('/computadoras', 'HostsController@showComputadoras')->middleware('can:computadoras.show');
Route::get('/only_computadora/{id}', 'HostsController@onlyComputadora')->middleware('can:computadoras.only');
Route::get('/form_computadora', 'HostsController@formComputadora')->middleware('can:computadoras.create');
Route::post('/add_computadora', 'HostsController@createComputaora')->middleware('can:computadoras.create');
Route::post('/update_computadora/{id}', 'HostsController@updateComputadora')->middleware('can:computadoras.edit');
Route::get('/edit_computadora/{id}', 'HostsController@editComputadora')->middleware('can:computadoras.edit');

Route::get('/notebooks', 'HostsController@showNotebooks')->middleware('can:notebooks.show');
Route::get('/only_notebook/{id}', 'HostsController@onlyNotebook')->middleware('can:notebooks.only');
Route::get('/form_notebook', 'HostsController@formNotebook')->middleware('can:notebooks.create');
Route::post('/add_notebook', 'HostsController@createNotebook')->middleware('can:notebooks.create');
Route::post('/update_notebook/{id}', 'HostsController@updateNotebook')->middleware('can:notebooks.edit');
Route::get('/edit_notebook/{id}', 'HostsController@editNotebook')->middleware('can:notebooks.edit');

Route::get('/impresoras', 'HostsController@showImpresoras')->middleware('can:impresoras.show');
Route::get('/only_impresora/{id}', 'HostsController@onlyImpresora')->middleware('can:impresoras.only');
Route::get('/form_impresora', 'HostsController@formImpresora')->middleware('can:impresoras.create');
Route::post('/add_impresora', 'HostsController@createImpresora')->middleware('can:impresoras.create');
Route::post('/update_impresora/{id}', 'HostsController@updateImpresora')->middleware('can:impresoras.edit');
Route::get('/edit_impresora/{id}', 'HostsController@editImpresora')->middleware('can:impresoras.edit');

Route::get('/telefoniaip', 'HostsController@showTelefoniaips')->middleware('can:phoneips.show');
Route::get('/only_telefonoip/{id}', 'HostsController@onlyTelefonoip')->middleware('can:phoneips.only');
Route::get('/form_telefonoip', 'HostsController@formTelefonoip')->middleware('can:phoneips.create');
Route::post('/add_telefonoip', 'HostsController@createTelefonoip')->middleware('can:phoneips.create');
Route::post('/update_telefonoip/{id}', 'HostsController@updateTelefonoip')->middleware('can:phoneips.edit');
Route::get('/edit_telefonoip/{id}', 'HostsController@editTelefonoip')->middleware('can:phoneips.edit');
////////////////////////////////////////////////////////////////////////
 ?>
