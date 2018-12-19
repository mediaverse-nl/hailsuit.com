@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <br>
                <br>
                <br>
                <h1 class="text-center"><b>Frequently asked questions ( FAQs )</b></h1>

                <br>
                @foreach($faqs as $faq)

                    <div class="panel-group" id="faqAccordion">

                        <div class="panel panel-default " style="border: none">

                            <div class="accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion{!! $faq->id !!}" data-target="#question{!! $faq->id !!}">
                                <h4 class="panel-title">
                                    <a href="#" class="ing"> {!! $faq->titleTranslated() !!} </a>
                                </h4>
                            </div>

                            <div id="question{!! $faq->id !!}" class="panel-collapse collapse" style="height: 0px;">
                                <div class="panel-body">
                                    <p>{!! $faq->descriptionTranslated() !!}</p>
                                    <hr>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--/panel-group-->
                @endforeach

            </div>

        </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

@endsection

@push('css')
    <style>
        .panel-group a,
        .panel-group p{
            color: #292C2F !important;
        }

        .question-toggle{
            padding: 20px;
            border: none !important;
        }
        .panel-group{
            background: transparent !important;
            border: none !important;
        }
        .panel{
            -webkit-box-shadow: none;
            box-shadow: none;
        }
        .panel > .question-toggle{
            background: #FAFAFA;
        }
        /*.accordion-toggle:after {*/
            /*content: '\f106';*/
            /*font-family: 'Font Awesome\ 5 Free';*/
            /*font-style: normal;*/
            /*font-weight: 600; !* Fix version 5.0.9 *!*/
            /*text-decoration: inherit;*/
            /*position: absolute;*/
            /*right: 165px;*/
        /*}*/
        /*.accordion-toggle.collapsed:after {*/
            /*content: "\f107";*/
        /*}*/
        /*.title-faq{*/
            /*margin-top: 10px;*/
            /*margin-bottom: 0px;*/
        /*}*/
        /*.panel-heading{*/
            /*padding-top: 10px;*/
        /*}*/
        /*.panel-body{*/
            /*padding-top: 0px;*/

        /*}*/
        /*.faq-panel{*/
            /*padding: 0px 120px;*/
        /*}*/
        /*.faq-panel h2{*/
            /*font-size: 24px;*/
            /*color: #3587BC;*/
        /*}*/
        /*.faq-panel .collapsed{*/
            /*!*background-color: #1C9CEA !important;*!*/

        /*}*/

    </style>
@endpush

@push('js')
    <script>

        // $( document ).ready(function() {
        //     console.log( "document loaded" );
        // });
        //
        // $( window ).on( "load", function() {
        //     console.log( "window loaded" );
        // });
        //
        // $('.faq-panel.collapsed').on('.collapse', function () {
        //     console.log("Opened")
        // });

    </script>
@endpush