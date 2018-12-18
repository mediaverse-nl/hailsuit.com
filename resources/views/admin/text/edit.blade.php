@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.text.edit', $text) !!}
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            editing text <b>{!! $text->commentable->key_name !!}</b>
        </div>
        <div class="card-body">
            {!! Form::open(['route' => ['admin.text-editor.update', $text->commentable->key_name], 'method' => 'PATCH']) !!}

            @if(json_decode($text->commentable->option, true)['mentions'] !== null)
                <label for="">Use "@" to use these tags in the text. <br><small>Example; Dear @name, do u like chips.</small></label>
                <br>
                @foreach(json_decode($text->commentable->option, true)['mentions'] as $key => $v)
                    <small class="badge badge-warning"><b>{!! '@'.$key !!}</b></small>
                @endforeach
                <br>
                <br>
            @endif

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

                            <div class="form-group">
                                @if($text->commentable->text_type == 'richtext')
                                    <textarea class="summernote" name="translation[{!! $language->id !!}]">{!! $texts->where('language_id', '=', $language->id)->first()->text !!}</textarea>
                                @elseif($text->commentable->text_type == 'textarea')
                                    <textarea class="form-control" name="translation[{!! $language->id !!}]">{!! $texts->where('language_id', '=', $language->id)->first()->text !!}</textarea>
                                @elseif($text->commentable->text_type == 'text')
                                    <br>
                                    <input class="form-control" name="translation[{!! $language->id !!}]" value="{!! $texts->where('language_id', '=', $language->id)->first()->text !!}">
                                @endif
                            </div>

                            {!! Form::submit('Update', ['class' => 'btn btn-sm btn-success']) !!}

                        </div>
                    @endforeach
                </div>

            {{ Form::close() }}

            <hr>

        </div>
    </div>

{{--{!! $text->commentable->text_type !!}--}}
    @if($text->commentable->text_type == 'richtext')
{{--        {!! dd($text->commentable->options()) !!}--}}
        @component('components.rich-textarea-editor', ['option' => $text->commentable->options()])
        @endcomponent
    @endif

@endsection

@push('css')

@endpush

@push('scripts')

@endpush