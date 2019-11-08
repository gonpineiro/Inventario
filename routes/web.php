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
  Route::get('/', 'HomeController@index')->name('home');

  //USER HOSTS
  Route::get('/hosts', 'HostsController@show')->middleware('can:computadoras.show','can:notebooks.show','can:impresoras.show','can:phoneips.show');

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

  //NETWORKING
  Route::get('/networking', 'NetworkingController@show');

  Route::get('/modems', 'NetworkingController@showModems')->middleware('can:modems.show');
  Route::get('/only_modem/{id}', 'NetworkingController@onlyModem')->middleware('can:modems.only');
  Route::get('/form_modem', 'NetworkingController@formModem')->middleware('can:modems.create');
  Route::post('/add_modem', 'NetworkingController@createModem')->middleware('can:modems.create');
  Route::post('/update_modem/{id}', 'NetworkingController@updateModem')->middleware('can:modems.edit');
  Route::get('/edit_modem/{id}', 'NetworkingController@editModem')->middleware('can:modems.edit');


  Route::get('/routers', 'NetworkingController@showRouters')->middleware('can:routers.show');
  Route::get('/only_router/{id}', 'NetworkingController@onlyRouter')->middleware('can:routers.only');
  Route::get('/form_router', 'NetworkingController@formRouter')->middleware('can:routers.create');
  Route::post('/add_router', 'NetworkingController@createRouter')->middleware('can:routers.create');
  Route::post('/update_router/{id}', 'NetworkingController@updateRouter')->middleware('can:routers.edit');
  Route::get('/edit_router/{id}', 'NetworkingController@editRouter')->middleware('can:routers.edit');


  Route::get('/switchs', 'NetworkingController@showSwitchs')->middleware('can:switchs.show');
  Route::get('/only_switch/{id}', 'NetworkingController@onlySwitch')->middleware('can:switchs.only');
  Route::get('/form_switch', 'NetworkingController@formSwitch')->middleware('can:switchs.create');
  Route::post('/add_switch', 'NetworkingController@createSwitch')->middleware('can:switchs.create');
  Route::post('/update_switch/{id}', 'NetworkingController@updateSwitch')->middleware('can:switchs.edit');
  Route::get('/edit_switch/{id}', 'NetworkingController@editSwitch')->middleware('can:switchs.edit');


  Route::get('/accespoints', 'NetworkingController@showAccespoints')->middleware('can:accespoints.show');
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

  //SEGURIDAD
  Route::get('/seguridads', 'SeguridadController@show');

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

  //REPORTES
  Route::get('computadoras_pdf/{tipo}', 'PdfController@ReporteComputadorasPdf')->middleware('can:computadoras.show');
  Route::get('notebooks_pdf/{tipo}', 'PdfController@ReporteNotebooksPdf')->middleware('can:notebook.show');
  Route::get('impresoras_pdf/{tipo}', 'PdfController@ReporteImpresorasPdf')->middleware('can:impresoras.show');
  Route::get('telefonos_pdf/{tipo}', 'PdfController@ReporteTelefonosIpPdf')->middleware('can:phoneips.show');
  Route::get('modems_pdf/{tipo}', 'PdfController@ReporteModemsPdf')->middleware('can:modems.show');
  Route::get('routers_pdf/{tipo}', 'PdfController@ReporteRoutersPdf')->middleware('can:routers.show');
  Route::get('switchs_pdf/{tipo}', 'PdfController@ReporteSwitchsPdf')->middleware('can:switchs.show');
  Route::get('accespoints_pdf/{tipo}', 'PdfController@ReporteAccespointsPdf')->middleware('can:accespoints.show');
  Route::get('camarasip_pdf/{tipo}', 'PdfController@ReporteCamarasIpPdf')->middleware('can:camaraips.show');
  Route::get('camarasana_pdf/{tipo}', 'PdfController@ReporteCamarasanaPdf')->middleware('can:camarasanas.show');
  Route::get('abonado_pdf/{id}', 'PdfController@ReporteAbonadosPdf')->middleware('can:abonado.only');
  Route::get('dvr_pdf/{tipo}', 'PdfController@ReporteDvrsPdf')->middleware('can:dvrs.show');


  Route::get('report_dvr/{id}', 'PdfController@ReporteDvrPdf')->middleware('can:dvrs.only');
  ////////////////////////////////////////////////////////////////////////

  //FICHAS
  Route::get('entregas', 'FichaentregaController@showFichaentrega')->middleware('can:entregas.show');
  Route::get('form_entregas', 'FichaentregaController@formFichaentrega')->middleware('can:entregas.create');
  Route::get('form_entregas/{id}', 'FichaentregaController@formFichaentregaonly')->middleware('can:entregas.create');
  Route::post('add_ficha_entrega', 'FichaentregaController@createFichaentrega')->middleware('can:entregas.create');
  Route::get('entregas/{id}/{type}', 'FichaentregaController@downdFichaentrega')->middleware('can:entregas.create');
  ////////////////////////////////////////////////////////////////////////

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

  ////////////////////////////////////////////////////////////////////////

  //USERS DEL SISTEMA
  Route::get('/users', 'UserController@showUsers')->middleware('can:users.show');
  Route::post('/create_user', 'UserController@createUser')->middleware('can:users.create');
  Route::get('/edit_user/{id}', 'UserController@editUser')->middleware('can:users.edit');
  Route::post('/update_user/{id}', 'UserController@updateUser')->middleware('can:users.edit');

  //ROLES DE USUARIO
  Route::get('/roles', 'RoleController@showRoles')->middleware('can:roles.show');
  //Route::get('/edit_role/{id}', 'RoleController@editRole');
  Route::get('/form_role', 'RoleController@formRole')->middleware('can:roles.create');
  Route::post('/create_role', 'RoleController@createRole')->middleware('can:roles.create');

  ////////////////////////////////////////////////////////////////////////

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
