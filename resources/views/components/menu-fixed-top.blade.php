<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Page 1-1</a></li>
                        <li><a href="#">Page 1-2</a></li>
                        <li><a href="#">Page 1-3</a></li>
                    </ul>
                </li>
                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </div>
</nav>


{{--<nav class="navbar navbar-default navbar-fixed-top main-menu" style="min-height: 80px;">--}}

    {{--@if(session()->has('laravel_cookie_consent'))--}}
        {{--<div class="row cookie-banner" style="background: #333; padding: 10px;">--}}
            {{--<div class="container">--}}
                {{--@include('cookieConsent::index')--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--@endif--}}

    {{--<div class="row">--}}
        {{--<div class="container">--}}
            {{--<div class="navbar-header">--}}

                {{--<!-- Collapsed Hamburger -->--}}
                {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">--}}
                    {{--<span class="sr-only">Toggle Navigation</span>--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                {{--</button>--}}

                {{--<!-- Branding Image -->--}}
                {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
                    {{--{{ config('app.name', 'Hail Suit') }}--}}
                    {{--<img src="/img/Hail_Suit_logo_right.png" style="object-fit: contain; height: 80px;">--}}
                {{--</a>--}}
            {{--</div>--}}

            {{--<div class="collapse navbar-collapse" id="app-navbar-collapse" style="">--}}

                {{--<!-- Right Side Of Navbar -->--}}
                {{--<ul class="nav navbar-nav navbar-right">--}}
                    {{--<li style="border-left: 1px solid #d8dce2;">--}}
                        {{--<a href="{{ route('contact.index')}}" class="icon-shopping-bag" style="font-size: 25px">--}}
                            {{--<i class="fa fa-shopping-bag" style="margin: 0px 5px;"></i>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li style="border-right: 1px solid #d8dce2; border-left: 1px solid #d8dce2;">--}}
                        {{--<a href="{{ route('contact.index')}}" class="icon-shopping-cart" style="font-size: 25px">--}}
                            {{--<i class="fa fa-phone" style="margin: 0px 5px;"></i>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li style="border-right: 1px solid #d8dce2;">--}}
                        {{--<a href="{{ route('cart.index')}}" class="icon-shopping-cart" style="font-size: 25px">--}}
                            {{--<i class="fa fa-shopping-cart"></i>--}}
                            {{--<Label id="lblCartCount" class="badge badge-warning" >{!! Cart::count() !!}</Label>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<!-- Authentication Links -->--}}
                    {{--<li class="dropdown" style="border-right: 1px solid #d8dce2;">--}}
                        {{--<a class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">--}}
                            {{--{!! language()->flag(app()->getLocale()) !!}--}}
                            {{--<span class="caret"></span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1" role="menu" >--}}

                            {{--@foreach (language()->allowed() as $code => $name)--}}
                                {{--@if(app()->getLocale() !== $code)--}}

                                    {{--<li class="{{ config('language.flags.li_class') }}">--}}
                                        {{--<a href="{{ language()->back($code) }}">--}}
                                            {{--<img src="{{ asset('img/flags/'.($code == 'en' ? 'gb' : $code).'.png') }}"--}}
                                                 {{--alt="{{ $name }}"--}}
                                                 {{--width="{{ config('language.flags.width') }}" />--}}
                                            {{--{{ $name }}--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                {{--@endif--}}
                            {{--@endforeach--}}

                        {{--</ul>--}}
                    {{--</li>--}}

                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</nav>--}}
