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

                {{--// Add some items in your Controller.--}}
                {{--{!! Cart::add('192ao12', 'Product 1', 1, 9.99) !!}--}}
                {{--{!! Cart::add('1239ad0', 'Product 2', 2, 5.95, ['size' => 'large']) !!}--}}

                <table class="table shopping-cart">
                    <thead>
                    <tr>
                        <th class="image">&nbsp;</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="cart-item">
                        <td class="image"><a href="#"><img src="images/product-small1.jpg" alt=""></a></td>
                        <td><a href="single-product.html">Women's Shirt</a></td>
                        <td>$59</td>
                        <td class="qty"><input type="number" step="1" min="0" name="cart" value="1" title="Qty" class="input-text qty text" size="4"></td>
                        <td>$59</td>
                        <td class="remove"><a href="#x" class="btn btn-danger-filled x-remove">×</a></td>
                    </tr>
                    <tr class="cart-item">
                        <td class="image"><a href="#"><img src="images/product-small2.jpg" alt=""></a></td>
                        <td><a href="single-product.html">Women's Jeans</a></td>
                        <td>$69</td>
                        <td class="qty"><input type="number" step="1" min="0" name="cart" value="2" title="Qty" class="input-text qty text" size="4"></td>
                        <td>$138</td>
                        <td class="remove"><a href="#x" class="btn btn-danger-filled x-remove">×</a></td>
                    </tr>
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
                    </div><!-- / input-group -->
                    <div class="update-cart col-sm-6">
                        <button class="btn btn-default-filled btn-rounded pull-right" type="button">
                            <i class="lnr lnr-sync"></i>
                            <span>Update Cart</span>
                        </button>
                    </div><!-- / update-cart -->

                    <div class="col-sm-6 cart-total">
                        <h4>Cart Total</h4>
                        <p>Subtotal: <span>$197</span></p>
                        <p>Shipping: <span>Free</span></p>
                        <p>Total: <span>$197</span></p>
                    </div><!-- / cart-total -->

                    <div class="col-sm-6 cart-checkout">
                        <br>
                        <a href="shop-right.html" class="btn btn-default-filled btn-rounded btn-success pull-right" style="margin-left: 10px;">
                            <i class="lnr lnr-cart"></i> <span>Continue Shopping</span>
                        </a>
                        <a href="checkout.html" class="btn btn-primary-filled btn-rounded btn-primary pull-right">
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