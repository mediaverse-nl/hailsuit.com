@extends('layouts.app')

@section('content')

    {!! $order !!}
    <br>
    {{--{!! dd($payment) !!}--}}


    <div class="container">
        <div class="row">
            <div class="panel">
                <div class="panel-body">
                    Bedankt voor uw aankoop!<br>
                    U heeft ervoor gekozen om de betaling te voldoen met iDeal, u wordt automatisch doorgestuurd naar de betaalomgeving van uw bank. Klik hier om direct verder te gaan.
                    <br>
                    <br>
                    Hailsuit zet zich in om uw bestelling zo spoedig mogelijk zorgvuldig af te handelen, mocht u vragen hebben kunt u natuurlijk altijd contact opnemen met een van onze vriendelijke medewerkers. Onze contactgegevens raadplegen.
                    <br>
                    <br>
                    Voor veelgestelde vragen over uw bestelling kunt u ook onze klantenservice raadplegen.<br>

                </div>
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