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
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">


    <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

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
        .navbar-fixed-top{
            background: #ffffff;
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
            background: #FE6F41;
            color: #fff;
            height: 20px;
            width: 20px;
            padding: 4px 5px;
            vertical-align: center;
            margin: -35px 0px 0px -10px;
        }

        .main-menu a, .main-menu span{
            color: #000000 !important;
        }

        footer {
            /*height: auto;*/
            /*padding: 30px ;*/
            bottom: 0;
            width: 100%;
            /* Set the fixed height of the footer here */
            height: auto;
            background-color: #232323;
        }
        footer hr{ border: 1px solid #383E49;}

        .footer-copyright{
            background: #121212;
            padding: 20px 0px 0px 0px;
            line-height: 40px;
        }
        .payment-icons ul li {
            font-size: 35px;
        }
        .social-container-footer{
            padding-bottom: 15px;
        }

        .btn-rounded{
            border-radius: 25px;
        }

        .back-to-top i{
            margin-top: -10px !important;
            /*vertical-align: center !important;*/
        }
        #back-to-top {
            text-align: center;
            margin: 20px;
            position: fixed;
            bottom: 0;
            right: 0;
            width: 50px;
            height: 50px;
            z-index: 100;
            display: none;
            text-decoration: none;
            color: #ffffff;
            background-color: #FE6F41;
            font-size: 35px !important;
            box-shadow: 0px 7px 25px 1px rgba(0,0,0,0.08);
        }

        .footer-social-icons{
            font-size: 35px;
        }

    </style>

    @stack('css')

</head>
<body>
    {{--<div class="loader"></div>--}}

    @include('components.menu-fixed-top')

    @yield('content')

    @include('components.footer')

    {{--<a href="#" class="back-to-top" style="display: inline;">--}}
        {{--<i class="fas fa-angle-up"></i>--}}
    {{--</a>--}}

    <!-- Latest compiled and minified JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script type="text/javascript">
        $(window).load(function() {
            $(".loader").fadeOut("slow");
        });

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
