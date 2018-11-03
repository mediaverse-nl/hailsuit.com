@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.detail.index') !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-12">

            @component('components.datatable')
                @slot('head')
                    <th>#</th>
                    <th>placed</th>
                    <th>item(s)</th>
                    <th>total paid</th>
                    <th>country</th>
                    <th>status</th>
                    <th class="no-sort"></th>
                @endslot

                @slot('table')
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->created_at->diffForHumans()}}</td>
                            <td>{{$order->productOrders()->sum('amount')}} x</td>
                            <td>{{$order->total_paid}}</td>
                            <td>{{$order->country}}</td>
                            <td>{{$order->status}}</td>
                            <td>
                                {{--@component('components.model', [--}}
                                    {{--'id' => 'orderTableBtn'.$order->id,--}}
                                    {{--'title' => 'Delete',--}}
                                    {{--'actionRoute' => route('admin.detail.edit', $order->id),--}}
                                    {{--'btnClass' => 'rounded-circle delete',--}}
                                    {{--'btnIcon' => 'fa fa-trash'--}}
                                {{--])--}}
                                    {{--@slot('description')--}}
                                        {{--If u proceed u will delete all relations--}}
                                    {{--@endslot--}}
                                {{--@endcomponent--}}
                                <a href="{{route('admin.pdf.downloadInvoice', $order->id)}}" class="rounded-circle " style="background: var(--success)">
                                    <i class="fa fa-download"></i>
                                </a>
                                {{--<a href="{{route('admin.order.edit', $order->id)}}" class="rounded-circle " style="background: var(--success)">--}}
                                    {{--<i class="fa fa-download"></i>--}}
                                {{--</a>--}}
                                <a href="{{route('admin.order.edit', $order->id)}}" class="rounded-circle edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endslot

            @endcomponent

        </div>
        {{--<div class="col-6">--}}
            {{--<iframe src="{!! route('admin.pdf.streamInvoice', 1) !!}" frameborder="0" style="width: 100%; height: 600px;"></iframe>--}}
        {{--</div>--}}

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