@extends('layouts.app')

@section('content')

    <div id="page-header" class="shopping-cart">
        <div class="container">
            <div class="page-header-content text-center">
                <div class="page-header wsub">
                    <h1 class="page-title fadeInDown animated first">Shopping Cart</h1>
                </div><!-- / page-header -->
                <p class="slide-text fadeInUp animated second">Page description goes here...</p>
            </div><!-- / page-header-content -->
        </div><!-- / container -->
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <table class="table shopping-cart">
                    <thead>
                    <tr>
                        <th>Product info</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($content as $item)
                        <tr class="cart-item">
                            <td class="image">
                                <a href="{!! route('product.show', $item->id) !!}">
                                    <img src="{!! $item->options->has('image') ? $item->options->image->path : '' !!}" alt="" class="col-md-5" style="height: 120px; object-fit: cover;">
                                    <span class="col-md-7">
                                        <b>{!! $item->name !!}</b>
                                        <br>
                                        SKU: {!! $item->id !!}
                                    </span>
                                </a>
                            </td>
                            {{--<td>{!! dd($item) !!}</td>--}}
                            <td>{!! $item->price !!}</td>
                            <td class="qty">
                                <input type="number" step="1" min="0" name="cart" value="{!! $item->qty !!}" title="Qty" class="input-text qty text" size="4">
                            </td>
                            <td>{!! $item->total !!}</td>
                            <td class="remove">
                                {!! Form::open(['method' => 'DELETE', 'route' => ['cart.destroy', $item->rowId]]) !!}
                                {!! Form::submit('×', ['class' => '']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>


                <div class="row cart-footer">
                    <div class="coupon col-sm-6">
                        <div class="input-group">
                            <input type="text" class="form-control rounded" id="coupon-code" placeholder="Coupon Code">
                            <span class="input-group-btn">
                                <button class="btn btn-primary-filled" type="button">
                                    <i class="lnr lnr-tag"></i>
                                    <span>Apply Coupon</span>
                                </button>
                            </span>
                        </div>
                    </div>

                    <!-- / input-group -->
                    <div class="update-cart col-sm-6">
                        <button class="btn btn-default-filled btn-rounded pull-right" type="button">
                            <i class="lnr lnr-sync"></i>
                            <span>Update Cart</span>
                        </button>
                    </div><!-- / update-cart -->

                    <div class="col-sm-6 cart-total">
                        <h4>Cart Total</h4>
                        <p>Subtotal: <span>{!! Cart::subtotal() !!}</span></p>
                        <p>Tax: <span>{!! Cart::tax() !!}</span></p>
                        <p>Shipping: <span>Free</span></p>
                        <p>Total: <span>{!! Cart::total() !!}</span></p>
                    </div><!-- / cart-total -->

                    <div class="col-sm-6 cart-checkout">
                        <br>
                        <a href="shop-right.html" class="btn btn-default-filled btn-rounded btn-success pull-right" style="margin-left: 10px;">
                            <i class="lnr lnr-cart"></i> <span>Continue Shopping</span>
                        </a>
                        <a href="{!! route('cart.create') !!}" class="btn btn-primary-filled btn-rounded btn-primary pull-right">
                            <i class="lnr lnr-exit"></i> <span>Proceed to Checkout</span>
                        </a>
                    </div><!-- / cart-checkout -->

                </div>

            </div>

        </div>
    </div>

@endsection

@push('css')
    <style>
        .shopping-cart{

        }
    </style>
@endpush

@push('js')
    <script>

    </script>
@endpush