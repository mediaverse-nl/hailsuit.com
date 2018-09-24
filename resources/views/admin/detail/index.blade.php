@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.detail.index') !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-9">

            @component('components.datatable')
                @slot('head')
                    <th>id</th>
                    <th>detail</th>
                    <th class="no-sort"></th>
                @endslot

                @slot('table')
                    @foreach($details as $detail)
                        <tr>
                            <td>{{$detail->id}}</td>
                            <td>{{$detail->value}}</td>
                            <td>
                                @component('components.model', [
                                    'id' => 'detailTableBtn'.$detail->id,
                                    'title' => 'Delete',
                                    'actionRoute' => route('admin.detail.edit', $detail->id),
                                    'btnClass' => 'rounded-circle delete',
                                    'btnIcon' => 'fa fa-trash'
                                ])
                                    @slot('description')
                                        If u proceed u will delete all relations
                                    @endslot
                                @endcomponent
                                <a href="{{route('admin.detail.edit', $detail->id)}}" class="rounded-circle edit">
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
                <div class="card-body">
                    {!! form($form) !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>

</script>
@endpush

@push('css')
<style>

</style>
@endpush
