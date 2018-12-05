@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8  col-md-offset-2">
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>

                <div class="panel" style="background-color: #FAFAFA;">
                    <div class="panel-body">

{{--                        {!! dd($payment) !!}--}}

                        @if($payment->status == 'paid')
                            {!! Translator('order_status_success_message', 'richtext', false, 'Bedankt voor uw bestelling!<br><br>

                            U heeft ervoor gekozen om de betaling te voldoen met iDeal, u wordt automatisch doorgestuurd naar de betaalomgeving van uw bank. Klik hier om direct verder te gaan.
                            <br>
                            <br>
                            Hailsuit zet zich in om uw bestelling zo spoedig mogelijk zorgvuldig af te handelen, mocht u vragen hebben kunt u natuurlijk altijd contact opnemen met een van onze vriendelijke medewerkers. Onze contactgegevens raadplegen.
                            <br>
                            <br>
                            Voor veelgestelde vragen over uw bestelling kunt u ook onze klantenservice raadplegen.<br>') !!}
                        @else
                            {!! Translator('order_status_error_message', 'richtext', false, 'Bedankt voor uw bestelling!<br><br>

                            U heeft ervoor gekozen om de betaling te voldoen met iDeal, u wordt automatisch doorgestuurd naar de betaalomgeving van uw bank. Klik hier om direct verder te gaan.
                            <br>
                            <br>
                            Hailsuit zet zich in om uw bestelling zo spoedig mogelijk zorgvuldig af te handelen, mocht u vragen hebben kunt u natuurlijk altijd contact opnemen met een van onze vriendelijke medewerkers. Onze contactgegevens raadplegen.
                            <br>
                            <br>
                            Voor veelgestelde vragen over uw bestelling kunt u ook onze klantenservice raadplegen.<br>') !!}
                        @endif

                    </div>
                </div>

                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
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