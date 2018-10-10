@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.text.index') !!}
@endsection

@section('content')

    @component('components.datatable')
        @slot('head')
            <th>key_name</th>
            <th>language</th>
            <th>text</th>
            <th class="no-sort"></th>
        @endslot

        @slot('table')
            @foreach($texts as $text)
                <tr>
                    <td>{{$text->key_name}}</td>
                    <td>{{$text->appLanguage->country}}</td>
                    <td>{{$text->text}}</td>
                    <td>
                        @component('components.model', [
                            'id' => 'detailTableBtn'.$text->id,
                            'title' => 'Delete',
                            'actionRoute' => route('admin.detail.destroy', $text->id),
                            'btnClass' => 'rounded-circle delete',
                            'btnIcon' => 'fa fa-trash'
                        ])
                            @slot('description')
                                If u proceed u will delete all relations
                            @endslot
                        @endcomponent
                        <a href="{{route('admin.text-editor.edit', $text->id)}}" class="rounded-circle edit">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        @endslot

    @endcomponent


    {{--<!-- DataTables Example -->--}}
    {{--<div class="card mb-3">--}}
        {{--<div class="card-header">--}}
            {{--<i class="fas fa-table"></i>--}}
            {{--Text Table--}}
        {{--</div>--}}
        {{--<div class="card-body">--}}
            {{--<div class="table-responsive">--}}
                {{--<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">--}}
                    {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th>Name</th>--}}
                            {{--<th>Position</th>--}}
                            {{--<th>Office</th>--}}
                            {{--<th>Age</th>--}}
                            {{--<th>Start date</th>--}}
                            {{--<th>Opties</th>--}}
                        {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tfoot>--}}
                        {{--<tr>--}}
                            {{--<th>Name</th>--}}
                            {{--<th>Position</th>--}}
                            {{--<th>Office</th>--}}
                            {{--<th>Age</th>--}}
                            {{--<th>Start date</th>--}}
                            {{--<th>Opties</th>--}}
                        {{--</tr>--}}
                    {{--</tfoot>--}}
                    {{--<tbody>--}}
                    {{--@foreach($products as $product)--}}
                        {{--<tr>--}}
                            {{--<td>Tiger Nixon</td>--}}
                            {{--<td>System Architect</td>--}}
                            {{--<td>Edinburgh</td>--}}
                            {{--<td>61</td>--}}
                            {{--<td>2011/04/25</td>--}}
                            {{--<td>--}}
                                {{--<a href="{{route('admin.product.edit', $product->id)}}">--}}
                                    {{--<i class="fas fa-edit"></i>--}}
                                {{--</a>--}}
                                {{--<a href="{{route('admin.product.edit', $product->id)}}">--}}
                                    {{--<i class="fas fa-trash"></i>--}}
                                {{--</a>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                    {{--@endforeach--}}
                    {{--</tbody>--}}
                {{--</table>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

@endsection

@push('css')
    <style>

    </style>
@endpush

@push('js')
    <script>

    </script>
@endpush