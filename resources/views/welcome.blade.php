@extends('layouts.app')

@section('content')

    <div class="row" style="margin: 0px; ">
        <div class="col-md-12" style="overflow: hidden;  padding: 0px;">
            <img src="/img/assets/Header-WEB (1).png" alt=""
                 style="
                     width: 100%;
                     margin-left:auto;
                    margin-right:auto;
                    height: 80% !important;
                ">
            <img src="/img/assets/Header-auto-los.png" alt=""
                 style="
                    margin-top: -27%;
                    width:100%;
                    z-index: 1;
                ">
        </div>
    </div>

    <div class="container" style="margin-bottom: 80px;">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center text-uppercase lead" style="margin: -10% 0px 50px 0px; font-size: 30px;">{!! Translator('welcome_title', 'text', false, 'worlds leading hail protection for your vehicle') !!}</h1>
                <p>{!! Translator('welcome_title_paragraph', 'richtext', false, 'Bacon ipsum dolor amet meatloaf capicola buffalo turducken cupim pork belly sirloin strip steak bacon picanha kevin bresaola swine kielbasa. Pork belly spare ribs biltong, flank turducken filet mignon hamburger shoulder tenderloin pork loin picanha. Jerky beef ribs brisket biltong, frankfurter alcatra fatback pig meatball sausage turkey doner tongue corned beef pork loin. Tail t-bone bacon spare ribs, flank porchetta venison. Jerky beef jowl tri-tip. Brisket spare ribs pork chop filet mignon strip steak doner. Ham corned beef ground round chicken pork chop.') !!}</p>
            </div>
            <div class="col-md-12" style="overflow: hidden !important;">
                <div class="row" id="fade">
                    <div style="padding: 10px;">
                        <img src="/img/assets/Sfeerbeeld-02.png" alt="" class="img-responsive">
                    </div>
                    <div style="padding: 10px;">
                        <img src="/img/assets/Sfeerbeeld-03.png" alt="" class="img-responsive">
                    </div>
                    <div style="padding: 10px;">
                        <img src="/img/assets/Sfeerbeeld-05.png" alt="" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="container content-container ">
        <div class="col-md-12 valign">
            <div style="padding: 80px 0px 20px 0px;">
                <p class="lead text-uppercase text-center design-panel" style="padding-top:0px !important;">
                    <span>
                        {!! Translator('welcome_design_label', 'text', false, 'design') !!}
                    </span>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-5 valign">
                <img src="/img/assets/lock-system.png" alt="" class="center-block" style="width:100%; ">
                <br>
            </div>
            <div class="col-sm-12 col-md-7 text-md-left mb-3 mb-md-0 valign special-text" style="padding: 10% 10px;">
                <p style="">
                    {!! Translator('welcome_design_paragraph', 'richtext', false, 'Bacon ipsum dolor amet meatloaf capicola buffalo turducken cupim pork belly sirloin strip steak bacon picanha kevin bresaola swine kielbasa. Pork belly spare ribs biltong, flank turducken filet mignon hamburger shoulder tenderloin pork loin picanha. Jerky beef ribs brisket biltong, frankfurter alcatra fatback pig meatball sausage turkey doner tongue corned beef pork loin. Tail t-bone bacon spare ribs, flank porchetta venison. Jerky beef jowl tri-tip. Brisket spare ribs pork chop filet mignon strip steak doner. Ham corned beef ground round chicken pork chop.') !!}
                </p>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-sm-12 col-md-5 hidden-md hidden-lg valign">
                <br>
                <img src="/img/assets/pomp-system.png" alt="" class="center-block" style="width:100%;">
            </div>
            <div class="col-sm-12 col-md-7 text-xs-right mb-3 mb-md-0 valign special-text"  style="padding: 10% 10px;">
                <p  class="">
                    {!! Translator('welcome_design_paragraph2', 'richtext', false, 'Bacon ipsum dolor amet meatloaf capicola buffalo turducken cupim pork belly sirloin strip steak bacon picanha kevin bresaola swine kielbasa. Pork belly spare ribs biltong, flank turducken filet mignon hamburger shoulder tenderloin pork loin picanha. Jerky beef ribs brisket biltong, frankfurter alcatra fatback pig meatball sausage turkey doner tongue corned beef pork loin. Tail t-bone bacon spare ribs, flank porchetta venison. Jerky beef jowl tri-tip. Brisket spare ribs pork chop filet mignon strip steak doner. Ham corned beef ground round chicken pork chop.') !!}
                </p>
            </div>
            <div class="col-sm-12 col-md-5 valign mb-3 mb-md-0 hidden-xs hidden-sm">
                <img src="/img/assets/pomp-system.png" alt="" class="center-block" style="width:100%;">
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-5 text-center mb-3 mb-md-0" style="overflow: hidden;">
                {{--<br>--}}
                <img src="/img/assets/hailsuit-gif2.gif" alt="" class="center-block gif-img" style="width:115%;">
                <br>
            </div>
            <div class="col-sm-12 col-md-7 text-md-left mb-3 mb-md-0 special-text"  style="padding: 5% 10px;">
                <p style="padding-top: 0px; !important;"  id="last">
                {!! Translator('welcome_design_paragraph3', 'richtext', false, 'Bacon ipsum dolor amet meatloaf capicola buffalo turducken cupim pork belly sirloin strip steak bacon picanha kevin bresaola swine kielbasa. Pork belly spare ribs biltong, flank turducken filet mignon hamburger shoulder tenderloin pork loin picanha. Jerky beef ribs brisket biltong, frankfurter alcatra fatback pig meatball sausage turkey doner tongue corned beef pork loin. Tail t-bone bacon spare ribs, flank porchetta venison. Jerky beef jowl tri-tip. Brisket spare ribs pork chop filet mignon strip steak doner. Ham corned beef ground round chicken pork chop.') !!}
                </p>
            </div>
            <br>
        </div>
    </div>

    <br>

    <div class="container" style="overflow: hidden !important;">
        <h2 class="text-center">{!! Translator('welcome_shop_title', 'text', false, 'Bekijk alle producten in de shop') !!}</h2>
        <br>
        <div class="product-slide">

            @foreach($products as $product)
                <div class="col-md-3 col-sm-4 col-sm-4 col-xs-6 ">
                    @component('components.auto-model', ['product' => $product])

                    @endcomponent
                </div>
            @endforeach

        </div>
        <div class="text-center">
            <br>
            <a class="btn btn-default " href="{!! route('product.index') !!}"  style="border-radius: 0px;  ">SHOP</a>
        </div>
    </div>


    {{--<div class="container" style="overflow: hidden !important;">--}}

        {{--<div class="col-sm-6 col-md-6 col-xs-6">--}}

            {{--<div class="thumbnail" style="border:none; background:white;">--}}

                {{--<div class="col-sm-6 col-md-6 col-xs-12 image-container">--}}
                    {{--<img src="/img/assets/pomp-system.png" style="height:200px; margin-left:-15px;" />--}}
                {{--</div>--}}

                {{--<div class="col-sm-6 col-md-6 col-xs-12">--}}

                    {{--<h3>Hello World</h3>--}}
                    {{--<p style="font-size:10px; color:#03225C;">--}}
                        {{--Niemand zit te wachten op een auto met hagelschade--}}

                        {{--Hagelschade. De nachtmerrie van elke autobezitter. Een fikse hagelbui betekent schade, een fors -én bewezen- waardeverlies van uw auto van tenminste 20%(!) en een stijgende verzekeringspremie.--}}
                        {{--Met de huidige klimaatverandering neemt de kans op extreem weer gestaag toe. Hagelbuien met hagelstenen zo groot als golfballen of zware storm met kans op afbrekende en rondvliegende takken gaan steeds meer voorkomen.--}}
                        {{--Dat betekent meer kans op schade aan uw auto en meer kans op waardeverlies. Die kans wordt nog eens vergroot als u met de auto op vakantie gaat naar landen als Italië, Duitsland, Frankrijk, Zweden, Oostenrijk of Zwitserland.--}}
                    {{--</p>--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}

    <br>
    <br>
    <br>




@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick-theme.css"/>

    <style>

        .valign > [class*="col"] {
            display: inline-block;
            float: none;
            font-size: 14px;
            font-size: 1rem;
            vertical-align: middle;
        }

        /* Custom, iPhone Retina */
        @media only screen and (min-width : 320px) {
            .special-text {
                padding: 10% 10px !important;
            }
            .gif-img{
                margin-left: -15px;
            }
        }

        /* Extra Small Devices, Phones */
        @media only screen and (min-width : 480px) {
            .special-text {
                padding: 10% 10px !important;
            }
            .gif-img{
                margin-left: -15px;
            }
        }

        /* Small Devices, Tablets */
        @media only screen and (min-width : 768px) {
            .special-text {
                padding: 10% 10px !important;
            }
        }
        /* Medium Devices, Desktops */
        @media only screen and (min-width : 992px) {
            .special-text {
                padding: 10% 5% !important;
            }
        }
        /* Large Devices, Wide Screens */
        @media only screen and (min-width : 1200px) {
            .special-text {
                padding: 10% 5% !important;
            }
        }
        .container {
            position: relative;
            /*height: 14rem;*/
            /*border: 1px solid;*/
        }
        .content-container p {
            /*margin: 0;*/
            /*position: absolute;*/
            /*top: 50%;*/
            /*left: 50%;*/
            /*transform: translate(-50%, 50%);*/
            /*width: 80%;*/
        }

        .jumbotron {
            /*position: absolute;*/
            top: 50%;
            transform: translateY(50%);
            background-color: transparent;
            /*border: 1px dashed deeppink;*/
        }
       .design-panel {
           /*padding: ;*/
           width:100%;
           text-align:center;
           border-bottom: 1px solid #636b6f;
           line-height:0.1em;
           margin:10px 0 20px;
       }

       .design-panel span {
           background:#fff;
           padding:0 10px;
       }

       .btn-default{
           background: transparent;
           text-transform: uppercase;
       }

    </style>
@endpush

@push('js')
    <script type="text/javascript" src="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#fade').slick({
                dots: false,
                autoplay: true,
                autoplaySpeed: 1000,
                infinite: true,
                speed: 300,
                slidesToShow: 3,
                slidesToScroll: 3,
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: false
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            infinite: false
                        }
                    },
                    {
                        breakpoint: 770,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            dots: false
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            dots: true
                        }
                    }
                ]
            });

            $('.product-slide').slick({
                dots: false,
                autoplay: true,
                autoplaySpeed: 2000,
                infinite: true,
                speed: 600,
                slidesToShow: 4,
                slidesToScroll: 4,
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1,
                            infinite: false,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            infinite: false,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 770,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            dots: true
                        }
                    }
                ]
            });
        });
    </script>
@endpush