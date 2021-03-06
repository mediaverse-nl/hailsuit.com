@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.product.edit', $product) !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-9">
            <div class="card">
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
                            <a id="lfm2" data-input="thumbnail2" data-multiple="" data-preview="holder2" class="btn btn-primary text-white" style="border-radius: 0px !important;">
                              <i class="fa fa-picture-o"></i> Choose
                            </a>
                          </span>
                            <input id="thumbnail2" class="form-control"  type="text" disabled
                                    value="{!! implode(',',$product->images->pluck('path')->toArray()) !!}">
                            <input type="hidden" id="thumbnailCopy" class="form-control" name="images[]"
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
                                    <br>
                                    <div class="form-group">
                                        <label for="">Name</label>

                                        <input type="text" class="form-control" name="translation[{{$language->id}}][name]"
                                               value="{{$product->titleTranslated($language->id)}}" placeholder="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea class="summernote" name="translation[{{$language->id}}][description]" rows="1">{{$product->descriptionTranslated($language->id)}}</textarea>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <hr>

                        <h5 for="exampleFormControlInput1">
                            Details
                            <a class="pull-right btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Add new detail" href="{!! route('admin.detail.index') !!}">
                                <i class="fa fa-plus" style="color: #fff;"></i>
                            </a>
                        </h5>
                        @if($details->count() == 0)
                            <p>no records found</p>
                        @endIf
                        <div class="row">
                            @foreach($details as $detail)
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="font-weight-bold">{{$detail->getTranslation()}}</label>
                                        {!! Form::select('property[]',
                                            collect($detail->translatedProperties())->pluck('value', 'id'),
                                            $product->getSelectedDetail($detail->id),
                                            ['class' => 'form-control', 'placeholder' => 'Pick a '.$detail->getTranslation().'...']) !!}
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <hr>

                        <h5 for="exampleFormControlInput1">
                            Brands
                            <a class="pull-right btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Add new brand" href="{!! route('admin.brand.index') !!}">
                                <i class="fa fa-plus" style="color: #fff;"></i>
                            </a>
                        </h5>
                        {{--{!! $brands !!}--}}
                        @if($brands->count() == 0)
                            <p>no records found</p>
                        @endIf
                        <div class="row">

                            {{--@foreach($brands as $brand)--}}
                                {{--<div class="col-3">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label class="font-weight-bold">{{$brand->name}}</label>--}}
                                        {{--<select class="selectpicker form-control" multiple name="brands[]">--}}
                                            {{--@foreach($brand->types()->currentTypes($product->id)->availableTypes(true)->get() as $type)--}}
                                                {{--@if($type->brand_id == $brand->id)--}}
                                                    {{--{!! dd($type) !!}--}}

                                                    {{--<option value="{!! $type->id !!}"--}}
                                                            {{--{!! in_array($type->id, $product->types->pluck('id')->toArray()) ? 'selected':'' !!}>--}}
{{--                                                        {!! $type->value !!} - {!! $type->model_year!!}--}}
                                                    {{--</option>--}}
                                                {{--@endif--}}
                                            {{--@endforeach--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                            {{--@endforeach--}}

                            @foreach($brands as $brand)
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="font-weight-bold">{{$brand->name}}</label>
                                        <select class="selectpicker form-control" multiple data-live-search="true" data-virtual-scroll="true" name="brands[]">
                                            @foreach($brand->types()->get() as $type)
                                                <optgroup label="{!! $type->value !!} - {!! $type->model_year!!}">
                                                    @foreach($type->bodyType()->currentTypes($product->id)->availableTypes(true)->get() as $body)
                                                        @if($body->type_id == $type->id)
                                                            <option value="{!! $body->id !!}" {!! in_array($body->id, $product->bodyTypes->pluck('id')->toArray()) ? 'selected':'' !!}>
                                                                {!! $body->body->getTranslation() !!}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <hr>

                        <h5>Barcodes</h5>

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
                                <button class="rounded-circle btn-primary" type="button" id="clone" data-toggle="tooltip" data-placement="top" title="Add new input">
                                    <i class="fa fa-plus"></i>
                                </button>
                                <button class="rounded-circle btn-danger" type="button" id="remove" data-toggle="tooltip" data-placement="top" title="Remove empty input">
                                    <i class="fa fa-minus"></i>
                                </button>
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
                                <i class="fa fa-print" data-toggle="tooltip" data-placement="top" title="if u want te print this barcode u have to enable ( background graphics at printer settings in browser )"></i>
                            </button>
                            <hr>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @component('components.rich-textarea-editor')

    @endcomponent

@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
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
        .dropdown-toggle.bs-placeholder {
            color: black !important;
        }
        .btn.dropdown-toggle.btn-light
        {
            border: 1px solid #ced4da !important;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
    <script>

        $('.selectpicker').selectpicker({
            // virtualScroll: 300
        });

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