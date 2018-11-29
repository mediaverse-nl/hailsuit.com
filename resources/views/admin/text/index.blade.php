@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.text.index') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-9">
            @component('components.datatable')
                @slot('head')
                    <th>key name</th>
                    <th>text field type</th>
                    <th>text</th>
                    <th class="no-sort"></th>
                @endslot

                @slot('table')
                    @foreach($texts as $text)
                        <tr>
                            <td>{{$text->commentable->key_name}}</td>
                            <td>{{$text->commentable->text_type}}</td>
                            <td>{!! $text->commentable->getTranslation(true) == ' '
                                    || $text->commentable->getTranslation(true) == ''
                                    ? "--- EMPTY ---" : $text->commentable->getTranslation(true) !!}</td>
                            <td>
                                <a href="{{route('admin.text-editor.edit', $text->id)}}" class="rounded-circle edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endslot

            @endcomponent

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