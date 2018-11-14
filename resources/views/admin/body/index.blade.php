@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.body.index') !!}
@endsection

@section('content')

    <!-- DataTables Example -->

    <div class="row">
        <div class="col-9">
            @component('components.datatable')
                @slot('head')
                    <th>id</th>
                    <th>body type</th>
                    <th class="no-sort"></th>
                @endslot

                @slot('table')
                    @foreach($bodies as $body)
                        <tr>
                            <td>{{$body->id}}</td>
                            <td>{{$body->getTranslation()}}</td>
                            <td>
                                @if($body->bodyTypes->count() == 0)
                                    @component('components.model', [
                                        'id' => 'bodyTableBtn'.$body->id,
                                        'title' => 'Delete',
                                        'actionRoute' => route('admin.brand.edit', $body->id),
                                        'btnClass' => 'rounded-circle delete',
                                        'btnIcon' => 'fa fa-trash'
                                    ])
                                        @slot('description')
                                            If u proceed u will delete all relations
                                        @endslot
                                    @endcomponent
                                @else
                                    <a class="rounded-circle delete disabled" style="background: #9b374b; ">
                                        <i class="fa fa-times-circle" style="color: #FFFFFF !important;"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endslot

            @endcomponent

        </div>

        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    add new <b>body type</b>
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