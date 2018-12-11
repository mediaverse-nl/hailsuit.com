
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
                    <br
                    <input class="form-control" name="translation[{!! $language->id !!}]" value="{!! $texts->where('language_id', '=', $language->id)->first()->text !!}">
                @endif
            </div>

            {!! Form::submit('Update', ['class' => 'btn btn-sm btn-success']) !!}

        </div>
    @endforeach
</div>

@push('css')
    <!-- include summernote css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">

    <style>
        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
            color: #495057;
            background-color: #F5F5F5 !important;
            border-color: #dee2e6 #dee2e6 #fff;
            border-bottom: 1px solid #F5F5F5;
            border-radius: 0px;
        }
        .nav-tabs .nav-link {
            border: 1px solid transparent;
            border-top-left-radius:0px;
            border-top-right-radius:0px;
        }
        .note-editor.note-frame {
            border: 1px  solid #dee2e6 !important;
            border-top: none !important;
        }
    </style>
@endpush

@push('scripts')
    <!-- include summernote js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
    <script>
        $(document).ready(function(){
            // Define function to open filemanager window
            var lfm = function(options, cb) {
                var route_prefix = (options && options.prefix) ? options.prefix : '/admin/laravel-filemanager';
                window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
                window.SetUrl = cb;
            }
            //
            // Define LFM summernote button
            var LFMButton = function(context) {
                var ui = $.summernote.ui;
                var button = ui.button({
                    contents: '<i class="note-icon-picture"></i> ',
                    tooltip: 'Insert image with filemanager',
                    click: function() {

                        lfm({type: 'file', prefix: '/admin/laravel-filemanager'}, function(lfmItems, path) {
                            lfmItems.forEach(function (lfmItem) {
                                context.invoke('insertImage', lfmItem.url);
                            });
                        });

                    }
                });
                return button.render();
            }

            $('.summernote').summernote({
                placeholder: "Type anything here...",
                tabsize: 2,
                height: 350,
                buttons: {
                    lfm: LFMButton
                },
                toolbar: [
                    ['style', ['style']],
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ["popovers", ["lfm"]]
                ]
            });

            $('.dropdown-toggle').dropdown()
        });
    </script>
@endpush