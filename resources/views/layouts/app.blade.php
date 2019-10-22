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
                                <a class="dropdown-item" href="/hosts"><span>Todos</span></a>
                                <a class="dropdown-item" href="/computadoras"><span>Computadoras</span></a>
                                <a class="dropdown-item" href="/notebooks"><span>Notebooks</span></a>
                                <a class="dropdown-item" href="/impresoras"><span>Impresoras</span></a>
                                <a class="dropdown-item" href="/telefoniaip"><span>Telefonía IP</span></a>
                            </div>
                        </li>
                      </ul>



                      <p style='margin-left: 2em'></p>
                      <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownAmbientes" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><span class="caret">Networking</span></a>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/networking"><span>Todos</span></a>
                                <a class="dropdown-item" href="/modems"><span>Modems</span></a>
                                <a class="dropdown-item" href="/routers"><span>Routers</span></a>
                                <a class="dropdown-item" href="/switchs"><span>Switchs</span></a>
                                <a class="dropdown-item" href="/accespoints"><span>AccesPoints</span></a>
                                <span>- - - - - - - - - - - - - -</span>
                                <a class="dropdown-item" href="/form_cred_net"><span>Credenciales</span></a>
                            </div>
                        </li>
                      </ul>

                      <p style='margin-left: 2em'></p>
                      <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownAmbientes" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><span class="caret">CCTV</span></a>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/seguridads"><span>Todos</span></a>
                                <a class="dropdown-item" href="/camarasip"><span>Cámaras IP</span></a>
                                <a class="dropdown-item" href="/camarasana"><span>Cámaras Analogicas</span></a>
                                <a class="dropdown-item" href="/dvrs"><span>DVR</span></a>
                                <span>- - - - - - - - - - - - - -</span>
                                <a class="dropdown-item" href="/form_cred_cctv"><span>Credenciales</span></a>
                            </div>
                        </li>
                      </ul>

                      <p style='margin-left: 2em'></p>
                      <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownAmbientes" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><span class="caret">SDI / GNSS</span></a>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/abonados"><span>Abonados</span></a>
                                <a class="dropdown-item" href="/panel_alarms"><span>Paneles de alarma</span></a>
                                <a class="dropdown-item" href="/teclado_sdis"><span>Teclados</span></a>
                                <a class="dropdown-item" href="/expansoras"><span>Expansoras</span></a>
                                <a class="dropdown-item" href="/comunicators"><span>Comunicadores</span></a>
                                <a class="dropdown-item" href="/sensors"><span>Sensores</span></a>
                                <a class="dropdown-item" href="/panics"><span>Panicos</span></a>
                                <a class="dropdown-item" href="/trackers"><span>Trackers</span></a>
                                <span>- - - - - - - - - - - - - -</span>
                                <a class="dropdown-item" href="/card_sims"><span>SIMS</span></a>
                            </div>
                        </li>
                      </ul>

                      <p style='margin-left: 2em'></p>
                      <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownAmbientes" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><span class="caret">Periférico</span></a>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/perifericos"><span>Todos</span></a>
                                <a class="dropdown-item" href="/televisors"><span>Televisores</span></a>
                                <a class="dropdown-item" href="/monitors"><span>Monitores</span></a>
                                <a class="dropdown-item" href="/teclados"><span>Teclados</span></a>
                                <a class="dropdown-item" href="/mouses"><span>Mouses</span></a>
                                <a class="dropdown-item" href="/web_cams"><span>Web Cams</span></a>
                            </div>
                        </li>
                      </ul>

                      <p style='margin-left: 10em'></p>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
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

</html>
