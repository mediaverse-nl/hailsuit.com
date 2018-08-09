@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                test
            </div>
            <div class="col-md-6">
                {!! form($form) !!}
            </div>
        </div>
    </div>

@endsection

@push('css')
    <style>

    </style>
@endpush