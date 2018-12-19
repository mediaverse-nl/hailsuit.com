<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {!! SEO::generate() !!}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Hailsuit') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/css/animsition.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />

    <link rel="stylesheet" href="/css/footer-style.css">
    <link rel="stylesheet" href="/css/base.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">


    @stack('css')

    <style>

    </style>

</head>
<body>
    @component('components.page-loader')
        @include('components.menu-fixed-top')

        @yield('content')

        @include('components.footer')
    @endcomponent

    <!-- Latest compiled and minified JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>

    <script>
        window.addEventListener("load", function(){
            window.cookieconsent.initialise({
                "palette": {
                    "popup": {
                        "background": "#000"
                    },
                    "button": {
                        "background": "#f1d600"
                    }
                },
                "position": "bottom-right",
                "type": "opt-out",
                "content": {
                    "message": "This website uses cookies to ensure you get the best experience on our website.",
                    "dismiss": "Decline",
                    "deny": "Refuse cookies",
                    "link": "Learn more",
                    "href": "www.hailsuit.com/privacy-policy"
                }
            })});
    </script>

    {{--<script>--}}
        {{--$(document).ready(function() {--}}

            {{--var docHeight = $(window).height();--}}
            {{--var footerHeight = $('.footer-distributed').height();--}}
            {{--var footerTop = $('.footer-distributed').position().top + footerHeight;--}}

            {{--if (footerTop < docHeight)--}}
                {{--$('.footer-distributed').css('margin-top', 10+ (docHeight - footerTop) + 'px');--}}
        {{--});--}}
    {{--</script>--}}

    <script type="text/javascript">
        $(document).ready(function(){
            $('body').append('<div id="back-to-top" style="display:none"><i class="fas fa-angle-up"></i></div>');
            if ($(this).scrollTop() != 0) {
                $('#back-to-top').fadeIn();
            }
            $(window).scroll(function () {
                if ($(this).scrollTop() != 0) {
                    $('#back-to-top').fadeIn();
                } else {
                    $('#back-to-top').fadeOut();
                }
            });
            $('#back-to-top').click(function(){
                $("html, body").animate({ scrollTop: 0 }, 600);
                return false;
            });
        });
    </script>

    @stack('js')

</body>
</html>
