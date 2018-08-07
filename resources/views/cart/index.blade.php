@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">

                // Add some items in your Controller.
                {{--{!! Cart::add('192ao12', 'Product 1', 1, 9.99) !!}--}}
                {{--{!! Cart::add('1239ad0', 'Product 2', 2, 5.95, ['size' => 'large']) !!}--}}

                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(Cart::content() as $row)
                            <tr>
                                <td>
                                    <p><strong><?php echo $row->name; ?></strong></p>
                                    <p><?php echo ($row->options->has('size') ? $row->options->size : ''); ?></p>
                                </td>
                                <td><input type="text" value="<?php echo $row->qty; ?>"></td>
                                <td>$<?php echo $row->price; ?></td>
                                <td>$<?php echo $row->total; ?></td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td>Subtotal</td>
                            <td><?php echo Cart::subtotal(); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td>Tax</td>
                            <td><?php echo Cart::tax(); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td>Total</td>
                            <td><?php echo Cart::total(); ?></td>
                        </tr>
                    </tfoot>
                </table>

            </div>
            <div class="col-md-4">
                <h1>Check out</h1>

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

    </script>
@endpush