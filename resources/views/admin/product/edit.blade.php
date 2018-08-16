@extends('layouts.admin')

@section('content')
    {!! Form::model($product, ['route' => ['admin.product.update', $product->id], 'method' => 'PATCH']) !!}

        <div class="form-group">
            <label for="">Price</label>
            <input type="number" class="form-control" name="price" value="{!! $product->price !!}" id="" placeholder="price">
        </div>

        <div class="form-group">
            <label for="">Discount</label>
            <input type="number" class="form-control" name="discont" value="{!! $product->discount !!}" id="" placeholder="discount">
        </div>

        <div class="form-group">
            <label for="">Stock</label>
            <input type="number" class="form-control" name="stock" value="{!! $product->stock !!}" id="" placeholder="discount">
        </div>

        <hr>
        {{--images--}}
        <h5>Product images</h5>
        <div class="input-group">
          <span class="input-group-btn">
            <a id="lfm2" data-input="thumbnail2" data-preview="holder2" class="btn btn-primary text-white">
              <i class="fa fa-picture-o"></i> Choose
            </a>
          </span>
            <input id="thumbnail2" class="form-control" type="text" name="images" disabled
                    value="{!! implode(',',$product->images->pluck('path')->toArray()) !!}">
            <input type="hidden" id="thumbnail2" class="form-control" type="text" name="images"
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
                        <input type="text" class="form-control" name="translation[{{$language->id}}][name]"
                               value="{{$product->titleTranslated($language->id)}}" placeholder="name">
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
        <div class="row">
            @foreach($brands as $brand)
                @if($brand->types->count() > 0)
                <div class="col-3">
                    <label class="font-weight-bold">{{$brand->name}}</label>
                    @foreach($brand->types->sortBy(['value']) as $type)
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox"
                                   class="custom-control-input"
                                   name="brands[]"
                                   value="{{$type->id}}"
                                   id="{{$type->value.$type->id}}"
                                   {{in_array($type->id, $product->types->pluck('id')->toArray()) ? 'checked':''}}>
                            <label class="custom-control-label" for="{{$type->value.$type->id}}">{{$type->value}} - {{$type->model_year}}</label>
                        </div>
                    @endforeach
                </div>
                @endif
            @endforeach
        </div>

        <hr>

        <label class="font-weight-bold">Barcodes</label>

        @foreach($product->barcodes as $barcode)
            <div class="form-group barcodes">
                <input type="text" class="form-control" id="" name="barcodes[]" value="{{$barcode->value}}" placeholder="EAN">
            </div>
        @endforeach

        <div class="row">
            <div class="col-md-2 ">
                <input type="button" class="form-control btn-info" value="add" id="clone">
            </div>
            <div class="col-md-2">
                <input type="button" class="form-control btn-danger" value="remove" id="remove">
            </div>
        </div>

        <hr>

        <div class="">
            <button class="btn btn-success" type="submit">Save</button>
            <a href="" class="btn btn-default">Cancel</a>
        </div>
        <br>
    {!! Form::close() !!}

@endsection

@push('css')
    <style>

    </style>
@endpush

@push('js')
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>

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