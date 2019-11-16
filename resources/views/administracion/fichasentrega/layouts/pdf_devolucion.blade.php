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
      <img src="imgfichas/SAB-5Header.png">jgghj
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
      <div><span>Número: </span>{{$fichasentrega->id}}</div>
      <div><span>Usuario: </span>{{$fichasentrega->user_host->name}} {{$fichasentrega->user_host->apellido}}</div>
      <div><span>Fecha: </span>{{$fichasentrega->fecha->format('d/m/Y')}}</div>
      <div><span>Objetivo:</span>{{$fichasentrega->user_host->departament->name}} </div>
    </div>
  </header>

    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <footer>
      <div id="logo_ficha_footer">
        <img src="imgfichas/Firma.png">
    </div>
      <div id="logo_ficha_footer">
        <img src="imgfichas/SAB-5Footer.png">
    </div>
  </footer>

</body>


</html>
