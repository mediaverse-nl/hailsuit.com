@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.detail.index') !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-9">

            @component('components.datatable')
                @slot('head')
                    <th>#</th>
                    <th>products</th>
                    <th>total_paid</th>
                    <th>country</th>
                    <th class="no-sort"></th>
                @endslot

                @slot('table')
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->productOrders()->sum('amount')}}</td>
                            <td>{{$order->total_paid}}</td>
                            <td>{{$order->country}}</td>
                            {{--<td>{{$order}}</td>--}}
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
                                <a href="{{route('admin.detail.edit', $order->id)}}" class="rounded-circle " style="background: var(--success)">
                                    <i class="fa fa-print"></i>
                                </a>
                                <a href="{{route('admin.detail.edit', $order->id)}}" class="rounded-circle edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endslot

            @endcomponent

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