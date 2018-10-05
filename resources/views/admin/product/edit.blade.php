@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.product.edit', $product) !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-9">
            <div class="card">
                {{--<div class="card-header">--}}
                    {{--add to stock--}}
                {{--</div>--}}
                <div class="card-body">
                    {!! Form::model($product, ['route' => ['admin.product.update', $product->id], 'method' => 'PATCH']) !!}

                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" class="form-control" step="any" name="price" value="{!! $product->price !!}" id="" placeholder="price">
                        </div>

                        <div class="form-group">
                            <label for="">Discount</label>
                            <input type="number" class="form-control" step="any" name="discount" value="{!! $product->discount !!}" id="" placeholder="discount">
                        </div>

                        <div class="form-group">
                            <label for="">Stock</label>
                            <input type="number" class="form-control" name="stock" value="{!! $product->stock !!}" id="" placeholder="discount">
                        </div>

                        <hr>
                        {{--images--}}
                        <h5>Product images</h5>
                        <div class="input-group" >
                          <span class="input-group-btn" >
                            <a id="lfm2" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary text-white" style="border-radius: 0px !important;">
                              <i class="fa fa-picture-o"></i> Choose
                            </a>
                          </span>
                            <input id="thumbnail2" class="form-control" type="text" disabled
                                    value="{!! implode(',',$product->images->pluck('path')->toArray()) !!}">
                            <input type="hidden" id="thumbnailCopy" class="form-control" name="images"
                                    value="{!! implode(',',$product->images->pluck('path')->toArray()) !!}">
                        </div>
                        <div id="holder2" style="margin-top:15px;max-height:100px;">
                            @foreach($product->images as $image)
                                <img src="{!! $image->path !!}" style="height: 5rem;">
                            @endforeach
                        </div>
                        {{--end image--}}

                        <hr>

                        <h5 for="exampleFormControlInput1">Translations</h5>

                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            @foreach($languages as $language)
                                <a class="nav-item nav-link {{$loop->first ? 'active' : ''}}" data-toggle="tab" href="#nav-{{$language->country_code_large}}" role="tab">
                                    {{$language->country_code_flag}}
                                </a>
                            @endforeach
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            @foreach($languages as $language)

                                <div class="tab-pane fade {{$loop->first ? 'show active' : ''}}" id="nav-{{$language->country_code_large}}" role="tabpanel">
                                    <div class="form-group">
                                        <label for="">Name</label>

                                        {{--<input type="text" class="form-control" name="translation[{{$language->id}}][name]"--}}
{{--                                               value="{{$product->titleTranslated($language->id)}}" placeholder="name">--}}
                                    </div>
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea class="form-control" name="translation[{{$language->id}}][description]" rows="3">{{$product->descriptionTranslated($language->id)}}</textarea>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <hr>

                        <h5 for="exampleFormControlInput1">Details</h5>
                        <div class="row">
                            @foreach($details as $detail)
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="font-weight-bold">{{$detail->value}}</label>
                                        {!! Form::select('property[]',
                                            $detail->properties->sortBy('value')->pluck('value', 'id'),
                                            $product->getSelectedDetail($detail->id),
                                            ['class' => 'form-control', 'placeholder' => 'Pick a '.$detail->value.'...']) !!}
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <hr>

                        <h5 for="exampleFormControlInput1">Brands</h5>
                        {{--<div class="row">--}}
                            {{--@foreach($brands as $brand)--}}
                                {{--@if($brand->types->count() > 0)--}}
                                {{--<div class="col-3">--}}
                                    {{--<label class="font-weight-bold">{{$brand->name}}</label>--}}
                                    {{--@foreach($brand->types->sortBy(['value']) as $type)--}}
                                        {{--<div class="custom-control custom-checkbox">--}}
                                            {{--<input type="checkbox"--}}
                                                   {{--class="custom-control-input"--}}
                                                   {{--name="brands[]"--}}
                                                   {{--value="{{$type->id}}"--}}
                                                   {{--id="{{$type->value.$type->id}}"--}}
                                                   {{--{{in_array($type->id, $product->types->pluck('id')->toArray()) ? 'checked':''}}>--}}
                                            {{--<label class="custom-control-label" for="{{$type->value.$type->id}}">{{$type->value}} - {{$type->model_year}}</label>--}}
                                        {{--</div>--}}
                                    {{--@endforeach--}}
                                {{--</div>--}}
                                {{--@endif--}}
                            {{--@endforeach--}}
                        {{--</div>--}}
                    <div class="row">

                        @foreach($brands as $brand)
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="font-weight-bold">{{$brand->name}}</label>
                                    <select class="selectpicker form-control" multiple name="brands[]">
                                        @foreach($brand->types()->currentTypes($product->id)->availableTypes(true)->get() as $type)
                                            @if($type->brand_id == $brand->id)
                                                <option value="{!! $type->id !!}"
                                                        {!! in_array($type->id, $product->types->pluck('id')->toArray()) ? 'selected':'' !!}>
                                                    {!! $type->value !!} - {!! $type->model_year!!}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        @endforeach

                    </div>

                    <hr>

                        <label class="font-weight-bold">Barcodes</label>

                        @if($product->barcodes()->exists())
                            @foreach($product->barcodes as $barcode)
                                <div class="form-group barcodes">
                                    <input type="text" class="form-control" id="" name="barcodes[]" value="{{$barcode->value}}" placeholder="EAN">
                                </div>
                            @endforeach
                        @else
                            <div class="form-group barcodes">
                                <input type="text" class="form-control" id="" name="barcodes[]" value="" placeholder="EAN">
                            </div>
                        @endif


                        <div class="row">
                            <div class="col-md-2">
                                <button class="rounded-circle btn-info" type="button" id="clone">
                                    <i class="fa fa-plus"></i>
                                </button>
                                <button class="rounded-circle btn-danger" type="button" id="remove">
                                    <i class="fa fa-minus"></i>
                                </button>

                                {{--<input type="button"  value="add" >--}}
                                {{--<input type="button" class="rounded-circle " value="remove" id="remove" style="display: inline-block !important;">--}}
                            </div>
                        </div>

                        <hr>

                        <div class="">
                            <button class="btn btn-success" type="submit">Save</button>
                            <a href="" class="btn btn-default">Cancel</a>
                        </div>
                        <br>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    product labels
                </div>
                <div class="card-body">
                    @foreach($product->barcodes as $barcode)
                        @if(is_numeric($barcode->value))
                            <div id='{{$barcode->id}}DivToPrint'>
                                {!! DNS1D::getBarcodeHTML($barcode->value, "EAN13") !!}
                                {{$barcode->value}}
                            </div>
                            <button type="submit" value='Print' onclick='printDiv({{$barcode->id}});' class="rounded-circle edit">
                                <i class="fa fa-print"></i>
                            </button>
                            <hr>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <style>
        .rounded-circle {
            margin-right: 5px;
            display: inline-block;
            height: 30px;
            width: 30px;
            border-radius: 50%;
            text-align: center;
            vertical-align: middle;
            line-height: 30px;
            border: none;
        }
        .edit {
            background: var(--warning);
        }
    </style>
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script>

        $('.selectpicker').selectpicker();

        $('#thumbnail2').change(function() {
            $('#thumbnailCopy').val($(this).val());
        });

        function printDiv(id)
        {
            var divToPrint = document.getElementById(id+'DivToPrint');
            var newWin = window.open('','Print-Window');

            newWin.document.open();
            newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
            newWin.document.close();

            setTimeout(function(){newWin.close();},10);
        }
    </script>

    {{--<script src="/vendor/laravel-filemanager/js/script.js"></script>--}}
    <script>
        var route_prefix = "{!! url(config('lfm.url_prefix')) !!}";
    </script>
    <script>
        {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}
    </script>
    <script>

        $('#lfm2').filemanager('file', {prefix: route_prefix});

        {{--Barcode buttons--}}
        $("#clone").click(function() {
            var el = $(".barcodes:last");
            el.clone().insertAfter(".barcodes:last").find("input").val('');
        });

        $("#remove").click(function() {
            var elmts = $( ".barcodes" );
            var el = $( ".barcodes:last" );

            if(elmts.length !== 1){
                if(el.find("input").val().length === 0){
                    $(".barcodes:last").remove();
                }
            }
        });

        var allRadios = document.getElementsByClassName('radio-btn');
        var booRadio;
        var x;
        for(x = 0; x < allRadios.length; x++){
            allRadios[x].onclick = function() {
                if(booRadio == this){
                    this.checked = false;
                    booRadio = null;
                } else {
                    booRadio = this;
                }
            };
        }
    </script>
@endpush