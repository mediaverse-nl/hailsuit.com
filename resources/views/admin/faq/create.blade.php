@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.faq.create') !!}
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            {!! form($form) !!}
        </div>
    </div>

@endsection

@push('css')
    <style>

    </style>
@endpush

@push('js')
    <script>

    </script>
@endpush