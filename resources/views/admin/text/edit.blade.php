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
                                @if($text->commentable->text_type == 'richtext')
                                    <textarea class="summernote" name="translation[{!! $language->id !!}]">{!! $texts->where('language_id', '=', $language->id)->first()->text !!}</textarea>
                                @elseif($text->commentable->text_type == 'textarea')
                                    <textarea class="form-control" name="translation[{!! $language->id !!}]">{!! $texts->where('language_id', '=', $language->id)->first()->text !!}</textarea>
                                @elseif($text->commentable->text_type == 'text')
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

@endsection

@push('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">

    <style>
        textarea{
            /*margin-top: 5px;*/
        }
    </style>
@endpush

@push('scripts')
    <!-- include summernote css/js -->
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>

    <script>
        // Define function to open filemanager window
        var lfm = function(options, cb) {
            var route_prefix = (options && options.prefix) ? options.prefix : '/admin/laravel-filemanager';
            window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
            window.SetUrl = cb;
        };

        // Define LFM summernote button
        var LFMButton = function(context) {
            var ui = $.summernote.ui;
            var button = ui.button({
                contents: '<i class="note-icon-picture"></i> ',
                tooltip: 'Insert image with filemanager',
                click: function() {

                    lfm({type: 'image', prefix: '/admin/laravel-filemanager'}, function(lfmItems, path) {
                        lfmItems.forEach(function (lfmItem) {
                            context.invoke('insertImage', lfmItem.url);
                        });
                    });

                }
            });
            return button.render();
        };

        $('.summernote').summernote({
            placeholder: "Type anything here...",
            tabsize: 2,
            height: 350,
            toolbar: [
                    ['popovers', ['lfm']
                ],
            ],
            buttons: {
                lfm: LFMButton
            }
        });
//        $('.dropdown-toggle').dropdown()

    </script>
@endpush