@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row" style="padding: 50px 0px;">

            <div class="col-md-12" style="margin-top: -30px;">
                {!! Breadcrumbs::render('product.show', $product) !!}
            </div>
            <div class="col-md-6">
                <br>

                    @foreach($product->images as $image)
                        @if($loop->first)
                            <img src="{{$image->path}}" alt="" class="img-responsive" style="width: 100%;">
                            <div class="row">
                        @endif
                        @if(!$loop->first)
                            <div class="col-md-3" style="height: 80px; margin-top: 20px;">
                                <img src="{{$image->path}}" alt="" class="img-responsive" style="height: 100%; width: 100%; object-fit: cover">
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-md-6 pull-right">

                <h1>{!! $product->titleTranslated() !!}</h1>

                @if($product->discount() == 0.00)
                    <span class="price-badge">{{$appLanguage->currency}} {!! $product->price() !!}</span>
                @else
                    <del class="price-badge small">{{$appLanguage->currency}} {!! $product->price() !!}</del>
                    <span class="price-badge">{{$appLanguage->currency}} {!! $product->price() !!}</span>
                @endif


                <span class="text-muted small">{!! Translator('product_including_vat', 'text', false, 'including VAT') !!}: {{$appLanguage->currency}} {!! $product->tax() !!}</span>
                <br>
                <br>

                <b>SKU: </b><span>{!! $product->barcodes()->first() ? $product->barcodes()->first()->value: '' !!}</span>
                <br>
                <b>{!! Translator('product_stock', 'text', false, 'STOCK') !!}: </b>

                @if($product->stock >= 1)
                    <span>{!! Translator('product_in_stock', 'text', false, 'in stock') !!} </span>
                @else
                    <span>{!! Translator('product_sold_out', 'text', false, 'sold out') !!} </span>
                @endif

                <br>
                <br>

                <p>{!! $product->descriptionTranslated() !!}</p>

                <ul>
                    @foreach($product->productProperties()->get() as $property)
                        <li>
                            <b>{!! $property->property->detail->getTranslation() !!}: </b>
                            {!! $property->property->getTranslation() !!}
                        </li>
                    @endforeach
                </ul>
                <br>
                <div class="row">
                    {{Form::open(['route' => ['cart.store', $product->id]])}}
                        <div class="col-md-6 cart-amount">
                            {{--<div class="btn-group" role="group" aria-label="...">--}}
                                {{--<button type="button" class="btn btn-default">--}}
                                    {{--<i class="fas fa-minus"></i>--}}
                                {{--</button>--}}
                                {{--<input type="text" class="btn btn-default disabled">12</input>--}}
                                {{--<button type="button" class="btn btn-default">--}}
                                    {{--<i class="fas fa-plus"></i>--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        </div>
                        <div class="col-md-6">
                            @if($product->stock >= 1)
                                <button type="submit" title="Click Here" class="btn btn-lg btn-default pull-right" style="color: #FFFFFF; background-color: #4D4D4C;">
                                    <i class="fas fa-cart-plus"></i>
                                    Add to Cart
                                </button>
                            @else
                                <a title="Click Here" class="btn btn-lg btn-default pull-right" disabled="" style="color: #FFFFFF; background-color: #4D4D4C;">
                                    <i class="fas fa-cart-plus"></i>
                                    Add to Cart
                                </a>
                            @endif
                        </div>
                    {{Form::close()}}
                </div>
                {{--<hr>--}}
                <hr>
                <!-- Load Facebook SDK for JavaScript -->
                <iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&layout=button&size=small&mobile_iframe=true&appId=119122968652323&width=59&height=20" width="59" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                <hr>
                <br>
                {{--<!-- Nav tabs -->--}}
                {{--<ul class="nav nav-tabs" role="tablist">--}}
                    {{--<li role="presentation" class="active">--}}
                        {{--<a href="#1" aria-controls="1" role="tab" data-toggle="tab" aria-expanded="true">Description</a>--}}
                    {{--</li>--}}
                    {{--<li role="presentation"><a href="#2" aria-controls="2" role="tab" data-toggle="tab">Specs</a></li>--}}
                    {{--<li role="presentation"><a href="#3" aria-controls="3" role="tab" data-toggle="tab">compatible</a></li>--}}
                {{--</ul>--}}
                {{--<br>--}}
                {{--<!-- Tab panes -->--}}
                {{--<div class="tab-content">--}}
                    {{--<div role="tabpanel" class="tab-pane active" id="1">{!! $product->descriptionTranslated() !!}</div>--}}
                    {{--<div role="tabpanel" class="tab-pane" id="2">--}}
                        {{--<table class="table">--}}
                            {{--<tbody>--}}
                            {{--@foreach($product->productProperties()->get() as $property)--}}
                                {{--<tr>--}}
                                    {{--<td><b>{!! $property->property->detail->getTranslation() !!}</b></td>--}}
                                    {{--<td>{!! $property->property->getTranslation() !!}</td>--}}
                                {{--</tr>--}}
                            {{--@endforeach--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                    {{--<div role="tabpanel" class="tab-pane" id="3">--}}
                        {{--<table class="table">--}}
                            {{--<thead>--}}
                                {{--<tr>--}}
                                    {{--<td><b>Brand</b></td>--}}
                                    {{--<td><b>type</b></td>--}}
                                    {{--<td><b>year</b></td>--}}
                                {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                                {{--@foreach($types as $type)--}}
                                    {{--<tr>--}}
                                        {{--<td>{{$type->brand->name}}</td>--}}
                                        {{--<td>{{$type->value}}</td>--}}
                                        {{--<td>{{$type->model_year}}</td>--}}
                                    {{--</tr>--}}
                                {{--@endforeach--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}

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
        .btn-default{
            background: transparent;
            text-transform: uppercase;
        }
    </style>
@endpush