@extends('layouts.app')

@section('content')

    <section class="hero-area bg-1 text-center overly">
        <!-- Container Start -->
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Header Contetnt -->
                        <br>
                        <br>
                        <div class="content-block">
                            <h1>Contact us</h1>
                            <p>Join the millions who buy and sell from each other <br> everyday in local communities around the world</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                test
            </div>

            <div class="col-md-6" style="padding: 15px 0px;">
                {{--<div class="panel">--}}
                    {{--<div class="panel-body">--}}
                        {!! form($form) !!}
                    {{--</div>--}}
                {{--</div>--}}
            </div>

        </div>
    </div>

    <div class="col-md-12">
        <div class="row">
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=eindhoven&t=&z=9&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                </div>

            </div>
        </div>
    </div>

@endsection

@push('css')
<style>
    .mapouter{text-align:right;height:400px;width:100%;}
    .gmap_canvas {overflow:hidden;background:none!important;height:500px;width:100%;}
    .hero-area{
        background-image: url('/img/car-climb-clouds.jpg');
        background-color: lightblue;
        background-size: cover;
        margin-top: -25px !important;
        height: 250px;
        padding: 0px;
    }
    .overlay h1, .overlay p, .overlay b .overlay h2{
        color: #FFFFFF !important;
    }
    .overlay {
        background-color: rgba(0, 0, 0, 0.7);
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        position: relative;
        z-index: 1;
    }

    .img-responsive {
        margin: 0 auto;
    }
    .banner-img{
        margin: 50px;
    }
</style>
@endpush