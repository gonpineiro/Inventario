<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Titulo</title>
      <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <!-- Styles -->
      <link href="{{ asset('css/pdf.css') }}" rel="stylesheet">
</head>

<body>
  <header class="clearfix">
    <div id="ficha_header">
        <img src="imgfichas/SAB-5Header.png">
    </div>

    <br><br>
    <div id="ficha_leyenda"><img src="imgfichas/Leyenda.png"></div>
    <br><br>
      <!--<div id="company" class="clearfix">
        <div>Company Name</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>-->
    <div id="project">
      <div><span>ID: </span>{{$dvr->id}}</div>
      <div><span>Nombre: </span>{{$dvr->name}}</div>
      <div><span>Serial: </span>{{$dvr->serial}}</div>
      <div><span>IP Local: </span>{{$dvr->ip_local}}</div>
      <div><span>IP Publica:</span>{{$dvr->ip_publica}}</div>
      <div><span>Superior:</span> {{$dvr->modelo->marca}} - {{$dvr->modelo->name}}</div>
      <div><span>Objetivo:</span> p4</div>
    </div>
  </header>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>


</body>


</html>
