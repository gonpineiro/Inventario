<?php
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
 ?>
