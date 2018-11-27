@extends('layouts.app')

@section('content')

{{--    @include('components.product-filter')--}}

    <div class="container">
        <div class="row">
            <br>
            <div class="col-md-3">
                @include('components.product-filter')
            </div>
            <div class="col-md-9">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-3 col-sm-4 col-sm-4 col-xs-6">
                            <a href="{!! route('product.show', [
                        $product->id, str_replace(' ',  '-', $product->titleTranslated())
                    ]) !!}">
                                <img src="https://via.placeholder.com/200x120" alt="" style="width: 100%;">
                                <h4 class="text-center">Auto model</h4>
                            </a>
                        </div>
                    @endforeach
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