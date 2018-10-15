@extends('layouts.app')

@section('content')

    {!! $order !!}
    <br>
    {!! dd($payment) !!}

@endsection

@push('css')
    <style>

    </style>
@endpush

@push('js')
    <script>

    </script>
@endpush