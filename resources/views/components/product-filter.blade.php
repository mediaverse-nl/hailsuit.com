{{--<div class="row" style="">--}}
    <div class="container">
        <div class="row">

        <div class="container-fluid">
            <div class="row">

                <div class="col-md-6">
                    <div class="panel panel-default" style="border: none; background: #dddddd;">
                        <div class="panel-body">
                            <h1>Filter</h1>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b>Merk</b>
                                        <select class="form-control filter" id="brands">
                                            <option>Please Select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b>Type</b>
                                        <select class="form-control filter" id="types">
                                            <option>Please Select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b>Jaar</b>
                                        <select class="form-control filter" id="years">
                                            <option>Please Select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b>Body</b>
                                        <select class="form-control filter" id="bodies">
                                            <option>Please Select</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    </div>
{{--</div>--}}

@push('js')
    <script>
        filter();
        $('#types').prop('disabled', true);
        $('#years').prop('disabled', true);
        $('#bodies').prop('disabled', true);
        $(document).on("change", '.filter', function(e) {
            var $SelectedBrand = $("#brands").val();
            var $SelectedType = $("#types").val();
            var $SelectedYears = $("#years").val();
            var $SelectedBody = $("#bodies").val();
            filter($SelectedBrand, $SelectedType, $SelectedYears, $SelectedBody);
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
            // console.log($selected);
            // if ($el.selector != '#brands') {
            //     $el.prop('disabled', true);
            // }
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
        function filter($SelectedBrand, $SelectedType, $SelectedYears, $SelectedBody) {
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
            if ($SelectedBody){
                url += '/'+$SelectedBody;
            }
            $.ajax({
                type: "GET",
                url: '{!! env('APP_URL') !!}/api/filter'+url,
                dataType: 'json',
                success: function(json) {
                    console.log(json);
                    if(!$SelectedBody){

                        var $brands = json.brands;
                        var $brand = $("#brands");
                        var $types = json.types;
                        var $type = $("#types");
                        var $years = json.years;
                        var $year = $("#years");
                        var $bodies = json.bodies;
                        var $body = $("#bodies");

                        initSelectOption($brand, $brands, $SelectedBrand);
                        $($brand).change(function(){
                            emptySelect($type);
                            emptySelect($year);
                            emptySelect($body);
                            $type.prop('disabled', false);
                        });

                        initSelectOption($type, $types, $SelectedType);
                        $($type).change(function(){
                            emptySelect($year);
                            emptySelect($body);
                            $year.prop('disabled', false);
                        });

                        initSelectOption($year, $years, $SelectedYears);
                        $($year).change(function(){
                            emptySelect($body);
                            $body.prop('disabled', false);
                        });

                        initSelectOption($body, $bodies, $SelectedBody);
                    }
                    if(json.url){
                        window.location.replace(json.url);
                    }
                }
            });
        }
    </script>
@endpush