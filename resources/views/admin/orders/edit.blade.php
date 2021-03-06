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
                        <p><b>company name:</b>{!! $order->company_name !!}</p>
                        <p><b>company vat:</b>{!! $order->company_vat !!}</p>
                        <p><b>company coc:</b>{!! $order->company_coc !!}</p>
                        <br>
                        <h4>address</h4>
                        <p><b>country:</b>{!! $order->country !!}</p>
                        <p><b>state:</b>{!! $order->state !!}</p>
                        <p><b>city:</b>{!! $order->city !!}</p>
                        <p><b>postal code:</b>{!! $order->postal_code !!}</p>
                        <p><b>address:</b>{!! $order->address !!}</p>
                        <p><b>address number:</b>{!! $order->address_number !!}</p>
                        <div id="this" class="d-none">
                            {!! ucfirst($order->company_name) !!}<br>
                            {!! ucwords($order->name) !!}<br>
                            {!! ucfirst($order->address) !!} {!! $order->address_number !!},<br>
                            {!! strtoupper($order->postal_code) !!} {!! ucfirst($order->city) !!}<br>
                            {!! ucfirst($order->country) !!}
                            <br>
                            <br>
                            {!! $order->ean13() !!}
                        </div>
                        <a href="" onclick="PrintElem('#this', 'print label')" class="btn btn-block btn-warning">print packages label</a>
                        <br>
                        <h4>contact</h4>
                        <p><b>name:</b>{!! $order->name !!}</p>
                        <p><b>email:</b>{!! $order->email !!}</p>
                        <p><b>telephone:</b>{!! $order->telephone !!}</p>
                        <br>
                        <h4>order details</h4>
                        <p><b>currency:</b>{!! $order->currency !!}</p>
                        <p><b>total paid:</b>{!! $order->total_paid !!}</p>
                        <p><b>shipping cost:</b>{!! $order->shipping_cost !!}</p>
                        <p><b>payment id:</b>{!! $order->payment_id !!}</p>
                        <p><b>payment method:</b>{!! $order->payment_method !!}</p>
                        <p><b>status:</b>{!! $order->status !!}</p>
                        <p><b>created at:</b>{!! $order->created_at !!}</p>
                        <p><b>updated at:</b>{!! $order->updated_at !!}</p>

                    @endcomponent
                </div>

                <div class="col-sm-6 col-md-6 col-lg-8">
                    <div class="row">
                        <div class="col-md-12 col-lg-6">

                            @component('components.panel', ['title' => 'ordered products'])
                                <a class="btn btn-block btn-warning" onclick="PrintElem('#packingSlip', 'print label')">packing slip</a>

                                @foreach($order->productOrders as $item)
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4">
                                            @if(!empty($item->product->images->first()))
                                                <img src="{!! $item->product->images->first()->path !!}" alt="" class="img-fluid">
                                            @endif
                                        </div>
                                        <div class="col-md-8">
                                            {!! $item->product->titleTranslated() !!}<br>
                                            <b>product nr:</b> {!! $item->product->id !!}<br>
                                            <b>price:</b> {!! $item->price !!}<br>
                                            <b>unit(s):</b> {!! $item->amount !!}x<br>
                                        </div>
                                    </div>

                                @endforeach
                                <div id="packingSlip" class="d-none">
                                    order  #{!! $order->id !!}
                                    <br>
                                    {!! $order->ean13()!!}
                                    <br>
                                    {!! ucfirst($order->company_name) !!}<br>
                                    {!! ucwords($order->name) !!}<br>
                                    {!! ucfirst($order->address) !!} {!! $order->address_number !!},<br>
                                    {!! strtoupper($order->postal_code) !!} {!! ucfirst($order->city) !!}<br>
                                    {!! ucfirst($order->country) !!}
                                    <br>
                                    <br>
                                    <table class="table table-bordered" cellpadding="10" border="1" style="border-collapse: collapse;">
                                        <thead>
                                            <tr>
                                                <th scope="col">title</th>
                                                <th scope="col">unit price</th>
                                                <th scope="col">quantity</th>
                                                <th scope="col">total</th>
                                                <th scope="col">ean</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($order->productOrders as $item)
                                                <tr>
                                                    <td scope="row">
                                                        {!! $item->product->titleTranslated() !!}
                                                        {!! $item->product->id !!}
                                                    </td>
                                                    <td scope="row">{!! $item->price !!}</td>
                                                    <td scope="row">{!! $item->amount !!}</td>
                                                    <td scope="row">{!! $item->price * $item->amount !!}</td>
                                                    <td scope="row">
                                                        @foreach($item->product->barcodes as $barcode)
                                                            {!! $barcode->ean13() !!}
                                                            <b class="text-center" style="background-color: #FFFFFF;">
                                                                {!! $barcode->value !!}
                                                            </b>
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>

                            @endcomponent
                        </div>
                        <div class="col-md-12 col-lg-6">
                            @component('components.panel', ['title' => 'invoice'])
                                <a href="{!! route('admin.pdf.downloadInvoice', $order->id) !!}" class="btn btn-block btn-warning">download</a>
                                {{--<a href="" class="btn btn-block btn-warning">print</a>--}}
                                <a href="{!! route('admin.pdf.streamInvoice', $order->id) !!}" target="_black" class="btn btn-block btn-warning">view</a>
                            @endcomponent

                            @component('components.panel', ['title' => 'Order status'])
                                {{--dropdown en dan status veranderen (alle opties van status van bestelling)--}}
                                {{--@foreach($order->productOrders as $item)--}}
                                {{--{!! $item->product !!}--}}
                                {{--@endforeach--}}
                                {!! Form::model($order, ['route' => ['admin.order.update', $order->id], 'method' => 'PATCH']) !!}
                                    <div class="form-group {!! !$errors->has('status') ? : 'has-error'!!}">
                                        <label for="">* Order status</label>
                                        @if($order->status == 'send')
                                            {!! Form::text('status', null, ['class' => 'form-control', 'disabled']) !!}
                                        @else
                                            <select class="custom-select form-control" name="status">
                                                <option selected>-- selected status --</option>
                                                <option value="in_treatment" {!! $order->status == 'paid'? : 'disabled' !!}>in treatment</option>
                                                <option value="send_package" {!! $order->status == 'treatment'? : 'disabled' !!}>send package</option>
                                                {{--<option value="2">cancelled</option>--}}
                                            </select>
                                        @endif
                                        @include('components.error', ['field' => 'status'])
                                    </div>

                                    <div class="form-group {!! !$errors->has('package_tracking_code') ? : 'has-error'!!}">
                                        @if($order->status == 'treatment')
                                            <label for="">* Package tracking code</label>
                                            {!! Form::text('package_tracking_code', null, ['class' => 'form-control']) !!}
                                        @else
                                            @if($order->status == 'send')
                                                <label for="">* Package tracking code</label>
                                                {!! Form::text('package_tracking_code', null, ['class' => 'form-control', 'disabled']) !!}
                                            @endif
                                        @endif
                                            @include('components.error', ['field' => 'package_tracking_code'])

                                    </div>

                                    @component('components.model', [
                                            'id' => 'orderTableBtn'.$order->id,
                                            'title' => 'Edit',
                                            'tooltip' => 'update order status',
                                            'actionRoute' => route('admin.order.update', $order->id),
                                            'btnClass' => 'btn btn-block btn-danger',
                                            'btnIcon' => null,
                                            'btnTitle' => 'Edit',
                                        ])
                                        @slot('description')
                                            Are you sure to proceed?
                                        @endslot
                                    @endcomponent
                                {!! Form::close() !!}

                            @endcomponent
                            {{--@component('components.panel', ['title' => 'packing slip'])--}}
                                {{--<a href="" class="btn btn-block btn-warning">print</a>--}}
                                {{--@foreach($order->productOrders as $item)--}}
                                    {{--{!! $item->product->titleTranslated()!!}<br>--}}
                                    {{--<b>product nr: </b>{!! $item->product->id !!}--}}
                                    {{--@foreach($item->product->barcodes as $barcode)--}}
                                        {{----}}
                                    {{--@endforeach--}}
                                {{--@endforeach--}}
                        </div>
                    </div>

                    {{--@endcomponent--}}

                </div>

            </div>
        </div>

    </div>

    {{--<div id="this">--}}
        {{--sdasd--}}
    {{--</div>--}}
    {{--<a class="btn btn-danger" onclick="PrintElem('#this', 'print label')">asdasd</a>--}}


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