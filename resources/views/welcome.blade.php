@extends('layouts.app')

@section('content')

    <div class="col-md-12" style="background: #5b9eff; height: 500px; margin-top: -25px;">
        <div class="container">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4 vertical-center">
                        <div class="form-group">
                            <b>Merk</b>
                            {{--<input type="text" class="form-control" placeholder="Search">--}}
                            <select class="form-control filter" id="brands">
                                <option>select</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 vertical-center">
                        <div class="form-group">
                            <b>Type</b>
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                    </div>
                    <div class="col-md-4 vertical-center">
                        <div class="form-group">
                            <b>Jaar</b>
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <img src="\img\lamborghini_PNG10681.png" class="banner-img center-block">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-md-6">
            sadasd
        </div>
        <div class="col-md-6">
            asdasd
        </div>
    </div>

@endsection

@push('css')
    <style>
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
    </style>
@endpush

@push('js')
    <script>
//        $(document).on("change", '#department', function(e) {
//            var department = $(this).val();
        $(document).on("change", '.filter', function(e) {
            $.ajax({
                type: "get",
                url: '{!! env('APP_URL') !!}/api/filter',
                dataType: 'json',
                success: function(json) {

                    var $brands = json.brands;
                    var $brand = $("#brands");
                    var $SelectedBrand = $("#brands").val();

                    console.log($SelectedBrand);
//                    if($SelectedBrand == null){
                        $brand.empty(); // remove old options
                        $brand.append($("<option></option>")
                            .attr("value", '').text('Please Select'));
//                    }

                    $.each($brands, function(value, key) {
                        $brand.append($("<option></option>")
                            .attr("value", value).text(key));
                    });

                }
            });
        });
    </script>
@endpush