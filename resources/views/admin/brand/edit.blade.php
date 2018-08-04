@extends('layouts.admin')

@section('content')

    <div class="row">

        <div class="col">

            <h2>{{$brand->name}}</h2>

            <hr>

            <div class="row">
                @foreach($brand->types->sortBy('value') as $type)
                    <div class="col-md ">
                        <div class="card" style="width: 100%;">
                            <div class="card-body">
                                <h5 class="card-title">{{$type->value}} - {{$type->model_year}}</h5>
                                <a href="#" class="card-link">delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-3">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    {!! form($form) !!}
                </div>
            </div>
            <hr>
            <ul class="list-group list-group-flush">
               @foreach($brands as $b)
                    <li class="list-group-item {{$brand->id == $b->id ? 'active' : ''}}">
                        <a href="{{route('admin.brand.edit', $b->id)}}">{{$b->name}}</a>
                    </li>
               @endforeach
            </ul>
        </div>

    </div>



@endsection

@push('css')
    <style>
        .list-group-item .active{
            color: #ffffff !important;
        }
    </style>
@endpush

@push('js')
    <script>

    </script>
@endpush