<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

  Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    require __DIR__ . '/web/userhosts.php';
    require __DIR__ . '/web/networking.php';
    require __DIR__ . '/web/cctvs.php';
    require __DIR__ . '/web/perifericos.php';
    require __DIR__ . '/web/sdis.php';
    require __DIR__ . '/web/reports.php';
    require __DIR__ . '/web/users.php';
    require __DIR__ . '/web/administracion.php';
    require __DIR__ . '/web/auth.php';
});
