<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Carwash</title>

    <!-- PARA REPORTES -->
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/home') }}">
                    PROYECTO CARWASH
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                
                @if(Auth::check())
                <?php $tipo = 'Anomino'; ?>
                @if(Auth::user()->tipo_usuario=='1')
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/home') }}">Inicio</a></li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/vehiculos') }}">Vehiculos</a></li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/socursals') }}">Socursales</a></li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/lavados') }}">Lavados</a></li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/users') }}">Usuarios</a></li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/reportes') }}">Reportes</a></li>
                    </ul>
                    <?php $tipo = 'Administrador'; ?>
                @elseif (Auth::user()->tipo_usuario=='2')
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/home') }}">Inicio</a></li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/lavados') }}">Lavados</a></li>
                    </ul>
                    <?php $tipo = 'Cajero'; ?>
                @elseif (Auth::user()->tipo_usuario=='3')
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/home') }}">Inicio</a></li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/vehiculos') }}">Vehiculos</a></li>
                    </ul>
                    <?php $tipo = 'Lavador'; ?>
                @else
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/home') }}">Inicio</a></li>
                    </ul>

                @endif
                @else
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/home') }}">Inicio</a></li>
                    </ul>                
                @endif
                <!-- <ul class="nav navbar-nav">
                    <li class="active"><a href="javascript:void(0);" onclick="cargarlistado(3,1);" >Reportes </a></li>
                </ul> -->

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Iniciar Sesion</a></li>
                        <li><a href="{{ url('/register') }}">Registrarse</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} , {{$tipo}}<span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Salir</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    
    @yield('content')
    
    <!-- JavaScripts SOLO FUNCIONARA CON INTERNET EVERIGUAR SIN INTER-->
    <script src="../javascript/jquery.min.js" ></script>
    <script src="../javascript/bootstrap.min.js" ></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    @yield('scripts')

</body>
</html>
