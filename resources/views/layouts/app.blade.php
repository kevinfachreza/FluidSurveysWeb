<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/now-ui-kit.css')}}" rel="stylesheet" />

    <link href="{{asset('css/demo.css')}}" rel="stylesheet" />
</head>
<body class="login-page">

    <nav class="navbar navbar-toggleable-md bg-primary fixed-top navbar-transparent ">
        <div class="container">
            <div class="navbar-translate">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#example-navbar-warning" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
                <a class="navbar-brand" href="#pablo">FluidSurveys</a>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="example-navbar-warning">
                <ul class="navbar-nav">
                    @if (Auth::guest())
                    <li>
                        <a class="nav-link" href="{{ route('login') }}">
                            Login
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('register') }}">
                            Register
                        </a>
                    </li>

                    @else
                    <li class="dropdown">
                        <a class="nav-link" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Hello, <i class="fa fa-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </ul>
                </li>
                @endif

            </ul>
        </div>
    </div>
</nav>

@yield('content')

<!-- Scripts -->
<script src="{{asset('js/core/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/tether.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{asset('js/plugins/bootstrap-switch.js')}}"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{('js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="{{asset('js/plugins/bootstrap-datepicker.js')}}" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/now-ui-kit.js')}}" type="text/javascript"></script>
</body>
</html>
