{{--@extends('layouts.app')--}}

{{--@section('content')--}}

    <div class="container">
        <div class="row" style="padding: 20px;">
            <h1 class="text-center">404 page not found</h1>
            <p class="text-center">Help elkaar met het beschermen van uw auto en meld uw weers verwachtingen</p>

            @if(!empty($exception))
                {!! $exception->getMessage() !!}
            @endif
        </div>
    </div>

{{--@endsection--}}

@push('css')
    <style>

    </style>
@endpush

@push('js')
    <script>

    </script>
@endpush