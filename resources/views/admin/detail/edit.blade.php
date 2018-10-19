@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.detail.edit', $detail) !!}
@endsection

@section('content')

    <div class="row">

        <div class="col">

            <h2>{{$detail->value}}</h2>

            <hr>

            <div class="row">

                @if($detail->properties->count() !== 0)
                    @foreach($detail->properties as $property)
                        <div class="col-3">
                            <div class="card" style="width: 100%; margin-bottom: 20px;">
                                <div class="card-body">
                                    <h5 class="card-title text-truncate">{{$property->value}}</h5>

                                    @component('components.model', [
                                        'id' => 'propertyTableBtn'.$property->id,
                                        'title' => 'Delete',
                                        'actionRoute' => route('admin.property.destroy', $property->id),
                                        'btnClass' => 'btn btn-sm btn-danger pull-right',
                                        'btnIcon' => 'fa fa-trash'
                                    ])
                                        @slot('description')
                                            If u proceed u will delete all relations
                                        @endslot
                                    @endcomponent
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-3">
                        there are 0 entries found
                    </div>
                @endif
            </div>
        </div>

        <div class="col-3">
            <div class="card" style="width: 100%;">
                <div class="card-header">
                    add nieuw <b>{{$detail->value}}</b>
                </div>
                <div class="card-body">
                    {!! form($form) !!}
                </div>
            </div>
            <hr>

            <div class="card">
                <div class="card-header">
                    detail menu
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($details as $d)
                        <li class="list-group-item {{$detail->id == $d->id ? 'active' : ''}}">
                            <a href="{{route('admin.detail.edit', $d->id)}}">{{$d->value}}</a>
                        </li>
                    @endforeach
                </ul>
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