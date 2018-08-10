@extends('layouts.admin')

@section('content')
    <form method="post" action="{{route('admin.product.update', $product->id)}}" accept-charset="UTF-8">
        <input name="_token" type="hidden" value="{!! csrf_token() !!}">
        {!! method_field('patch') !!}

        <div class="form-group">
            <label for="exampleFormControlInput1">Price</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="price">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Discount</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="discount">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Stock</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="discount">
        </div>

        <hr>
        <h5 for="exampleFormControlInput1">Images</h5>

        <img src="..." alt="..." class="img-thumbnail">

        <div class="custom-file">
            <input type="files" class="custom-file-input" id="customFile" multiple>
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>

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
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="text" class="form-control" name="translation[{{$language->id}}][]" value="{{$product->titleTranslated($language->id)}}" placeholder="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control" name="translation[{{$language->id}}][]" rows="3">{{$product->descriptionTranslated($language->id)}}</textarea>
                    </div>
                </div>
            @endforeach
        </div>

        <hr>

        <h5 for="exampleFormControlInput1">Details</h5>
        <div class="row">
            @foreach($details as $detail)
                <div class="col-3">
                    <label class="font-weight-bold">{{$detail->value}}</label>
                    @foreach($detail->properties->sortBy('value') as $property)
                        <div class="custom-control custom-radio">
                            <input type="radio"
                               id="{{$detail->value.$property->id}}"
                               name="property[{{$detail->id}}]"
                               class="custom-control-input radio-btn"
                               {{in_array($property->id, $product->productProperties->pluck('property_id')->toArray()) ? 'checked':''}}>
                            <label class="custom-control-label" for="{{$detail->value.$property->id}}">{{$property->value}}</label>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>

        <hr>

        <h5 for="exampleFormControlInput1">Brands</h5>
        <div class="row">
            @foreach($brands as $brand)
                <div class="col-3">
                    <label class="font-weight-bold">{{$brand->name}}</label>
                    @foreach($brand->types->sortBy('value') as $type)
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox"
                                   class="custom-control-input"
                                   name="property[]"
                                   value="{{$type->id}}"
                                   id="{{$type->value.$type->id}}"
                                   {{in_array($type->id, $product->types->pluck('id')->toArray()) ? 'checked':''}}>
                            <label class="custom-control-label" for="{{$type->value.$type->id}}">{{$type->value}} - {{$type->model_year}}</label>
                        </div>
                    @endforeach
                </div>
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
    </form>

@endsection

@push('css')
    <style>

    </style>
@endpush

@push('js')
    <script>
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