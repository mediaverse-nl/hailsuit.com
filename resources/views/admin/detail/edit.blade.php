@extends('layouts.admin')

@section('content')

    <div class="row">

        <div class="col">

            <h2>{{$detail->value}}</h2>

            <hr>

            <div class="row">
                @foreach($detail->properties as $property)
                    <div class="col-md ">
                        <div class="card" style="width: 100%;">
                            <div class="card-body">
                                <h5 class="card-title">{{$property->value}}</h5>
                                {{--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
                                {{--<a href="#" class="card-link">add</a>--}}
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
               @foreach($details as $d)
                    <li class="list-group-item {{$detail->id == $d->id ? 'active' : ''}}">
                        <a href="{{route('admin.detail.edit', $d->id)}}">{{$d->value}}</a>
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