<?php
//USERS DEL SISTEMA
Route::get('/users', 'UserController@showUsers')->middleware('can:users.show');
Route::post('/create_user', 'UserController@createUser')->middleware('can:users.create');
Route::get('/edit_user/{id}', 'UserController@editUser')->middleware('can:users.edit');
Route::post('/update_user/{id}', 'UserController@updateUser')->middleware('can:users.edit');

//ROLES DE USUARIO
Route::get('/roles', 'RoleController@showRoles')->middleware('can:roles.show');
Route::get('/form_role', 'RoleController@formRole')->middleware('can:roles.create');
Route::post('/create_role', 'RoleController@createRole')->middleware('can:roles.create');
////////////////////////////////////////////////////////////////////////
 ?>
