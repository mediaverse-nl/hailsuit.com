@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            {!! Breadcrumbs::render('cart.index') !!}

            <div class="col-md-10 col-md-offset-1">

                <div class="panel" style="box-shadow: none;">
                    {{--<hr>--}}
                    <div class="panel-heading">
                        <h1 class="page-title fadeInDown animated first">
                            {!! Translator('cart_title', 'text', false, 'Shopping Cart') !!}
                        </h1>
                    </div>
                    <div class="panel-body">
                        @if(Cart::count() != 0)
                            <table class="table shopping-cart" id="shoppingCart" style="border-bottom: 1px solid #eee; ">
                                <thead>
                                    <tr>
                                        <th>{!! Translator('product_info', 'text', false, 'Product info') !!}</th>
                                        <th>{!! Translator('price', 'text', false, 'Price') !!}</th>
                                        <th>{!! Translator('quantity', 'text', false, 'Quantity') !!}</th>
                                        <th>{!! Translator('total', 'text', false, 'Total') !!}</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($content as $item)
                                    <tr class="cart-item">
                                        <td class="image">
                                            <a href="{!! route('product.show', [$item->id, SpaceToHyphen($item->options->product->titleTranslated())]) !!}">
                                                <img src="{!! $item->options->has('image') ? $item->options->image->path : '' !!}" alt="" class="col-md-5" style="height: 120px; object-fit: cover;">
                                                <span class="col-md-7">
                                                    <br><br>
                                                    <b>{!! $item->name !!}</b>
                                                    <br>
                                                    SKU: {!! $item->id !!}
                                                </span>
                                            </a>
                                        </td>
                                        <td><br><br>{!! number_format($item->price, 2) !!}</td>
                                        <td class="qty" id="qty">
                                            <br>
                                            <br>
                                            <input type="hidden" value="{!! $item->rowId !!}" name="id">
                                            <input type="number" step="1" min="1" name="cart" value="{!! $item->qty !!}" title="Qty" class="input-text qty text" size="4">
                                        </td>
                                        <td><br><br>{!! number_format($item->total, 2) !!}</td>
                                        <td class="remove">
                                            <br><br>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['cart.destroy', $item->rowId]]) !!}
                                                <button type="submit" class="" style="border-radius: 50%; height: 25px; width: 25px; border: none;">
                                                    <i class="fa fa-times text-center" style="font-size: 15px; padding-top: 3px;"></i>
                                                </button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        @else
                            <p>
                                {!! Translator('cart_is_empty', 'text', false, 'Cart is empty') !!}
                            </p>
                            <br>
                        @endIf

                        <div class="row">
                            <div class="col-md-6">
                                <a href="{!! route('product.index') !!}" class="btn btn-default">
                                    {!! Translator('cart_continue_btn', 'text', false, 'continue shopping') !!}
                                </a>
                            </div>
                            <div class="col-md-6">
                                @if(Cart::total() != 0)
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['cart.destroy']]) !!}
                                        <button type="submit" class="btn btn-default pull-right">
                                            {!! Translator('cart_clear_btn', 'text', false, 'clear cart') !!}
                                        </button>
                                    {!! Form::close() !!}
                                    <a href="" class="btn btn-default pull-right" id="updateCart">
                                        {!! Translator('cart_update_btn', 'text', false, 'update cart') !!}
                                    </a>
                                @else
                                    <a href="" class="btn btn-default pull-right" disabled="">
                                        {!! Translator('cart_clear_btn', 'text', false, 'clear cart') !!}
                                    </a>
                                    <a href="" class="btn btn-default pull-right" disabled="">
                                        {!! Translator('cart_update_btn', 'text', false, 'update cart') !!}
                                    </a>
                                @endIf
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                @if(Cart::total() != 0)
                                    <a href="{!! route('cart.create') !!}" class="btn btn-default" style="width: 100%; background-color: #4D4D4C; color: white;">{!! Translator('cart_proceed_btn', 'text', false, 'proceed to checkout') !!}</a>
                                @else
                                    <a href="" class="btn btn-default" style="background-color: #4D4D4C !important;color: white; width: 100%;" disabled="">{!! Translator('cart_proceed_btn', 'text', false, 'proceed to checkout') !!}</a>
                                @endIf

                                <br>
                                <br>
                                <p class="text-center"><b>{!! Translator('shipping', 'text', false, 'Free Shipping') !!}</b></p>
                            </div>
                            <div class="col-md-6">
                                <h2 style="margin: 0px 0px 15px 0px;"><b>{!! Translator('total', 'text', false, 'Total') !!}:</b> {!! Cart::total() !!}</h2>

                                <p> <b>{!! Translator('subtotal', 'text', false, 'Subtotal') !!}:</b> {!! Cart::subtotal() !!}</p>

                                <p> <b>{!! Translator('tax', 'text', false, 'Tax') !!}:</b> {!! Cart::tax() !!}</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="row" style="background-color: #fafafa; padding: 40px 0px; margin-bottom: -80px;">
        <div class="container">
            <div class="row text-center">
                <h2 class="">{!! Translator('pay_with', 'text', false, 'Our payment methods') !!}</h2>

                @foreach($methods as $method)
                    <img class="list-inline" src="{!! $method->image->normal !!}" alt="{!! $method->description !!}" style="padding: 15px;">
                @endforeach

            </div>
        </div>
    </div>

@endsection

@push('css')
    <style>

        input.qty{
            /*border-radius: 10px;*/
            border: 1px solid #dddddd !important;
            outline: none;
            width: 60px;
            padding-left: 5px;
            /*background: #DDDDDD;*/
        }
        .btn-warning{
            color: #FFFFFF;
        }
        .btn{
            border-radius: 0px;
            /*border: none !important;*/
        }
        .btn-default{
            /*background-color: #FFFFFF;*/
            border: 1px solid #eeeeee;
            text-shadow: none;
            background: transparent;
            text-transform: uppercase;
        }
        .shopping-cart th{
            color: #000000 !important;
        }
    </style>
@endpush

@push('js')
    <script>
        $(document).ready(function(){

            $('#updateCart').click(function(e){

                var keys = [];

                $("#shoppingCart tr.cart-item").each(function (key, value) {
                    var input = $(value).find("input[name=cart]").val();
                    var id = $(value).find("input[name=id]").val();
                    console.log(id, input, value);
                    keys.push({
                        "qty": input,
                        "id": id,
                    });
                });

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                e.preventDefault(e);

                $.ajax({
                    type:"PATCH",
                    url:'{!! route('cart.update') !!}',
                    data: {"items": keys},
                    dataType: 'json',
                    success: function(data){
                        // console.log(data);
                        if(data == 200){
                            location.reload();
                        }
                    },
                    error: function(data){

                    }
                });
            });
        });

    </script>
@endpush