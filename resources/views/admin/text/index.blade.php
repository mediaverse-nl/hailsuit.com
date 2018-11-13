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
                    <th>translation</th>
                    {{--<th>language</th>--}}
                    <th class="no-sort"></th>
                @endslot

                @slot('table')
                    @foreach($texts as $text)
                        <tr>
                            <td>{{$text->commentable->key_name}}</td>
                            <td>{{$text->commentable->getTranslation()}}</td>
                            {{--<td>{{$text->commentable_type}}</td>--}}
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