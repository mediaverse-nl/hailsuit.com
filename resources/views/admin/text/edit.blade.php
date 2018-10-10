@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.text.edit', $text) !!}
@endsection

@section('content')

    <div class="card">
        <div class="card-body">

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
                            <label for="">Name</label>
                            <input type="text"
                                   class="form-control"
                                   name="translation[][name]"
                                   value=""
                                   placeholder="name">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea class="form-control" name="translation[][description]" rows="3"></textarea>
                        </div>
                    </div>
                @endforeach
            </div>

            <hr>

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
                            <label for="">Name</label>
                            <input type="text"
                                   class="form-control"
                                   name="translation[][name]"
                                   value=""
                                   placeholder="name">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea class="form-control" name="translation[][description]" rows="3"></textarea>
                        </div>
                    </div>
                @endforeach
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