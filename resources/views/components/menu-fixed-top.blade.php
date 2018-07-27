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
                        <Label id="lblCartCount" class="badge badge-warning" >{!! Cart::count() !!}</Label>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
