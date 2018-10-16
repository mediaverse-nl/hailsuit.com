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

                <div class="col-md-4">
                    @component('components.panel')
                       @foreach($order->productOrders as $item)
                           {!! $item->product !!}
                       @endforeach
                    @endcomponent
                </div>

                <div class="col-md-4">
                   asdsa
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
    </style>
@endpush

@push('js')
    <script>

    </script>
@endpush