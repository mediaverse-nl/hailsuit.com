
<h1>Filter</h1>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <b>Merk</b>
            <select class="form-control filter" id="brands">
                <option>--- select ---</option>
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <b>Type</b>
            <select class="form-control filter" id="types">
                <option>--- select ---</option>
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <b>Jaar</b>
            <select class="form-control filter" id="years">
                <option>--- select ---</option>
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <b>Body</b>
            <select class="form-control filter" id="bodies">
                <option>--- select ---</option>
            </select>
        </div>
    </div>
</div>

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
            $el.html($("<option></option>")
                .attr("value", '').text('--- select ---'));
        }

        function unblockInput($el) {
            $el.prop('disabled', false);
        }

        function blockInput($el) {
            $el.prop('disabled', true);
        }

        function initSelectOption($el, $array, $selected) {
            emptySelect($el);
            appendSelect($array, $el);
            setSelectedValue($el, $selected);
        }

        function setSelectedValue($el, $value) {
            if ($value){
                $el.val($value).attr('selected','selected');
            }else {
                if ($el.selector == '#brands'){
                    unblockInput($el);
                    if ($("#brands").val() == ''){
                        blockInput($("#types"));
                    }
                }
            }
        }

        function appendSelect($array, $el) {
            $.each($array, function(value, key) {
                console.log(key);
                $el.append($("<option></option>")
                    .attr("value", key['id']).text(key['value']));
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
            console.log(url);
            $.ajax({
                type: "GET",
                url: '{!! env('APP_URL') !!}/api/filter'+url,
                dataType: 'json',
                success: function(json) {
                    if(!$SelectedBody){

                        var $brands = json.brands;
                        var $brand = $("#brands");
                        var $types = json.types;
                        var $type = $("#types");
                        var $years = json.years;
                        console.log(json);
                        var $year = $("#years");
                        var $bodies = json.bodies;
                        var $body = $("#bodies");

                        initSelectOption($brand, $brands, $SelectedBrand);
                        $($brand).change(function(){
                            emptySelect($type);
                            emptySelect($year);
                            emptySelect($body);
                            unblockInput($type);
                            blockInput($year);
                            blockInput($body);
                        });

                        initSelectOption($type, $types, $SelectedType);
                        $($type).change(function(){
                            emptySelect($year);
                            emptySelect($body);
                            unblockInput($year);
                            blockInput($body);
                        });

                        initSelectOption($year, $years, $SelectedYears);
                        $($year).change(function(){
                            emptySelect($body);
                            unblockInput($body);
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