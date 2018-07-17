<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">


    @stack('css')

    <style>
        .btn-circle {
            width: 30px;
            height: 30px;
            padding: 6px 0px;
            border-radius: 15px;
            text-align: center;
            font-size: 12px;
            line-height: 1.42857;
        }

    </style>
</head>
<body>
    <div id="app">
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
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Hail Suit') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <li class="dropdown">

                            <a class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                {!! language()->flag(app()->getLocale()) !!}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1" role="menu">

                                @foreach (language()->allowed() as $code => $name)
                                    @if(app()->getLocale() !== $code)

                                        <li class="{{ config('language.flags.li_class') }}">
                                            <a href="{{ language()->back($code) }}">
                                                <img src="{{ asset('img/flags/'.($code == 'en' ? 'gb' : $code).'.png') }}"
                                                     alt="{{ $name }}"
                                                     width="{{ config('language.flags.width') }}" />
                                                {{ $name }}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach

                            </ul>
                        </li>
                        @if (Auth::guest())
                            <li><a href="{{ route('login', app()->getLocale()) }}">Login</a></li>
                            <li><a href="{{ route('register', app()->getLocale()) }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <li><a href="{{ route('cart.index')}}">Shopping Cart</a></li>

                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <footer style="background: #363636; height: 450px;">
        <div class="container">
            <div class="row">

                <div class="col-md-3">
                    <h1>
                        Algemeen
                    </h1>
                    <ul>
                        <li><a href="{{route('page.terms')}}">page.terms</a></li>
                        <li><a href="{{route('page.privacy')}}">page.privacy</a></li>
                        <li><a href="{{route('page.cookie')}}">page.cookie</a></li>
                        <li><a href="{{route('page.warranty')}}">page.warranty</a></li>
                        <li><a href="{{route('page.returns')}}">page.returns</a></li>
                        <li><a href="{{route('page.delivery')}}">page.delivery</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h1>
                        social media
                    </h1>
                </div>
                <div class="col-md-3">
                    <h1>
                        social media
                    </h1>
                    <ul>
                        <li>
                            <a href="#" class="btn btn-default btn-lg btn-circle">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="btn btn-default btn-lg btn-circle">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="btn btn-default btn-lg btn-circle">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-default btn-lg btn-circle">
                                <i class="fab fa-google-plus-g"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>


    @stack('js')

</body>
</html>
