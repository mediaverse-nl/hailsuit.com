@extends('layouts.app')

@section('content')

    <div class="row" style="margin: 0px;">
        <div class="col-md-12" style="overflow: hidden;  padding: 0px;">
            <img src="/img/assets/Header-WEB (1).png" alt=""
                 style="
                     width: 100%;
                     margin-left:auto;
                    margin-right:auto;
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
                <br>
                <h1 class="text-center text-uppercase lead" style="margin: -10% 0px 50px 0px; font-size: 30px;">worlds leading hail protection for your vehicle</h1>
                <br>
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


    <div class="container" style="margin-bottom: 10px;">
        <div class="row">
            <h2 class="text-center">Bekijk alle producten in de shop</h2>
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
    </div>

    <div class="container" style="margin-bottom: 80px;">
        <div class="row">
            <div class="col-md-12">
                <div style="padding: 80px 0px;">
                    <p class="lead text-uppercase text-center design-panel" ><span>Design</span></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="" style="padding: 15px;">
                    <p class="text-center">
                        Bacon ipsum dolor amet meatloaf capicola buffalo turducken cupim pork belly sirloin strip steak bacon picanha kevin bresaola swine kielbasa. Pork belly spare ribs biltong, flank turducken filet mignon hamburger shoulder tenderloin pork loin picanha. Jerky beef ribs brisket biltong, frankfurter alcatra fatback pig meatball sausage turkey doner tongue corned beef pork loin. Tail t-bone bacon spare ribs, flank porchetta venison. Jerky beef jowl tri-tip. Brisket spare ribs pork chop filet mignon strip steak doner. Ham corned beef ground round chicken pork chop.
                    </p>
                    <br>
                    <img src="/img/assets/hailsuit-gif.gif" alt="" class="center-block" style="width:100%;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="" style="padding: 15px;">
                    <img src="/img/assets/hailsuit-gif.gif" alt="" class="center-block" style="width:100%;">

                    <p class="text-center">
                        Bacon ipsum dolor amet meatloaf capicola buffalo turducken cupim pork belly sirloin strip steak bacon picanha kevin bresaola swine kielbasa. Pork belly spare ribs biltong, flank turducken filet mignon hamburger shoulder tenderloin pork loin picanha. Jerky beef ribs brisket biltong, frankfurter alcatra fatback pig meatball sausage turkey doner tongue corned beef pork loin. Tail t-bone bacon spare ribs, flank porchetta venison. Jerky beef jowl tri-tip. Brisket spare ribs pork chop filet mignon strip steak doner. Ham corned beef ground round chicken pork chop.
                    </p>
                    <br>

                </div>
            </div>
        </div>
    </div>

@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick-theme.css"/>

    <style>
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
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
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
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 4,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    </script>
@endpush