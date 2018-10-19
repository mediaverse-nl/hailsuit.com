@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.brand.index') !!}
@endsection

@section('content')

    <!-- DataTables Example -->

    <div class="row">
        <div class="col-9">
            @component('components.datatable')
                @slot('head')
                    <th>id</th>
                    <th>detail</th>
                    <th class="no-sort"></th>
                @endslot

                @slot('table')
                    @foreach($brands as $brand)
                        <tr>
                            <td>{{$brand->id}}</td>
                            <td>{{$brand->name}}</td>
                            <td>
                                @component('components.model', [
                                    'id' => 'brandTableBtn'.$brand->id,
                                    'title' => 'Delete',
                                    'actionRoute' => route('admin.brand.edit', $brand->id),
                                    'btnClass' => 'rounded-circle delete',
                                    'btnIcon' => 'fa fa-trash'
                                ])
                                    @slot('description')
                                        If u proceed u will delete all relations
                                    @endslot
                                @endcomponent
                                <a href="{{route('admin.brand.edit', $brand->id)}}" class="rounded-circle edit">
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
                    add new <b>brand</b>
                </div>

                <div class="card-body">
                    {!! form($form) !!}
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