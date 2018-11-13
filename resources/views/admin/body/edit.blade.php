@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.brand.edit', $body) !!}
@endsection

@section('content')

    <div class="row">

        <div class="col">

            <div class="row">
                <div class="col-6">

                    <div class="card" style="width: 100%;">
                        <div class="card-header">
                            update body <b>{{$body->getTranslation()}}</b>
                        </div>
                        <div class="card-body">
                            {!! form($form) !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    <b>body</b> menu
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($bodies as $b)
                        <li class="list-group-item {{$body->id == $b->id ? 'active' : ''}}">
                            <a href="{{route('admin.body.edit', $b->id)}}">{{$b->getTranslation()}}</a>
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