@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.translator.edit', $text) !!}
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            editing text from <b>{!! $text->commentable_type !!}</b>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="">default translation</label>
                <input class="form-control" type="text" value="{!! $text->commentable->getTranslation()!!}" disabled>
            </div>

            <hr>
            <br>

            {!! Form::open(['route' => ['admin.translator.update', $id], 'method' => 'PATCH']) !!}
                <input type="hidden" name="type" value="{!! $text->commentable_type !!}">

                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    @foreach($languages as $language)
                        <a class="nav-item nav-link {{$loop->first ? 'active' : ''}}"
                           data-toggle="tab"
                           href="#nav-{{$language->country_code_large}}"
                           role="tab">
                            {{$language->country_code_flag}}
                        </a>
                    @endforeach
                </div>

                <div class="tab-content" id="nav-tabContent">
                    @foreach($languages as $language)
                        <div class="tab-pane {{$loop->first ? 'show active' : ''}}"
                             id="nav-{{$language->country_code_large}}"
                             role="tabpanel">

                            <br>
                            <div class="form-group">
                                {{--{!! $text->commentable->translation->where('language_id', '=', $language->id)->first()->text !!}--}}
                                <input class="form-control" name="translation[{!! $language->id !!}]" value="{!! $text->commentable->translation->where('language_id', '=', $language->id)->first()->text !!}">
                            </div>

                            {!! Form::submit('Update', ['class' => 'btn btn-sm btn-success']) !!}

                        </div>
                    @endforeach
                </div>

            {{ Form::close() }}

        </div>
    </div>

    @component('components.rich-textarea-editor')
    @endcomponent

@endsection

@push('css')

@endpush

@push('scripts')

@endpush