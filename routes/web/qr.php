<?php
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
 ?>
