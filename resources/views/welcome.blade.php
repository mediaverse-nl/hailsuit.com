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



            {{--todo make component of this ss--}}
            <style>
                .box {
                    /*height: 170px;*/
                    /*padding-bottom: 15px;*/
                    /*width: 50%;*/
                    z-index:1000;
                    position: relative;
                }
                .content a{
                    /*width: 80%;*/
                }

                .content {
                    position: relative;
                    background-color: gray;
                    height: 170px;
                    -webkit-transition-property: height; /* Safari */
                    -webkit-transition-duration: .4s; /* Safari */
                    transition-property: height;
                    transition-duration: .4s;
                     overflow: hidden;
                }

                .content:hover {
                    height: 230px;
                }
            </style>

            {{--<div class="content">--}}
                {{--<p>--}}
                    {{--TEST--}}
                {{--</p>--}}
            {{--</div>--}}

            <div class="col-md-3 col-sm-4 col-sm-4 col-xs-6 ">
                <div class="box">
                    <div class="content">
                        <img src="/img/assets/Model-XS-800x480.png" alt="" style="width: 100%;">
                        <h4 class="text-center">Auto model</h4>
                        <a href="{!! route('product.show', [1, SpaceToHyphen('asdad asda')]) !!}" class="btn btn-default text-center">
                            sad
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-sm-4 col-xs-6 ">
                <div class="box">
                    <div class="content">
                        <img src="/img/assets/Model-XS-800x480.png" alt="" style="width: 100%;">
                        <h4 class="text-center">Auto model</h4>
                        <a href="{!! route('product.show', [1, SpaceToHyphen('asdad asda')]) !!}" class="btn btn-default">
                            sad
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-sm-4 col-xs-6 ">
                <div class="box">
                    <div class="content">
                        <img src="/img/assets/Model-XS-800x480.png" alt="" style="width: 100%;">
                        <h4 class="text-center">Auto model</h4>
                        <a href="{!! route('product.show', [1, SpaceToHyphen('asdad asda')]) !!}" class="btn btn-default">
                            sad
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-sm-4 col-xs-6 ">
                <div class="box">
                    <div class="content">
                        <img src="/img/assets/Model-XS-800x480.png" alt="" style="width: 100%;">
                        <h4 class="text-center">Auto model</h4>
                        <a href="{!! route('product.show', [1, SpaceToHyphen('asdad asda')]) !!}" class="btn btn-default">
                            sad
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-sm-4 col-xs-6 ">
                <div class="box">
                    <div class="content">
                        <img src="/img/assets/Model-XS-800x480.png" alt="" style="width: 100%;">
                        <h4 class="text-center">Auto model</h4>
                        <a href="{!! route('product.show', [1, SpaceToHyphen('asdad asda')]) !!}" class="btn btn-default">
                            lees meer
                        </a>
                    </div>
                </div>
            </div>
            {{----}}
            {{--<div class="col-md-3 col-sm-4 col-sm-4 col-xs-6 content">--}}
                {{--<img src="/img/assets/Model-L-800x480.png" alt="" style="width: 100%;">--}}
                {{--<h4 class="text-center">Auto model</h4>--}}
            {{--</div>--}}
            {{--<div class="col-md-3 col-sm-4 col-sm-4 col-xs-6 content">--}}
                {{--<img src="/img/assets/Model-M-800x480.png" alt="" style="width: 100%;">--}}
                {{--<h4 class="text-center">Auto model</h4>--}}
            {{--</div>--}}
            {{--<div class="col-md-3 col-sm-4 col-sm-4 col-xs-6 content">--}}
                {{--<img src="/img/assets/Model-XXL-800x480.png" alt="" style="width: 100%;">--}}
                {{--<h4 class="text-center">Auto model</h4>--}}
            {{--</div>--}}
        </div>
    </div>

    <div class="container" style="margin-bottom: 80px;">
        <div class="row">
            <div class="col-md-12">
                <div style="padding: 80px 0px;">
                    <p class="lead text-uppercase text-center design-panel" ><span>Design</span></p>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-1" style="padding: 15px;">
                <p class="text-center">
                    Bacon ipsum dolor amet meatloaf capicola buffalo turducken cupim pork belly sirloin strip steak bacon picanha kevin bresaola swine kielbasa. Pork belly spare ribs biltong, flank turducken filet mignon hamburger shoulder tenderloin pork loin picanha. Jerky beef ribs brisket biltong, frankfurter alcatra fatback pig meatball sausage turkey doner tongue corned beef pork loin. Tail t-bone bacon spare ribs, flank porchetta venison. Jerky beef jowl tri-tip. Brisket spare ribs pork chop filet mignon strip steak doner. Ham corned beef ground round chicken pork chop.
                </p>
                <br>
                <a class="btn btn-default center-block" style="width: 130px;">Lees meer</a>
                <br>
                <img src="https://via.placeholder.com/200x120" alt="" class="center-block" style="width: 80%;">
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
                slidesToShow: 4,
                slidesToScroll: 4,
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
        });
    </script>
@endpush