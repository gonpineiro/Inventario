<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('js/jquery-3.3.1.js') }}" ></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}" ></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}" ></script>
    <script src="{{ asset('serviceworker.js') }}" ></script>
    <script src="{{ asset('js/Chart.min.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@laravelPWA
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Inventario') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      <p style='margin-left: 8em'></p>
                      <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownAmbientes" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><span class="caret">Hosts de usuarios</span></a>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                {{-- <a class="dropdown-item" href="/hosts"><span>Todos</span></a> --}}
                                @can ('computadoras.show') <a class="dropdown-item" href="/computadoras"><span>Computadoras</span></a>@endcan
                                @can ('notebooks.show') <a class="dropdown-item" href="/notebooks"><span>Notebooks</span></a>@endcan
                                @can ('impresoras.show') <a class="dropdown-item" href="/impresoras"><span>Impresoras</span></a>@endcan
                                @can ('phoneips.show') <a class="dropdown-item" href="/telefoniaip"><span>Telefonía IP</span></a>@endcan
                                @can ('licencias.show') <span>- - - - - - - - - - - - - -</span>
                                <a class="dropdown-item" href="/licencias"><span>Licencias</span></a> @endcan
                            </div>
                        </li>
                      </ul>
                      <p style='margin-left: 2em'></p>

                      <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownAmbientes" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><span class="caret">Networking</span></a>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                {{-- <a class="dropdown-item" href="/networking"><span>Todos</span></a> @endcan --}}
                                @can ('modems.show')<a class="dropdown-item" href="/modems"><span>Modems</span></a> @endcan
                                @can ('routers.show')<a class="dropdown-item" href="/routers"><span>Routers</span></a> @endcan
                                @can ('switchs.show')<a class="dropdown-item" href="/switchs"><span>Switchs</span></a> @endcan
                                @can ('accespoints.show')<a class="dropdown-item" href="/accespoints"><span>AccesPoints</span></a> @endcan
                                @can ('crednets.show') <span>- - - - - - - - - - - - - -</span>
                                <a class="dropdown-item" href="/form_cred_net"><span>Credenciales</span></a> @endcan
                            </div>
                        </li>
                      </ul>
                      <p style='margin-left: 2em'></p>
                      <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownAmbientes" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><span class="caret">CCTV</span></a>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                {{-- <a class="dropdown-item" href="/seguridads"><span>Todos</span></a> --}}
                                @can ('camaraips.show')<a class="dropdown-item" href="/camarasip"><span>Cámaras IP</span></a> @endcan
                                @can ('camarasanas.show')<a class="dropdown-item" href="/camarasana"><span>Cámaras Analogicas</span></a> @endcan
                                @can ('dvrs.show')<a class="dropdown-item" href="/dvrs"><span>DVR</span></a> @endcan
                                @can ('credcctvs.show') <span>- - - - - - - - - - - - - -</span>
                                <a class="dropdown-item" href="/form_cred_cctv"><span>Credenciales</span></a> @endcan
                            </div>
                        </li>
                      </ul>
                      <p style='margin-left: 2em'></p>
                      <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownAmbientes" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><span class="caret">SDI / GNSS</span></a>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @can ('abonados.show')<a class="dropdown-item" href="/abonados"><span>Abonados</span></a> @endcan
                                @can ('camaraips.show')<a class="dropdown-item" href="/panel_alarms"><span>Paneles de alarma</span></a> @endcan
                                @can ('tecladosdis.show')<a class="dropdown-item" href="/teclado_sdis"><span>Teclados</span></a> @endcan
                                @can ('expansoras.show')<a class="dropdown-item" href="/expansoras"><span>Expansoras</span></a> @endcan
                                @can ('comunicators.show')<a class="dropdown-item" href="/comunicators"><span>Comunicadores</span></a> @endcan
                                @can ('sensors.show')<a class="dropdown-item" href="/sensors"><span>Sensores</span></a> @endcan
                                @can ('sirenas.show')<a class="dropdown-item" href="/sirenas"><span>Sirenas</span></a> @endcan
                                @can ('panics.show')<a class="dropdown-item" href="/panics"><span>Panicos</span></a>@endcan
                                @can ('trackers.show')<a class="dropdown-item" href="/trackers"><span>Trackers</span></a>@endcan
                                @can ('cardsims.show')<span>- - - - - - - - - - - - - -</span>
                                <a class="dropdown-item" href="/card_sims"><span>SIMS</span></a> @endcan
                            </div>
                        </li>
                      </ul>
                      <p style='margin-left: 2em'></p>
                      <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownAmbientes" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><span class="caret">Periférico</span></a>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                {{-- <a class="dropdown-item" href="/perifericos"><span>Todos</span></a> --}}
                                @can ('televisors.show')<a class="dropdown-item" href="/televisors"><span>Televisores</span></a> @endcan
                                @can ('monitors.show')<a class="dropdown-item" href="/monitors"><span>Monitores</span></a> @endcan
                                @can ('teclados.show')<a class="dropdown-item" href="/teclados"><span>Teclados</span></a> @endcan
                                @can ('mouses.show')<a class="dropdown-item" href="/mouses"><span>Mouses</span></a> @endcan
                                @can ('webcams.show')<a class="dropdown-item" href="/web_cams"><span>Web Cams</span></a> @endcan
                            </div>
                        </li>
                      </ul>
                      <p style='margin-left: 10em'></p>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav pull-xs-right">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/administracion"><span>Administracion</span></a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

    </div>



</body>
<footer class="page-footer font-small blue pt-4">
  <div class="footer-copyright text-center py-3">
    © 2020 Copyright. Version 1.4
    </div>
</footer>

</html>
