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
{{--TODO use these values to make a form--}}
                <div class="col-sm-6 col-md-6 col-lg-4" id="orderDetails">
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

                <div class="col-sm-6 col-md-6 col-lg-8">
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            @component('components.panel', ['title' => 'Order status'])
                                {{--dropdown en dan status veranderen (alle opties van status van bestelling)--}}
                                {{--@foreach($order->productOrders as $item)--}}
                                {{--{!! $item->product !!}--}}
                                {{--@endforeach--}}
                                {!! Form::model($order, ['route' => ['admin.order.update', $order->id], 'method' => 'PATCH']) !!}
                                <div class="form-group">
                                    <label for="">Order status</label>
                                    <select class="custom-select form-control">
                                        <option selected>-- selected status --</option>
                                        <option value="1">send package</option>
                                        {{--<option value="2">cancelled</option>--}}
                                        <option value="3">in treatment</option>
                                    </select>
                                </div>

                                <a href="" class="btn btn-block btn-danger">Edit</a>
                                {!! Form::close() !!}

                            @endcomponent

                            @component('components.panel', ['title' => 'ordered products'])
                                @foreach($order->productOrders as $item)
                                    {!! $item->product !!}
                                @endforeach
                            @endcomponent
                        </div>
                        <div class="col-md-12 col-lg-6">
                            @component('components.panel', ['title' => 'invoice'])
                                <a href="" class="btn btn-block btn-warning">download</a>
                                <a href="" class="btn btn-block btn-warning">print</a>
                                <a href="" class="btn btn-block btn-warning">view</a>
                            @endcomponent

                            @component('components.panel', ['title' => 'packing slip'])
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
                        </div>
                    </div>

                    @endcomponent

                </div>

            </div>
        </div>

    </div>

    <div id="this">
        sdasd
    </div>
    <a class="btn btn-danger" onclick="PrintElem('#this', 'print label')">asdasd</a>


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
        @media print {
            #this{
                width: 89mm;
                height: 127mm;
                margin: 30mm 45mm 30mm 45mm;
                /* change the margins as you want them to be. */
            }
        }

        /*adasdas*/
        .page {
            width: 210mm;
            min-height: 297mm;
            padding: 20mm;
            margin: 10mm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .subpage {
            padding: 1cm;
            border: 5px red solid;
            height: 257mm;
            outline: 2cm #FFEAEA solid;
        }

        @page {
            size: 62mmx184mm;
            margin: 0;
        }
        @media print {
            html, body {
                width: 210mm;
                height: 297mm;
            }
            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }

    </style>
@endpush

@push('scripts')
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>--}}
    <script>
        // $(document).ready(function () {
            function PrintElem(elem, title)
            {
                Popup($(elem).html(), title);
            }

            function Popup(data, title)
            {
                var mywindow = window.open('', 'my div', 'left=0,top=0,width=600,height=400,toolbar=1,scrollbars=1,status=0');

                $(mywindow.document.head).html( '<title>' + title + '</title>' +
                    '<link rel="stylesheet" href="css/main.css" type="text/css" />');
                $(mywindow.document.body).html( '<body>' + data + '</body>');

                mywindow.document.close();
                mywindow.focus(); // necessary for IE >= 10
                mywindow.print();
                mywindow.close();

                return true;
            }
        // });
    </script>
@endpush