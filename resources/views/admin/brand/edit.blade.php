@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.brand.edit', $brand) !!}
@endsection

@section('content')

    <div class="row">

        <div class="col">

            <h2>{{$brand->name}}</h2>

            <hr>

            <div class="row">
                @if($brand->types->count() !== 0)
                    @foreach($brand->types->sortBy('value') as $type)
                        <div class="col-3">
                            <div class="card" style="width: 100%;">
                                <div class="card-body">
                                    <h5 class="card-title text-truncate">{{$type->value}} <br> {{$type->model_year}}</h5>
                                    @component('components.model', [
                                        'id' => 'typeTableBtn'.$type->id,
                                        'title' => 'Delete',
                                        'actionRoute' => route('admin.type.destroy', $type->id),
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
                    add new <b>{{$brand->name}}</b> model
                </div>
                <div class="card-body">
                    {!! form($form) !!}
                </div>
            </div>
            <hr>

            <div class="card">
                <div class="card-header">
                    brands menu
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($brands as $b)
                        <li class="list-group-item {{$brand->id == $b->id ? 'active' : ''}}">
                            <a href="{{route('admin.brand.edit', $b->id)}}">{{$b->name}}</a>
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