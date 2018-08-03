@extends('layouts.admin')

@section('content')


    <div class="form-group">
        <label for="exampleFormControlInput1">Price</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="price">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Discount</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="discount">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Stock</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="discount">
    </div>

    <hr>
    <h5 for="exampleFormControlInput1">Images</h5>

    <img src="..." alt="..." class="img-thumbnail">

    <div class="custom-file">
        <input type="file" class="custom-file-input" id="customFile" multiple>
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
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
        @endforeach
    </div>

    <hr>


    <h5 for="exampleFormControlInput1">Details</h5>
    <div class="row">
        @foreach($details as $detail)
            <div class="col-sm">
                <label class="font-weight-bold">{{$detail->value}}</label>
                @foreach($detail->properties->sortBy('value') as $property)
                    <div class="form-check">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="{{$detail->value.$property->id}}" name="property[{{$detail->id}}]" class="custom-control-input">
                            <label class="custom-control-label" for="{{$detail->value.$property->id}}">{{$property->value}}</label>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

    <hr>

    <h5 for="exampleFormControlInput1">Brands</h5>
    <div class="row">
        @foreach($brands as $brand)
            <div class="col-sm">
                <label class="font-weight-bold">{{$brand->name}}</label>
                @foreach($brand->types->sortBy('value') as $type)
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="property[]" value="{{$type->id}}" id="{{$type->value.$type->id}}">
                        <label class="custom-control-label" for="{{$type->value.$type->id}}">{{$type->value}} - {{$type->model_year}}</label>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

    <hr>

    <label for="exampleFormControlInput1">Barcodes</label>

    <div class="form-group cloned-row">
        <input type="email" class="form-control" id="exampleFormControlInput1" name="barcodes[]" placeholder="EAN">
    </div>

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
        <a href="" class="btn btn-success">Save</a>
        <a href="" class="btn btn-default">Cancel</a>
    </div>

@endsection

@push('css')
    <style>

    </style>
@endpush

@push('js')
    <script>
        $("#clone").click(function() {
            $(".cloned-row:first").clone().insertAfter(".cloned-row:last");

            if(!$(".cloned-row:first").hasClass("first-row")) {
                $(".cloned-row:first").addClass('first-row');
            }
            $(".cloned-row:first").removeClass('cloned-row');
        });

        $("#remove").click(function() {
            console.log('click');
            $(".cloned-row:last").remove();

            console.log($(".first-row:first").hasClass("first-row"));
            if($(".first-row:last").hasClass("first-row")){
                $(".first-row").addClass('cloned-row');
                $(".first-row").removeClass('first-row');
            }
        });
    </script>
@endpush