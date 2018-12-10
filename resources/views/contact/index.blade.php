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
            <div class="col-md-6" style="padding: 15px 0px;">
                <h1>get in touch</h1>
                <br/>
                <p>please fill out the form and we will respond lightning quick</p>
                <br/>


                {!! Form::open(['route' => 'contact.store', 'method' => 'POST']) !!}

                <div class="form-group {!! !$errors->has('name') ? : 'has-error'!!}">
                    {!! Form::label('name', 'Your Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Name']) !!}
                    @include('components.error', ['field' => 'name'])
                </div>

                <div class="form-group {!! !$errors->has('email') ? : 'has-error'!!}">
                    {!! Form::label('email', 'E-mail Address') !!}
                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter e-mail']) !!}
                    @include('components.error', ['field' => 'email'])
                </div>

                {{--Translator('cart_btn_complete_order', 'text', false, 'complete order')--}}
                <div class="form-group {!! !$errors->has('message') ? : 'has-error'!!}">
                    {!! Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => 'Enter Message']) !!}
                    @include('components.error', ['field' => 'message'])
                </div>

                {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

                {!! Form::close() !!}

            </div>

        <div class="col-md-3"></div>


        <div class="col-md-3">
        <br/>
            <h3>Connect with us</h3>
            <p>For support any questions:
            Email us at  <a>faris.ben.aaziz@gmail.com</a>
            </p>
            <a href="https://www.facebook.com"><i class="fab fa-facebook" style="font-size: 30px"></i></a>
            <a href="https://www.twitter.com"><i class="fab fa-twitter-square" style="font-size: 30px"></i></a>
            <a href="https://www.linkedin.com"><i class="fab fa-linkedin" style="font-size:30px"></i></a>
            <a href="https://www.instagram.com"><i class="fab fa-instagram" style="font-size: 30px "></i></a>
        </div>


        <div class="row">
            <div class="col-md-6">

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