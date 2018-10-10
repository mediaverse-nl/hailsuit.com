@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.faq.edit', $faq) !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    edit frequently asked questions (FAQ) item
                </div>
                <div class="card-body">
                    {!! form($form) !!}
                </div>
            </div>
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