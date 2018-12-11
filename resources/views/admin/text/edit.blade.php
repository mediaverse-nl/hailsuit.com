@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.text.edit', $text) !!}
@endsection

@section('content')

    {{--{!! dd($text) !!}--}}

    <div class="card">
        <div class="card-header">
            editing text <b>{!! $text->commentable->key_name !!}</b>
        </div>
        <div class="card-body">
            {!! Form::open(['route' => ['admin.text-editor.update', $text->commentable->key_name], 'method' => 'PATCH']) !!}

                @component('components.rich-textarea-editor', ['languages' => $languages, 'text' => $text, 'texts' => $texts])

                @endcomponent

            {{ Form::close() }}

            <hr>

        </div>
    </div>


@endsection

@push('css')

@endpush

@push('scripts')

@endpush