@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.detail.edit', $order) !!}
@endsection

@section('content')

    <div class="row">

        <div class="col">

            <h2>Order #{{$order->id}}</h2>

            <hr>

            <div class="row">

                <div class="col-md-6" id="orderDetails">
                    @component('components.panel')
                        <h4>Business</h4>
                        <p><b>company_name:</b>{!! $order->company_name !!}</p>
                        <p><b>company_vat:</b>{!! $order->company_vat !!}</p>
                        <p><b>company_coc:</b>{!! $order->company_coc !!}</p>
                        <br>
                        <h4>address</h4>
                        <p><b>country:</b>{!! $order->country !!}</p>
                        <p><b>state:</b>{!! $order->state !!}</p>
                        <p><b>city:</b>{!! $order->city !!}</p>
                        <p><b>postal_code:</b>{!! $order->postal_code !!}</p>
                        <p><b>address:</b>{!! $order->address !!}</p>
                        <p><b>address_number:</b>{!! $order->address_number !!}</p>
                        <a href="" class="btn btn-block btn-warning">print packages label</a>
                        <br>
                        <h4>contact</h4>
                        <p><b>name:</b>{!! $order->name !!}</p>
                        <p><b>email:</b>{!! $order->email !!}</p>
                        <p><b>telephone:</b>{!! $order->telephone !!}</p>
                        <br>
                        <h4>order details</h4>
                        <p><b>currency:</b>{!! $order->currency !!}</p>
                        <p><b>total_paid:</b>{!! $order->total_paid !!}</p>
                        <p><b>shipping_cost:</b>{!! $order->shipping_cost !!}</p>
                        <p><b>payment_id:</b>{!! $order->payment_id !!}</p>
                        <p><b>payment_method:</b>{!! $order->payment_method !!}</p>
                        <p><b>status:</b>{!! $order->status !!}</p>
                        <p><b>created_at:</b>{!! $order->created_at !!}</p>
                        <p><b>updated_at:</b>{!! $order->updated_at !!}</p>

                    @endcomponent
                </div>

                <div class="col-md-6">
                    @component('components.panel', ['title' => 'ordered products'])
                        @foreach($order->productOrders as $item)
                            {!! $item->product !!}
                        @endforeach
                    @endcomponent

                    @component('components.panel', ['title' => 'factuur'])
                        <a href="" class="btn btn-block btn-warning">download</a>
                        <a href="" class="btn btn-block btn-warning">print</a>
                        <a href="" class="btn btn-block btn-warning">view</a>
                    @endcomponent

                    @component('components.panel', ['title' => 'pakbon'])
                        <a href="" class="btn btn-block btn-warning">print</a>
                        @foreach($order->productOrders as $item)
                            {!! $item->product->titleTranslated()!!}<br>
                            <b>product nr: </b>{!! $item->product->id !!}
                            @foreach($item->product->barcodes as $barcode)
                                <div>
                                    {!! $barcode->ean13() !!}
                                    <b class="text-center">{!! $barcode->value !!}</b>
                                </div>
                            @endforeach
                        @endforeach
                    @endcomponent

                </div>

            </div>
        </div>

    </div>

@endsection

@push('css')
    <style>
        .list-group-item.active a{
            color: #ffffff !important;
        }
        #orderDetails p{
            margin: 0px;
        }
        #orderDetails p{
            text-align: left !important;
            /*text-indent: -2em;*/
        }
        #orderDetails b{
            padding-right: 20px;
            /*text-indent: -2em;*/
            /*position: relative;*/
        }
    </style>
@endpush

@push('js')
    <script>

    </script>
@endpush