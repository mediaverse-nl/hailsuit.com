@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.brand.edit', $brand) !!}
@endsection

@section('content')

    <div class="row">

        <div class="col">

            <h2>{{$brand->name}}</h2>

            <hr>

            <div class="row row-eq-height">
                @if($brand->types->count() !== 0)
                    @foreach($brand->types->sortBy('model_year')->sortBy('value') as $type)
                        <div class="col-3">
                            <div class="card" style="width: 100%;">
                                <div class="card-body">
                                    <h5 class="card-title text-truncate">
                                        {{$type->value}} <br>
                                        {{$type->model_year}} <br>
                                        @foreach($type->bodyType as $body)
                                            <h6 class="badge badge-secondary">{{$body->body->getTranslation()}}</h6>
                                        @endforeach
                                    </h5>
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
        .badge{
            margin-bottom: 0px;
        }
        .list-group-item.active a{
            color: #ffffff !important;
        }
        .row-eq-height {
            display: -webkit-box !important;
            display: -webkit-flex !important;
            display: -ms-flexbox !important;
            display:         flex !important;
        }
        [class*="col-"] {
            padding-top: 0px;
            padding-bottom: 0px;
            /*background-color: #eee;*/
            /*background-color: rgba(86,61,124,.15);*/
            /*border: 1px solid #ddd;*/
            /*border: 1px solid rgba(86,61,124,.2);*/
        }
    </style>
@endpush

@push('js')
    <script>

    </script>
@endpush