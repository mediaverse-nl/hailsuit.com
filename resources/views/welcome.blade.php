@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12" style="overflow: hidden">
                <img src="https://via.placeholder.com/1200x500?text=Visit+Blogging.com+Now" alt="" style="width: 100%;">
            </div>
        </div>
    </div>

    <div class="container" style="margin-bottom: 80px;">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center text-uppercase lead" style="margin: 80px 0px;">worlds leading hail protection for your vehicle</h1>
            </div>

            <div class="">
                <div class="col-md-4 col-sm-4">
                    <img src="https://via.placeholder.com/200x120" alt="" style="width: 100%;">
                    <hr>
                </div>
                <div class="col-md-4 col-sm-4">
                    <img src="https://via.placeholder.com/200x120" alt="" style="width: 100%;">
                    <hr>
                </div>
                <div class="col-md-4 col-sm-4">
                    <img src="https://via.placeholder.com/200x120" alt="" style="width: 100%;">
                    <hr>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-bottom: 10px;">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-sm-4 col-xs-6">
                <a href="{!! route('product.show', [1, SpaceToHyphen('asdad asda')]) !!}">
                    <img src="https://via.placeholder.com/200x120" alt="" style="width: 100%;">
                    <h4 class="text-center">Auto model</h4>
                </a>
            </div>
            <div class="col-md-3 col-sm-4 col-sm-4 col-xs-6">
                <img src="https://via.placeholder.com/200x120" alt="" style="width: 100%;">
                <h4 class="text-center">Auto model</h4>
            </div>
            <div class="col-md-3 col-sm-4 col-sm-4 col-xs-6">
                <img src="https://via.placeholder.com/200x120" alt="" style="width: 100%;">
                <h4 class="text-center">Auto model</h4>
            </div>
            <div class="col-md-3 col-sm-4 col-sm-4 col-xs-6">
                <img src="https://via.placeholder.com/200x120" alt="" style="width: 100%;">
                <h4 class="text-center">Auto model</h4>
            </div>
        </div>
    </div>

    <div class="container" style="margin-bottom: 80px;">
        <div style="padding: 0px 15px;">
            <div class="col-md-12">
                <p class="lead text-uppercase text-center" style="background: #555; color: white; width: 100%; margin: 80px 0px;">Design</p>
            </div>
            <div class="col-md-6 col-sm-6" style="padding: 15px;">
                <img src="https://via.placeholder.com/200x120" alt="" style="width: 100%;">
                <hr style="margin: 35px 0px;">
                Bacon ipsum dolor amet meatloaf capicola buffalo turducken cupim pork belly sirloin strip steak bacon picanha kevin bresaola swine kielbasa. Pork belly spare ribs biltong, flank turducken filet mignon hamburger shoulder tenderloin pork loin picanha. Jerky beef ribs brisket biltong, frankfurter alcatra fatback pig meatball sausage turkey doner tongue corned beef pork loin. Tail t-bone bacon spare ribs, flank porchetta venison. Jerky beef jowl tri-tip. Brisket spare ribs pork chop filet mignon strip steak doner. Ham corned beef ground round chicken pork chop.
            </div>
            <div class="col-md-6 col-sm-6" style="padding: 15px;">
                Bacon ipsum dolor amet meatloaf capicola buffalo turducken cupim pork belly sirloin strip steak bacon picanha kevin bresaola swine kielbasa. Pork belly spare ribs biltong, flank turducken filet mignon hamburger shoulder tenderloin pork loin picanha. Jerky beef ribs brisket biltong, frankfurter alcatra fatback pig meatball sausage turkey doner tongue corned beef pork loin. Tail t-bone bacon spare ribs, flank porchetta venison. Jerky beef jowl tri-tip. Brisket spare ribs pork chop filet mignon strip steak doner. Ham corned beef ground round chicken pork chop.
                <hr style="margin: 35px 0px;">
                <img src="https://via.placeholder.com/200x120" alt="" style="width: 100%;">
            </div>
        </div>
    </div>

@endsection

@push('css')
    {{--<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>--}}
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.3.11/slick.css"/>


    <style>
        body{
            background: #ffffff !important;
        }
        /*.hero-area{*/
            /*background-image: url('/img/car-climb-clouds.jpg');*/
            /*background-color: lightblue;*/
            /*background-size: cover;*/
            /*margin-top: -25px !important;*/
            /*height: 500px;*/
            /*padding: 0px;*/
        /*}*/
        /*@media only screen and (max-width : 767px) {*/
            /*.box {*/
                /*height: auto !important;*/
            /*}*/
        /*}*/
        /*.vcenter {*/
            /*display: inline-block;*/
            /*vertical-align: middle;*/
            /*float: none;*/
        /*}*/
        /*.overlay h1, .overlay p, .overlay b .overlay h2{*/
            /*color: #FFFFFF !important;*/
        /*}*/
        /*.overlay {*/
            /*background-color: rgba(0, 0, 0, 0.7);*/
            /*top: 0;*/
            /*left: 0;*/
            /*width: 100%;*/
            /*height: 100%;*/
            /*position: relative;*/
            /*z-index: 1;*/
        /*}*/

        /*.img-responsive {*/
            /*margin: 0 auto;*/
        /*}*/
        /*.banner-img{*/
            /*margin: 50px;*/
        /*}*/
        /*.vertical-center {*/
            /*min-height: 100%;  !* Fallback for browsers do NOT support vh unit *!*/
            /*min-height: 100vh; !* These two lines are counted as one :-)       *!*/

            /*display: flex;*/
            /*align-items: center;*/
        /*}*/

        /*.img-responsive{*/
            /*object-fit: contain !important;*/
            /*width: 100% !important;*/
            /*max-height: 100% !important;*/
        /*}*/
    </style>
@endpush

@push('js')
{{--<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>--}}
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.3.11/slick.min.js"></script>


<script type="text/javascript">
    $(document).ready(function(){
        $('.fade').slick({
            dots: true,
            infinite: true,
//            speed: 700,
//            autoplay:true,
//            autoplaySpeed: 2000,
//            arrows:true,
            slidesToShow: 3,
            slidesToScroll: 3
        });
    });

        {{--filter();--}}

        {{--$(document).on("change", '.filter', function(e) {--}}

            {{--var $SelectedBrand = $("#brands").val();--}}
            {{--var $SelectedType = $("#types").val();--}}
            {{--var $SelectedYears = $("#years").val();--}}

            {{--filter($SelectedBrand, $SelectedType, $SelectedYears);--}}
        {{--});--}}

        {{--function emptySelect($el) {--}}
            {{--$el.empty(); // remove old options--}}
            {{--$el.append($("<option></option>")--}}
                {{--.attr("value", '').text('Please Select'));--}}
        {{--}--}}

        {{--function initSelectOption($el, $array, $selected) {--}}
            {{--emptySelect($el);--}}
            {{--appendSelect($array, $el);--}}
            {{--setSelectedValue($el, $selected);--}}

        {{--}--}}

        {{--function setSelectedValue($el, $value) {--}}
            {{--if ($value){--}}
                {{--$el.val($value).attr('selected','selected');--}}
            {{--}--}}
        {{--}--}}

        {{--function appendSelect($array, $el) {--}}
            {{--$.each($array, function(value, key) {--}}
                {{--$el.append($("<option></option>")--}}
                    {{--.attr("value", value).text(key));--}}
            {{--});--}}
        {{--}--}}

        {{--function filter($SelectedBrand, $SelectedType, $SelectedYears) {--}}

            {{--var url = '';--}}
            {{--if ($SelectedBrand){--}}
                {{--url += '/'+$SelectedBrand;--}}
            {{--}--}}
            {{--if ($SelectedType){--}}
                {{--url += '/'+$SelectedType;--}}
            {{--}--}}
            {{--if ($SelectedYears){--}}
                {{--url += '/'+$SelectedYears;--}}
            {{--}--}}

            {{--$.ajax({--}}
                {{--type: "GET",--}}
                {{--url: '{!! env('APP_URL') !!}/api/filter'+url,--}}
                {{--dataType: 'json',--}}
                {{--success: function(json) {--}}

                    {{--if(!$SelectedYears){--}}
                        {{--var $brands = json.brands;--}}
                        {{--var $brand = $("#brands");--}}

                        {{--var $types = json.types;--}}
                        {{--var $type = $("#types");--}}

                        {{--var $years = json.years;--}}
                        {{--var $year = $("#years");--}}

                        {{--initSelectOption($brand, $brands, $SelectedBrand);--}}

                        {{--$($brand).change(function(){--}}
                            {{--emptySelect($type);--}}
                            {{--emptySelect($year);--}}
                        {{--});--}}

                        {{--initSelectOption($type, $types, $SelectedType);--}}

                        {{--$($type).change(function(){--}}
                            {{--emptySelect($year);--}}
                        {{--});--}}

                        {{--initSelectOption($year, $years, $SelectedYears);--}}
                    {{--}--}}

                    {{--if(json.url){--}}
                        {{--window.location.replace(json.url);--}}
                    {{--}--}}
                {{--}--}}
            {{--});--}}
        {{--}--}}

    </script>
@endpush