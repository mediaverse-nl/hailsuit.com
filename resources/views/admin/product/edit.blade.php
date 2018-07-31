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

    <label for="exampleFormControlInput1">Translations</label>

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

    <label for="exampleFormControlInput1">Details</label>
    <br>

    <div class="form-check-inline">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" value="">Option 1
        </label>
    </div>

    <div class="form-check-inline">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" value="">Option 1
        </label>
    </div>

    <div class="form-check-inline">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" value="">Option 1
        </label>
    </div>

    <hr>

    <label for="exampleFormControlInput1">Barcodes</label>

    <div class="form-group cloned-row">
        <label for="exampleFormControlInput1">barcode</label>
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