@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row" style="">
            <h1 class="text-center"><b>frequently asked questions (FAQ)</b></h1>
            {{--<p class="text-center">Komt u</p>--}}
            <br>

            <div class="col-md-12">

                @foreach($faqs as $faq)
                    <div class="panel">
                        <div class="panel-heading">
                            <h2 type="button" data-toggle="collapse" data-target="#faq{!! $faq->id !!}" class="title-faq">
                                <b>{!! $faq->title !!}</b>
                            </h2>
                        </div>
                        <div class="panel-body">
                            <div id="faq{!! $faq->id !!}" class="collapse">
                                {!! $faq->description !!}
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="panel">
                    <div class="panel-heading">
                        <h2 type="button" data-toggle="collapse" data-target="#faq1" class="title-faq">
                            <b>Simple collapsible</b>
                        </h2>
                    </div>
                    <div class="panel-body">
                        <div id="faq1" class="collapse">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection

@push('css')
    <style>
        .title-faq{
            margin-bottom: 0px;
        }
        .panel-heading{
            padding-top: 10px;
        }
        .panel-body{
            padding-top: 0px;
        }
    </style>
@endpush

@push('js')
    <script>

    </script>
@endpush