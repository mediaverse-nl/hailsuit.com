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
                            <h1>{!! Translator('contact_us_title', 'text', false, 'Contact us') !!}</h1>
                            <p>{!! Translator('contact_us_paragraph', 'text', false, 'Join the millions who buy and sell from each other <br> everyday in local communities around the world') !!}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>

    <br>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {{--todo translates--}}
                        <h1>{!! Translator('contact_us_title2', 'text', false, 'get in touch') !!}</h1>
                        <p>{!! Translator('contact_us_paragraph2', 'text', false, 'please fill out the form and we will respond lightning quick') !!}</p>

                        {!! Form::open(['route' => 'contact.store', 'method' => 'POST']) !!}

                        <div class="form-group {!! !$errors->has('name') ? : 'has-error'!!}">
                            {!! Form::label('name',  Translator('contact_us_form_name', 'text', false, 'Your Name')) !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Name']) !!}
                            @include('components.error', ['field' => 'name'])
                        </div>

                        <div class="form-group {!! !$errors->has('email') ? : 'has-error'!!}">
                            {!! Form::label('email', Translator('contact_us_form_email', 'text', false, 'E-mail Adress')) !!}
                            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter e-mail']) !!}
                            @include('components.error', ['field' => 'email'])
                        </div>

                        <div class="form-group {!! !$errors->has('message') ? : 'has-error'!!}">
                            {!! Form::label('email', Translator('contact_us_form_message', 'text', false, 'Your Message')) !!}
                            {!! Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => 'Enter Message', 'rows' => 5]) !!}
                            @include('components.error', ['field' => 'message'])
                        </div>

                        {!! Form::submit(Translator('contact_us_button_submit', 'text', false, 'submit'), ['class' => 'btn btn-default'])!!}

                        {!! Form::close() !!}
                    </div>
                </div>

            </div>

            <div class="col-md-6">

                <div class="mapouter" style="height: 275px  !important;">
                    <div class="gmap_canvas">
                        <iframe width="100%" height="250px" id="gmap_canvas" src="https://maps.google.com/maps?q=eindhoven&t=&z=9&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-body">

                        {!! Translator('contact_company_information', 'richtext', false, '
                            Customer service:
                            Phone: +1 129 209 291
                            E-mail: support@mysite.com

                            Headquarter:
                            Company Inc,
                            Las vegas street 201
                            55001 Nevada, USA
                            Phone: +1 145 000 101
                            usa@mysite.com ') !!}

                    </div>
                </div>

                {{--this part is for the design--}}

                {{--the header of the --}}
                {{--<h3> {!! Translator('contact_us_connect_with_us_title', 'text', false, 'Connect with us') !!}</h3>--}}

                {{-- this be the email adress of the of ythe company --}}
                {{--<p>--}}
                {{--{!! Translator('contact_us_connect_with_us_message', 'text', false, 'For support or any other questions Email us at:') !!}--}}
                    {{--<a>--}}
                       {{--opens the mail app when clicked TODO open mail app --}}{{-- <a> hailsuits@gmail.com</a>--}}
                    {{--</a>--}}
                {{--</p>--}}

                {{--<a href="https://www.facebook.com"><i class="fab fa-facebook" style="font-size: 30px"></i></a>--}}
                {{--<a href="https://www.twitter.com"><i class="fab fa-twitter-square" style="font-size: 30px"></i></a>--}}
                {{--<a href="https://www.linkedin.com"><i class="fab fa-linkedin" style="font-size:30px"></i></a>--}}
                {{--<a href="https://www.instagram.com"><i class="fab fa-instagram" style="font-size: 30px "></i></a>--}}
            </div>


            <div class="row">
                <div class="col-md-6">
                    {{--this is for the design--}}
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>


    {{--<div class="col-md-12">--}}
        {{--<div class="row">--}}
            {{--<div class="mapouter">--}}
                {{--<div class="gmap_canvas">--}}
                    {{--<iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=eindhoven&t=&z=9&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

@endsection

@push('css')
<style>
    .form-control{
        border-radius: 0px !important;

    }
    .panel-default{
        border-radius: 0px !important;
        border: none !important;
    }
    .panel{
        background-color: #fafafa;
    }
    .btn-default {
        background: #FFFFFF;
        text-shadow: none !important;
        box-shadow: none !important;
        border-radius: 0px !important;
    }
    .mapouter{text-align:right;height:400px;width:100%;}
    .gmap_canvas {overflow:hidden;background:none!important;height:500px;width:100%;}
    .hero-area{
        /*background-image: url('/img/car-climb-clouds.jpg');*/
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