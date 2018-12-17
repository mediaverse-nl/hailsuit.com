@component('mail::message')
{{--title logo hail suits--}}

@php

    $array = [
        'email' => $request->email,
    ];

    $translation = Translator('mail_confirmation', 'text', false, 'Dear' );

    foreach ($array as $key => $i){
        $translation = str_replace('@'.$key, $i, $translation);
    }

@endphp

{!! $translation !!}

Hail suits


@endcomponent
