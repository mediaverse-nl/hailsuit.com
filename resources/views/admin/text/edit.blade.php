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
                        <div class="tab-pane fade {{$loop->first ? 'show active' : ''}}"
                             id="nav-{{$language->country_code_large}}"
                             role="tabpanel">
                            <div class="form-group">
                                <br>
                                <textarea class="summernote" name="translation[{!! $language->id !!}]">{!! $texts->where('language_id', '=', $language->id)->first()->text !!}</textarea>
                                {!! Form::submit('Update', ['class' => 'btn btn-sm btn-success']) !!}
                            </div>
                        </div>
                    @endforeach
                </div>

            {{ Form::close() }}

            <hr>

        </div>
    </div>

@endsection

@push('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">

    <style>
        textarea{
            /*margin-top: 5px;*/
        }
    </style>
@endpush

@push('scripts')
    <!-- include summernote css/js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>

    <script>
        $('.summernote').summernote({
            placeholder: "Type anything here...",
            tabsize: 2,
            height: 350
        });
        $('.dropdown-toggle').dropdown()

    </script>
@endpush