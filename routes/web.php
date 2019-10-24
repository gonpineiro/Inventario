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
/*Route::get('/', function () {
    return view('welcome');
});*/

// Authentication Routes...
  Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
  Route::post('login', 'Auth\LoginController@login');
  Route::post('logout', 'Auth\LoginController@logout')->name('logout');
  // Registration Routes...
  //Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');

  // Password Reset Routes...
  Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
  Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
  Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
  Route::post('password/reset', 'Auth\ResetPasswordController@reset');

  Route::group(['middleware' => 'auth'], function () {



  //ONLYs
  //Route::get('/hosts/{id}', 'HostsController@only');
  #Route::get('/edit/{id}', 'HostsController@onlyEdit');
  #Route::post('/edit_host/{id}', 'HostsController@updateHost');

  //
  Route::get('/', 'HomeController@index')->name('home');



  //USER HOSTS
  Route::get('/hosts', 'HostsController@show');

  Route::get('/computadoras', 'HostsController@showComputadoras');
  Route::get('/only_computadora/{id}', 'HostsController@onlyComputadora');
  Route::get('/form_computadora', 'HostsController@formComputadora');

  Route::post('/add_computadora', 'HostsController@createComputaora')->name('computadora.create')->middleware('can:computadora.show');

  Route::post('/update_computadora/{id}', 'HostsController@updateComputadora');
  Route::get('/edit_computadora/{id}', 'HostsController@editComputadora');

  Route::get('/notebooks', 'HostsController@showNotebooks');
  Route::get('/only_notebook/{id}', 'HostsController@onlyNotebook');
  Route::get('/form_notebook', 'HostsController@formNotebook');
  Route::post('/add_notebook', 'HostsController@createNotebook');
  Route::post('/update_notebook/{id}', 'HostsController@updateNotebook');
  Route::get('/edit_notebook/{id}', 'HostsController@editNotebook');

  Route::get('/impresoras', 'HostsController@showImpresoras');
  Route::get('/only_impresora/{id}', 'HostsController@onlyImpresora');
  Route::get('/form_impresora', 'HostsController@formImpresora');
  Route::post('/add_impresora', 'HostsController@createImpresora');
  Route::post('/update_impresora/{id}', 'HostsController@updateImpresora');
  Route::get('/edit_impresora/{id}', 'HostsController@editImpresora');

  Route::get('/telefoniaip', 'HostsController@showTelefoniaips');
  Route::get('/only_telefonoip/{id}', 'HostsController@onlyTelefonoip');
  Route::get('/form_telefonoip', 'HostsController@formTelefonoip');
  Route::post('/add_telefonoip', 'HostsController@createTelefonoip');
  Route::post('/update_telefonoip/{id}', 'HostsController@updateTelefonoip');
  Route::get('/edit_telefonoip/{id}', 'HostsController@editTelefonoip');
  ////////////////////////////////////////////////////////////////////////

  //NETWORKING
  Route::get('/networking', 'NetworkingController@show');

  Route::get('/modems', 'NetworkingController@showModems');
  Route::get('/only_modem/{id}', 'NetworkingController@onlyModem');
  Route::get('/form_modem', 'NetworkingController@formModem');
  Route::post('/add_modem', 'NetworkingController@createModem');
  Route::post('/update_modem/{id}', 'NetworkingController@updateModem');
  Route::get('/edit_modem/{id}', 'NetworkingController@editModem');


  Route::get('/routers', 'NetworkingController@showRouters');
  Route::get('/only_router/{id}', 'NetworkingController@onlyRouter');
  Route::get('/form_router', 'NetworkingController@formRouter');
  Route::post('/add_router', 'NetworkingController@createRouter');
  Route::post('/update_router/{id}', 'NetworkingController@updateRouter');
  Route::get('/edit_router/{id}', 'NetworkingController@editRouter');


  Route::get('/switchs', 'NetworkingController@showSwitchs');
  Route::get('/only_switch/{id}', 'NetworkingController@onlySwitch');
  Route::get('/form_switch', 'NetworkingController@formSwitch');
  Route::post('/add_switch', 'NetworkingController@createSwitch');
  Route::post('/update_switch/{id}', 'NetworkingController@updateSwitch');
  Route::get('/edit_switch/{id}', 'NetworkingController@editSwitch');


  Route::get('/accespoints', 'NetworkingController@showAccespoints');
  Route::get('/only_accespoint/{id}', 'NetworkingController@onlyAccespoint');
  Route::get('/form_accespoint', 'NetworkingController@formAccespoint');
  Route::post('/add_accespoint', 'NetworkingController@createAccespoint');
  Route::post('/update_accespoint/{id}', 'NetworkingController@updateAccespoint');
  Route::get('/edit_accespoint/{id}', 'NetworkingController@editAccespoint');
  ////////////////////////////////////////////////////////////////////////

  //CREDENCIALES
  Route::get('/form_cred_net', 'NetworkingController@showCred');
  Route::get('/form_cred_net/{id}', 'NetworkingController@showAddcred');
  Route::post('/add_cred_net', 'NetworkingController@createCred');
  Route::get('/edit_cred_net/{id}', 'NetworkingController@editCred');
  Route::post('/update_cred_net/{id}', 'NetworkingController@updateCred');
    ////////////////////////////////////////////////////////////////////////

  //SEGURIDAD
  Route::get('/seguridads', 'SeguridadController@show');

  Route::get('/camarasip', 'SeguridadController@showCamarasIp');
  Route::get('/only_camaraip/{id}', 'SeguridadController@onlyCamaraIp');
  Route::get('/form_camaraip', 'SeguridadController@formCamaraIp');
  Route::post('/add_camaraip', 'SeguridadController@createCamaraIp');
  Route::post('/update_camaraip/{id}', 'SeguridadController@updateCamaraIp');
  Route::get('/edit_camaraip/{id}', 'SeguridadController@editCamaraIp');

  Route::get('/dvrs', 'SeguridadController@showDvrs');
  Route::get('/only_dvr/{id}', 'SeguridadController@onlyDvr');
  Route::get('/form_dvr', 'SeguridadController@formDvr');
  Route::post('/add_dvr', 'SeguridadController@createDvr');
  Route::post('/update_dvr/{id}', 'SeguridadController@updateDvr');
  Route::get('/edit_dvr/{id}', 'SeguridadController@editDvr');

  Route::get('/camarasana', 'SeguridadController@showCamarasAna');
  Route::get('/only_camaraana/{id}', 'SeguridadController@onlyCamaraAna');
  Route::get('/form_camaraana', 'SeguridadController@formCamaraAna');
  Route::post('/add_camaraana', 'SeguridadController@createCamaraAna');
  Route::post('/update_camaraana/{id}', 'SeguridadController@updateCamaraAna');
  Route::get('/edit_camaraana/{id}', 'SeguridadController@editCamaraAna');

  Route::get('/card_sims', 'SeguridadController@showSims');
  Route::post('/add_sim', 'SeguridadController@createDvr');
  ////////////////////////////////////////////////////////////////////////

  //CREDENCIALES
  Route::get('/form_cred_cctv', 'SeguridadController@showCred');
  Route::get('/form_cred_cctv/{id}', 'SeguridadController@showAddcred');
  Route::post('/add_cred_cctv', 'SeguridadController@createCred');
  Route::get('/edit_cred_cctv/{id}', 'SeguridadController@editCred');
  Route::post('/update_cred_cctv/{id}', 'SeguridadController@updateCred');
    ////////////////////////////////////////////////////////////////////////


  //PERIFERICOS
  Route::get('/perifericos', 'PerifericoController@show');

  Route::get('/monitors', 'PerifericoController@showMonitors');
  Route::get('/only_monitor/{id}', 'PerifericoController@onlyMonitor');
  Route::get('/form_monitor', 'PerifericoController@formMonitor');
  Route::post('/add_monitor', 'PerifericoController@createMonitor');
  Route::post('/update_monitor/{id}', 'PerifericoController@updateMonitor');
  Route::get('/edit_monitor/{id}', 'PerifericoController@editMonitor');

  Route::get('/televisors', 'PerifericoController@showTelevisors');
  Route::get('/only_televisor/{id}', 'PerifericoController@onlyTelevisor');
  Route::get('/form_televisor', 'PerifericoController@formTelevisor');
  Route::post('/add_televisor', 'PerifericoController@createTelevisor');
  Route::post('/update_televisor/{id}', 'PerifericoController@updateTelevisor');
  Route::get('/edit_televisor/{id}', 'PerifericoController@editTelevisor');

  Route::get('/teclados', 'PerifericoController@showTeclados');
  Route::get('/only_teclado/{id}', 'PerifericoController@onlyTeclado');
  Route::get('/form_teclado', 'PerifericoController@formTeclado');
  Route::post('/add_teclado', 'PerifericoController@createTeclado');
  Route::post('/update_teclado/{id}', 'PerifericoController@updateTeclado');
  Route::get('/edit_teclado/{id}', 'PerifericoController@editTeclado');

  Route::get('/mouses', 'PerifericoController@showMouses');
  Route::get('/only_mouse/{id}', 'PerifericoController@onlyMouse');
  Route::get('/form_mouse', 'PerifericoController@formMouse');
  Route::post('/add_mouse', 'PerifericoController@createMouse');
  Route::post('/update_mouse/{id}', 'PerifericoController@updateMouse');
  Route::get('/edit_mouse/{id}', 'PerifericoController@editMouse');

  Route::get('/web_cams', 'PerifericoController@showWebcam');
  Route::get('/only_web_cam/{id}', 'PerifericoController@onlyWebcam');
  Route::get('/form_web_cam', 'PerifericoController@formWebcam');
  Route::post('/add_web_cam', 'PerifericoController@createWebcam');
  Route::post('/update_web_cam/{id}', 'PerifericoController@updateWebcam');
  Route::get('/edit_web_cam/{id}', 'PerifericoController@editWebcam');

  //Route::get('/form_periferico', 'PerifericoController@formPeriferico');
  //Route::post('/add_periferico', 'PerifericoController@createPeriferico');
  ////////////////////////////////////////////////////////////////////////

  //SDI

  Route::get('/abonados', 'SdiController@showAbonados');
  Route::get('/form_abonado', 'SdiController@formAbonado');
  Route::post('/add_abonado', 'SdiController@createAbonado');

  Route::get('/panel_alarms', 'SdiController@showPanelAlarm');
  Route::get('/only_panel_alarm/{id}', 'SdiController@onlyPanelAlarm');
  Route::get('/form_panel_alarm', 'SdiController@formPanelAlarm');
  Route::post('/add_panel_alarm', 'SdiController@createPanelAlarm');
  Route::post('/update_panel_alarm/{id}', 'SdiController@updatePanelAlarm');
  Route::get('/edit_panel_alarm/{id}', 'SdiController@editPanelAlarm');

  Route::get('/teclado_sdis', 'SdiController@showTeclado');
  Route::get('/only_teclado_sdi/{id}', 'SdiController@onlyTeclado');
  Route::get('/form_teclado_sdi', 'SdiController@formTeclado');
  Route::post('/add_teclado_sdi', 'SdiController@createTeclado');
  Route::post('/update_teclado_sdi/{id}', 'SdiController@updateTeclado');
  Route::get('/edit_teclado_sdi/{id}', 'SdiController@editTeclado');

  Route::get('/expansoras', 'SdiController@showExpansora');
  Route::get('/only_expansora/{id}', 'SdiController@onlyExpansora');
  Route::get('/form_expansora', 'SdiController@formExpansora');
  Route::post('/add_expansora', 'SdiController@createExpansora');
  Route::post('/update_expansora/{id}', 'SdiController@updateExpansora');
  Route::get('/edit_expansora/{id}', 'SdiController@editExpansora');

  Route::get('/comunicators', 'SdiController@showComunicator');
  Route::get('/only_comunicator/{id}', 'SdiController@onlyComunicator');
  Route::get('/form_comunicator', 'SdiController@formComunicator');
  Route::post('/add_comunicator', 'SdiController@createComunicator');
  Route::post('/update_comunicator/{id}', 'SdiController@updateComunicator');
  Route::get('/edit_comunicator/{id}', 'SdiController@editComunicator');

  Route::get('/sensors', 'SdiController@showSensor');
  Route::get('/only_sensor/{id}', 'SdiController@onlySensor');
  Route::get('/form_sensor', 'SdiController@formSensor');
  Route::post('/add_sensor', 'SdiController@createSensor');
  Route::post('/update_sensor/{id}', 'SdiController@updateSensor');
  Route::get('/edit_sensor/{id}', 'SdiController@editSensor');

  Route::get('/sirenas', 'SdiController@showSirena');
  Route::get('/only_sirena/{id}', 'SdiController@onlySirena');
  Route::get('/form_sirena', 'SdiController@formSirena');
  Route::post('/add_sirena', 'SdiController@createSirena');
  Route::post('/update_sirena/{id}', 'SdiController@updateSirena');
  Route::get('/edit_sirena/{id}', 'SdiController@editSirena');

  Route::get('/card_sims', 'CardsimController@showCardsim');
  Route::post('/add_card_sim', 'CardsimController@createCardsim');
  ////////////////////////////////////////////////////////////////////////

  //REPORTES
  Route::get('computadoras_pdf/{tipo}', 'PdfController@ReporteComputadorasPdf');
  Route::get('notebooks_pdf/{tipo}', 'PdfController@ReporteNotebooksPdf');
  Route::get('impresoras_pdf/{tipo}', 'PdfController@ReporteImpresorasPdf');
  Route::get('telefonos_pdf/{tipo}', 'PdfController@ReporteTelefonosIpPdf');
  Route::get('modems_pdf/{tipo}', 'PdfController@ReporteModemsPdf');
  Route::get('routers_pdf/{tipo}', 'PdfController@ReporteRoutersPdf');
  Route::get('switchs_pdf/{tipo}', 'PdfController@ReporteSwitchsPdf');
  Route::get('accespoints_pdf/{tipo}', 'PdfController@ReporteAccespointsPdf');
  Route::get('camarasip_pdf/{tipo}', 'PdfController@ReporteCamarasIpPdf');
  Route::get('camarasana_pdf/{tipo}', 'PdfController@ReporteCamarasanaPdf');
  Route::get('abonado_pdf/{id}', 'PdfController@ReporteAbonadosPdf');
  Route::get('dvr_pdf/{tipo}', 'PdfController@ReporteDvrsPdf');


  Route::get('report_dvr/{id}', 'PdfController@ReporteDvrPdf');
  ////////////////////////////////////////////////////////////////////////

  //FICHAS
  Route::get('entregas', 'FichaentregaController@showFichaentrega');
  Route::get('form_entregas', 'FichaentregaController@formFichaentrega');
  Route::get('form_entregas/{id}', 'FichaentregaController@formFichaentregaonly');
  Route::post('add_ficha_entrega', 'FichaentregaController@createFichaentrega');
  Route::get('entregas/{id}/{type}', 'FichaentregaController@downdFichaentrega');
  ////////////////////////////////////////////////////////////////////////

  //ADMINISTRACION
  Route::get('/administracion', 'AdministracionController@index')->name('administracion');
  Route::get('/users_host', 'AdministracionController@showUsersHost');
  Route::post('/add_user_host', 'AdministracionController@createUserhost');
  Route::get('/historial', 'AdministracionController@showHistorials');
  Route::get('/modelos', 'ModelosController@show');
  Route::post('/add_model', 'ModelosController@createModel');
  Route::get('/clientes', 'ClientesController@show');
  Route::post('/add_cliente', 'ClientesController@CreateCliente');
  Route::get('/departaments', 'AdministracionController@showDepartaments');
  Route::post('/add_departament', 'AdministracionController@createDepartament');

  ////////////////////////////////////////////////////////////////////////

  //USERS DEL SISTEMA
  Route::get('/users', 'UserController@showUsers');
  Route::post('/create_user', 'UserController@createUser');
  Route::get('/edit_user/{id}', 'UserController@editUser');
  Route::post('/update_user/{id}', 'UserController@updateUser');

  //ROLES DE USUARIO
  Route::get('/roles', 'RoleController@showRoles');
  Route::get('/form_role', 'RoleController@formRole');

  ////////////////////////////////////////////////////////////////////////

  //BUSQUEDAS
  Route::get('entregas', 'FichaentregaController@showFichaentrega');


  //REGISTRO DE TRABAJOS POR HOST
  Route::post('/add_work/{id}', 'HostworksController@createHostwork');
  ////////////////////////////////////////////////////////////////////////

  //QR
  Route::get('qr-code', function () {

        $host= $_SERVER["HTTP_HOST"];
        $url= $_SERVER["REQUEST_URI"];
        $url = "http://" . $host . $url;

        // /dd($url);
    return view('qrCode', [
      'url' => $url,
    ]);

  });
  ////////////////////////////////////////////////////////////////////////




});
