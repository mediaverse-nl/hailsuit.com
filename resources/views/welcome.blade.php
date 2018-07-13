@extends('layouts.app')

@section('content')

    <div class="title m-b-md">

        {{--@include('vendor.language.flags')--}}


        {{--<ul class="{{ config('language.flags.ul_class') }}">--}}
        {{--@foreach (language()->allowed() as $code => $name)--}}
        {{--<li class="{{ config('language.flags.li_class') }}">--}}
        {{--<a href="{{ language()->back($code) }}">--}}
        {{--<img src="{{ asset('/img/flags/'.$code.'.png') }}" alt="{{ $code }}" width="{{ config('language.flags.width') }}" /> &nbsp; {{ $name }}--}}
        {{--</a>--}}
        {{--</li>--}}
        {{--@endforeach--}}
        {{--</ul>--}}

        Laravel
    </div>

@endsection