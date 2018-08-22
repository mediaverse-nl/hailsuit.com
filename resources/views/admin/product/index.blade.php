@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.product.index') !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-9">
            @component('components.datatable')
                @slot('head')
                    <th>Name</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Stock</th>
                    <th>Updated</th>
                    <th class="no-sort"></th>
                @endslot

                @slot('table')
                    @foreach($products as $product)
                        <tr>
                            <td>
                                {{$product->titleTranslated()}}
                                <div class="d-none">
                                    @foreach($product->barcodes as $barcode)
                                        {{$barcode->value}}
                                    @endforeach
                                </div>
                            </td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->discount}}</td>
                            <td>{{$product->stock}}</td>
                            <td>{{$product->updated_at->format('d-m-Y')}}</td>
                            <td>
                                @component('components.model', [
                                    'id' => 'productTableBtn'.$product->id,
                                    'title' => 'Delete',
                                    'actionRoute' => route('admin.brand.edit', $product->id),
                                    'btnClass' => 'rounded-circle delete',
                                    'btnIcon' => 'fa fa-trash'
                                ])
                                    @slot('description')
                                        If u proceed u will delete all relations
                                    @endslot
                                @endcomponent
                                <a href="{{route('admin.product.edit', $product->id)}}" class="rounded-circle edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                @endslot

            @endcomponent

        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    add to stock
                </div>
                <div class="card-body">
                    {!! form($addStockForm) !!}
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    recount stock
                </div>
                <div class="card-body">
                    {!! form($addedStockForm) !!}
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

    </script>
@endpush