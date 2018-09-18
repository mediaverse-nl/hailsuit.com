@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                bestelling
                            </div>
                            <div class="panel-body">
                                <table class="table shopping-cart">
                                    <thead>
                                    <tr>
                                        <th class="image">&nbsp;</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($content as $item)
                                        <tr class="cart-item">
                                            <td class="image"><a href="#"><img src="images/product-small2.jpg" alt=""></a></td>
                                            <td><a href="single-product.html">Women's Jeans</a></td>
                                            <td>$69</td>
                                            <td class="qty">1</td>
                                            <td>$138</td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                gegevens
                            </div>
                            <div class="panel-body">
                                {!! form($form) !!}
                            </div>
                        </div>
                    </div>
                 <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                adres
                            </div>
                            <div class="panel-body">
                                asdad
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel">
                    <div class="panel-body">

                        {!! Cart::total() !!}
                        {!! Cart::tax() !!}

                        asdasd <br>
                        asdasd <br>
                        <a href="shop-right.html" class="btn btn-default-filled btn-rounded btn-success pull-right" style="margin-left: 10px;">
                            <i class="lnr lnr-cart"></i> <span>Continue Shopping</span>
                        </a>
                        <a href="{!! route('cart.create') !!}" class="btn btn-primary-filled btn-rounded btn-primary pull-right">
                            <i class="lnr lnr-exit"></i> <span>Proceed to Checkout</span>
                        </a>
                        <input type="button" value="Click Me!" onclick="submitForms()" />

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('css')
    <style>

    </style>
@endpush

@push('js')
    <script>
        submitForms = function(){
            document.getElementById("form1").submit();
            document.getElementById("form2").submit();
        }
    </script>
@endpush