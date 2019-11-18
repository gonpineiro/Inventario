<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Titulo</title>
      <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <!-- Styles -->
      <link href="{{ asset('css/reportes/abonado.css') }}" rel="stylesheet">
</head>

<body>
<header class="clearfix">
  <div id="project">
    <div><span>Reporte del abonado:</span><a class="">{{$abonado->numero}}</a></div>
    <div><span> Afectado: </span><a class="">{{$abonado->cliente->name}} </a></div>
  </div>
</header>

    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body>
</html>
