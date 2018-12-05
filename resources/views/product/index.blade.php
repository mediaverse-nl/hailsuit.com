@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <br>
            <div class="col-md-3">
                <div class="panel panel-default" style="border-radius: 0px; background-color: #fafafa;  border: none;">
                    <div class="panel-body">
                        @include('components.product-filter')
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    {!! Breadcrumbs::render('product.index') !!}

                    @foreach($products as $product)
                        <div class="col-md-4 col-sm-4 col-sm-4 col-xs-6 ">
                            @component('components.auto-model', ['product' => $product])

                            @endcomponent
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
<br>
<br>
<br>

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