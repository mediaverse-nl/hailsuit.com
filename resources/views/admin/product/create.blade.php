@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.product.create') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => 'admin.product.store', 'method' => 'POST']) !!}

                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" class="form-control" step="any" min="00.1" name="price" value="1.00" id="" placeholder="price">
                    </div>

                    <div class="form-group">
                        <label for="">Discount</label>
                        <input type="number" class="form-control" step="any" min="00.0" name="discount" value="0.00" id="" placeholder="discount">
                    </div>

                    <div class="form-group">
                        <label for="">Stock</label>
                        <input type="number" class="form-control" name="stock" value="0" id="" placeholder="discount">
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
                        <input id="thumbnail2" class="form-control" type="text" disabled value="">
                        <input type="hidden" id="thumbnailCopy" class="form-control" name="images" value="">
                    </div>
                    <div id="holder2" style="margin-top:15px;max-height:100px;">
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
                                    <input type="text" class="form-control" name="translation[{{$language->id}}][name]" placeholder="name">
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea class="summernote" name="translation[{{$language->id}}][description]" rows="1"></textarea>
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
                                        null,
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

                    @if($brands->count() == 0)
                        <p>no records found</p>
                    @endIf
                    <div class="row">

                        @foreach($brands as $brand)
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="font-weight-bold">{{$brand->name}}</label>
                                    <select class="selectpicker form-control" multiple data-live-search="true" data-virtual-scroll="true" name="brands[]">
                                        @foreach($brand->types()->get() as $type)
                                            <optgroup label="{!! $type->value !!} - {!! $type->model_year!!}">
                                                @foreach($type->bodyType()->availableTypes()->get() as $body)
                                                    @if($body->type_id == $type->id)
                                                        <option value="{!! $body->id !!}">
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

                    <label class="font-weight-bold">Barcodes</label>

                    <div class="form-group barcodes">
                        <input type="text" class="form-control" id="" name="barcodes[]" value="" placeholder="EAN">
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <button class="rounded-circle btn-primary" type="button" id="clone">
                                <i class="fa fa-plus"></i>
                            </button>
                            <button class="rounded-circle btn-danger" type="button" id="remove">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <hr>

                    <div class="">
                        <button class="btn btn-success" type="submit">Save</button>
                        <a href="" class="btn btn-warning" style="color: #FFFFFF!important;">Cancel</a>
                    </div>
                    <br>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-3">

        </div>
    </div>

    @component('components.rich-textarea-editor')

    @endcomponent

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