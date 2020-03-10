<?php
Route::get('/licencias', 'LicenciasController@showLicense');
Route::post('/create_license', 'LicenciasController@createLicense')->middleware('can:licensekey.show');
Route::get('/edit_license/{id}', 'LicenciasController@editLicense')->middleware('can:licensekey.show');
Route::post('/update_license/{id}', 'LicenciasController@updateLicense')->middleware('can:licensekey.show');
