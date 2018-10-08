@extends('layouts.app')

@section('content')
    <div class="row" style="background: #333; padding: 0px; margin: 0px;">
        <div class="container">
            <h1>Filter</h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <b>Merk</b>
                        <select class="form-control filter" id="brands">
                            <option>Please Select</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <b>Type</b>
                        <select class="form-control filter" id="types">
                            <option>Please Select</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <b>Jaar</b>
                        <select class="form-control filter" id="years">
                            <option>Please Select</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>


        <div class="container">
            <div class="row" style="padding: 80px 0px;">
                <div class="col-md-7">
                    @foreach($product->images as $image)
                        <img src="{{$image->path}}" alt="" class="img-responsive">
                    @endforeach
                </div>
                <div class="col-md-5">

                    <div class="panel panel-default product-panel">
                        <div class="panel-body">

                            <h1>{!! $product->titleTranslated() !!}</h1>

                            <hr>
{{--                            {!! dd($product->discount()) !!}--}}
                            @if($product->discount() == 0.00)
                                <span class="price-badge">{{$appLanguage->currency}} {!! $product->price() !!}</span>
                            @else
                                <del class="price-badge small">{{$appLanguage->currency}} {!! $product->price() !!}</del>
                                <span class="price-badge">{{$appLanguage->currency}} {!! $product->price() !!}</span>
                            @endif
                            <br>
                            <span class="text-muted">Inclusief tax: {{$appLanguage->currency}} {!! $product->tax() !!}</span>

                            <hr>
                            <p>{!! $product->descriptionTranslated() !!}</p>
                            <br>

                            <div class="row">
                                {{Form::open(['route' => ['cart.store', $product->id]])}}
                                    <div class="col-md-6 cart-amount">
                                        <div class="btn-group" role="group" aria-label="...">
                                            <button type="button" class="btn btn-default">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-default disabled">12</button>
                                            <button type="button" class="btn btn-default">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" title="Click Here" class="btn btn-lg btn-primary btn-rounded pull-right" style="background: #FE6F41; border: none;">
                                            <i class="fas fa-cart-plus"></i>
                                            Add to Cart
                                        </button>
                                    </div>
                                {{Form::close()}}
                            </div>
                            {{--<hr>--}}
                            <br>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#1" aria-controls="1" role="tab" data-toggle="tab" aria-expanded="true">Description</a>
                                </li>
                                <li role="presentation"><a href="#2" aria-controls="2" role="tab" data-toggle="tab">Specs</a></li>
                                <li role="presentation"><a href="#3" aria-controls="3" role="tab" data-toggle="tab">compatible</a></li>
                            </ul>
                            <br>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="1">{!! $product->descriptionTranslated() !!}</div>
                                <div role="tabpanel" class="tab-pane" id="2">
                                    <table class="table">
                                        <tbody>
                                        @foreach($product->productProperties()->get() as $property)
                                            <tr>
                                                <td><b>{!! $property->property->detail->value !!}</b></td>
                                                <td>{!! $property->property->value !!}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="3">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td><b>Brand</b></td>
                                                <td><b>type</b></td>
                                                <td><b>year</b></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($types as $type)
                                                <tr>
                                                    <td>{{$type->brand->name}}</td>
                                                    <td>{{$type->value}}</td>
                                                    <td>{{$type->model_year}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{--<div role="tabpanel" class="tab-pane" id="4">3</div>--}}
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

@endsection

@push('css')
    <style>
        .cart-amount .btn-group button{
            border-radius: 0px !important;
        }
        .form-control{
            border-radius: 0px;
        }
        .product-panel{
            border-radius: 0px;
            -webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,.15), 0 1px 5px rgba(0,0,0,.075);
            box-shadow: inset 0 1px 0 rgba(255,255,255,.15), 0 1px 5px rgba(0,0,0,.075);
        }
        .product-panel .nav-tabs > li > a{
            border-radius: 0px;
        }

        .price-badge{
            font-weight: 500;
            font-size: 24px;
        }
    </style>
@endpush