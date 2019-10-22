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
    <div id="logo">
      <img src="logo.png">
    </div>
    <h1>Reporte de {{ $reportName}}</h1>
  </header>
    <div id="app">

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
