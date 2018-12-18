@extends('layouts.app')

@section('content')
<html>
    <body>

        {{--<div class="" style="background-color: #F4F4F4;">--}}

            {{--<div class="container" >--}}

                {{--<div class="row">--}}

                    {{--<div class="col-md-12">--}}
                        {{--<br>--}}
                        {{--<br>--}}
                        {{--<br>--}}

                        {{--<div class="panel panel-default" style="border: none;  border-radius: 0px;">--}}

                            {{--<div class="panel-body">--}}

                                {{--<h1 class="text-center"><b>frequently asked questions (FAQ)</b></h1>--}}
                                {{--<br>--}}
                                {{--<br>--}}
                                {{--<br>--}}

                                {{--<div class="row">--}}
                                    {{--@foreach($faqs as $faq)--}}
                                        {{--<div class="faq-panel col-md-12 col-sm-8" style="margin-bottom: 20px;">--}}
                                            {{--<h2 type="button" data-toggle="collapse" data-target="#faq{!! $faq->id !!}" class="collapsed accordion-toggle title-faq">--}}
                                                {{--<b>{!! $faq->titleTranslated() !!}</b>--}}
                                            {{--</h2>--}}
                                            {{--<hr>--}}
                                            {{--<div id="faq{!! $faq->id !!}" class="collapse">--}}
                                                {{--{!! $faq->descriptionTranslated() !!}--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--@endforeach--}}
                                {{--</div>--}}

                            {{--</div>--}}

                        {{--</div>--}}

                    {{--</div>--}}

                {{--</div>--}}

            {{--</div>--}}

        {{--</div>--}}

        <div class="container ">
            <br><br><br>
            <div class="panel-group" id="faqAccordion">

                <div class="panel panel-default ">

                    @foreach($faqs as $faq)

                    <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question0">
                        <h4 class="panel-title">
                            <b>{!! $faq->titleTranslated() !!}</b>
                        </h4>
                    </div>

                    <div id="question0" class="panel-collapse collapse" style="height: 0px;">
                        <div class="panel-body">
                            <h5><span class="label label-primary">Answer</span></h5>
                            <p>{!! $faq->descriptionTranslated() !!}</p>
                        </div>
                    </div>

                    @endforeach
                </div>

            </div>
            <!--/panel-group-->
        </div>


    </body>

</html>


@endsection

@push('css')
    <style>
        .accordion-toggle:after {
            content: '\f106';
            font-family: 'Font Awesome\ 5 Free';
            font-style: normal;
            font-weight: 600; /* Fix version 5.0.9 */
            text-decoration: inherit;
            position: absolute;
            right: 165px;
        }
        .accordion-toggle.collapsed:after {
            content: "\f107";
        }
        .title-faq{
            margin-top: 10px;
            margin-bottom: 0px;
        }
        .panel-heading{
            padding-top: 10px;
        }
        .panel-body{
            padding-top: 0px;

        }
        .faq-panel{
            padding: 0px 120px;
        }
        .faq-panel h2{
            font-size: 24px;
            color: #3587BC;
        }
        .faq-panel .collapsed{
            /*background-color: #1C9CEA !important;*/

        }

    </style>
@endpush

@push('js')
    <script>

        $( document ).ready(function() {
            console.log( "document loaded" );
        });

        $( window ).on( "load", function() {
            console.log( "window loaded" );
        });

        $('.faq-panel.collapsed').on('.collapse', function () {
            console.log("Opened")
        });

    </script>
@endpush