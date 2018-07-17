@extends('layouts.app')

@section('content')

    <div class="col-md-12" style="
         background-image: url('/img/car-climb-clouds.jpg');
         background-color: lightblue;
         background-size: cover;
         margin-top: -25px !important;
        height: 500px;
        padding: 0px;
        ">
        <div class="overlay">
            <div class="container">
                <div class="col-md-12">
                    <h1>Check hier welke suit geschikt is voor uw auto!</h1>
                    <div class="row ">

                        <div class="col-md-4">
                            <div class="form-group">
                                <b>Merk</b>
                                <select class="form-control filter" id="brands">
                                    <option>Please Select</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <b>Type</b>
                                <select class="form-control filter" id="types">
                                    <option>Please Select</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <b>Jaar</b>
                                <select class="form-control filter" id="years">
                                    <option>Please Select</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                {{--<img src="\img\lamborghini_PNG10681.png" class="banner-img center-block img-responsive">--}}
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-12" style=" overflow: hidden !important;">
        <div class="row">
            <div class="col-md-6 text-center" style="padding: 0px 50px;">
                <h2 class="text-center">Does your lorem ipsum text long for something a little meatier?</h2>
                <p class="text-center">
                    Bacon ipsum dolor amet meatloaf capicola buffalo turducken cupim pork belly sirloin strip steak bacon picanha kevin bresaola swine kielbasa. Pork belly spare ribs biltong, flank turducken filet mignon hamburger shoulder tenderloin pork loin picanha. Jerky beef ribs brisket biltong, frankfurter alcatra fatback pig meatball sausage turkey doner tongue corned beef pork loin. Tail t-bone bacon spare ribs, flank porchetta venison. Jerky beef jowl tri-tip. Brisket spare ribs pork chop filet mignon strip steak doner. Ham corned beef ground round chicken pork chop.
                </p>
                <br>
                <a class="btn btn-lg btn-primary btn-rounded ">Lees meer</a>
            </div>

            <div class="col-md-6" style="padding: 0px; height: 100% !important;">
                <img src="/img/img-2.jpeg" class="img-responsive" style="">
            </div>
        </div>
    </div>


    <div class="col-md-12 row-eq-height" style="margin-bottom: 80px; overflow: hidden !important;">
        <div class="row">
            <div class="col-md-8 " style="padding: 0px;">
                <img src="/img/auto-dark.jpg" class="img-responsive" style="">
            </div>
            <div class="col-md-4" style="padding: 0px;">
                <div class="row">
                    <div class="col-md-12">
                        <img src="/img/img-1.jpeg" class="img-responsive">
                    </div>
                    <div class="col-md-12">
                        <img src="/img/img-3.jpeg" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="item  col-xs-4 col-lg-4">
            <div class="thumbnail">
                <img class="group list-group-image" src="http://placehold.it/400x250/000/fff" alt="" />
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">
                        Product title</h4>
                    <p class="group inner list-group-item-text">
                        Product description... Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                        sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <p class="lead">
                                $21.000</p>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <a class="btn btn-success" href="http://www.jquery2dotnet.com">Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item  col-xs-4 col-lg-4">
            <div class="thumbnail">
                <img class="group list-group-image" src="http://placehold.it/400x250/000/fff" alt="" />
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">
                        Product title</h4>
                    <p class="group inner list-group-item-text">
                        Product description... Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                        sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <p class="lead">
                                $21.000</p>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <a class="btn btn-success" href="http://www.jquery2dotnet.com">Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('css')
    <style>
        @media only screen and (max-width : 767px) {
            .box {
                height: auto !important;
            }
        }
        .btn-rounded{
            border-radius: 25px;
        }
        .vcenter {
            display: inline-block;
            vertical-align: middle;
            float: none;
        }
        .overlay h1, .overlay p, .overlay b{
            color: #FFFFFF;
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
        .vertical-center {
            min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
            min-height: 100vh; /* These two lines are counted as one :-)       */

            display: flex;
            align-items: center;
        }

        .img-responsive{
            object-fit: contain !important;
            width: 100% !important;
            max-height: 100% !important;
        }
    </style>
@endpush

@push('js')
    <script>

        filter();

        $(document).on("change", '.filter', function(e) {

            var $SelectedBrand = $("#brands").val();
            var $SelectedType = $("#types").val();
            var $SelectedYears = $("#years").val();

            filter($SelectedBrand, $SelectedType, $SelectedYears);
        });

        function emptySelect($el) {
            $el.empty(); // remove old options
            $el.append($("<option></option>")
                .attr("value", '').text('Please Select'));
        }

        function initSelectOption($el, $array, $selected) {
            emptySelect($el);
            appendSelect($array, $el);
            setSelectedValue($el, $selected);

        }

        function setSelectedValue($el, $value) {
            if ($value){
                $el.val($value).attr('selected','selected');
            }
        }

        function appendSelect($array, $el) {
            $.each($array, function(value, key) {
                $el.append($("<option></option>")
                    .attr("value", value).text(key));
            });
        }

        function filter($SelectedBrand, $SelectedType, $SelectedYears) {

            var url = '';
            if ($SelectedBrand){
                url += '/'+$SelectedBrand;
            }
            if ($SelectedType){
                url += '/'+$SelectedType;
            }
            if ($SelectedYears){
                url += '/'+$SelectedYears;
            }

            $.ajax({
                type: "GET",
                url: '{!! env('APP_URL') !!}/api/filter'+url,
                dataType: 'json',
                success: function(json) {

                    if(!$SelectedYears){
                        var $brands = json.brands;
                        var $brand = $("#brands");

                        var $types = json.types;
                        var $type = $("#types");

                        var $years = json.years;
                        var $year = $("#years");

                        initSelectOption($brand, $brands, $SelectedBrand);

                        $($brand).change(function(){
                            emptySelect($type);
                            emptySelect($year);
                        });

                        initSelectOption($type, $types, $SelectedType);

                        $($type).change(function(){
                            emptySelect($year);
                        });

                        initSelectOption($year, $years, $SelectedYears);

                        if(json.url){
                            console.log(json.url);
    //                        window.location.replace(json.url);
                        }
                    }

                }
            });
        }

    </script>
@endpush