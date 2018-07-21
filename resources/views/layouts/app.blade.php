<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {!! SEO::generate() !!}

<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">

    <style>
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('/img/ajax-loading.gif') 50% 50% no-repeat rgb(249,249,249);
            opacity: .8;
        }

        body{
            font-family: 'Karla', sans-serif;
            margin-top: 100px;
            background: #F5F7F7 !important;
        }

        .btn-circle {
            width: 30px;
            height: 30px;
            padding: 6px 0px;
            border-radius: 15px;
            text-align: center;
            font-size: 12px;
            line-height: 1.42857;
        }

        .navbar {
            min-height: 80px;
        }

        .navbar-brand {
            padding: 0 15px;
            height: 80px;
            line-height: 80px;
        }

        .navbar-toggle {
            /* (80px - button height 34px) / 2 = 23px */
            margin-top: 23px;
            padding: 9px 10px !important;
        }

        @media (min-width: 768px) {
            .navbar-nav > li > a {
                /* (80px - line-height of 27px) / 2 = 26.5px */
                padding-top: 26.5px;
                padding-bottom: 26.5px;
                line-height: 27px;
            }
        }

        #lblCartCount {
            font-size: 12px;
            background: #ff0000;
            color: #fff;
            padding: 2px 5px;
            vertical-align: center;
        }

        .main-menu a, .main-menu span{
            color: #000000 !important;
        }
    </style>

    @stack('css')

</head>
<body>
    <div id="app">
        <div class="loader"></div>

        <nav class="navbar navbar-default navbar-fixed-top main-menu" style="height: 80px;">
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
                        {{--{{ config('app.name', 'Hail Suit') }}--}}
                        <img src="/img/Hail_Suit_logo_right.png" style="object-fit: contain; height: 80px;">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse" style="height: 100% !important;" style="border-bottom: 1px solid #d8dce2;">

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <li class="dropdown" style="border-right: 1px solid #d8dce2;">

                            <a class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                {!! language()->flag(app()->getLocale()) !!}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1" role="menu" >

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
                        <li>
                            <a href="{{ route('cart.index')}}" class="icon-shopping-cart" style="font-size: 25px">
                                <i class="fa fa-shopping-cart"></i>
                                <Label id="lblCartCount" class="badge badge-warning" >3</Label>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <footer style="background: #363636; min-height: 450px;">
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
                        <li><a href="{{route('page.app')}}">page.app</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h1>
                        social media
                    </h1>
                    <ul>
                        <li>
                            <a href="">adress</a>
                        </li>
                    </ul>
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
                            {{--<a href="#" class="btn btn-default btn-lg btn-circle">--}}
                                {{--<i class="fab fa-twitter"></i>--}}
                            {{--</a>--}}
                            <a href="#" class="btn btn-default btn-lg btn-circle">
                                <i class="fab fa-google-plus-g"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <img src="/img/Apple-App-Store-_logo.png" alt="" class="img-responsive">

                </div>
                <div class="col-md-3">
                    <img src="/img/en_badge_web_generic.png" alt="" class="img-responsive">

                </div>
            </div>

        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script type="text/javascript">
        $(window).load(function() {
            $(".loader").fadeOut("slow");
        });
    </script>

    @stack('js')

</body>
</html>
