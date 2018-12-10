@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            {!! Breadcrumbs::render('cart.create') !!}

            <div class="panel panel-default col-md-8 col-md-offset-1" style="border-radius: 0px; border: none; box-shadow: none;">

                <div class="panel-body">
                    {!! Form::open(['route' => 'order.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

                        <div class="row">
                            <div class="form-group {!! !$errors->has('email') ? : 'has-error'!!}">
                                {!! Form::label('email', '* '.Translator('email_label', 'text', false, 'e-mail address'), ['class'  => 'control-label col-sm-4 col-md-5']) !!}
                                <div class="col-sm-8 col-md-7">
                                    {!! Form::text('email', 'asa', ['class' => 'form-control']) !!}
                                    @include('components.error', ['field' => 'email'])
                                </div>
                            </div>


                            {{-----------------------------------------------------------------------------}}-
                            <div class="form-group {!! !$errors->has('email_confirmation') ? : 'has-error'!!}">
                                {!! Form::label('email_confirmation', '* '.Translator('repeat_email_label', 'text', false, 'repeat e-mail address'), ['class'  => 'control-label col-sm-4 col-md-5']) !!}
                                <div class="col-sm-8 col-md-7">
                                    {!! Form::text('email_confirmation', null, ['class' => 'form-control']) !!}
                                    @include('components.error', ['field' => 'email_confirmation'])
                                </div>
                            </div>
                            {{----------------------------------------------------------------------------}}


                            <div class="form-group {!! !$errors->has('full_name') ? : 'has-error'!!}">
                                {!! Form::label('full_name', '* '.Translator('name_label', 'text', false, 'name'), ['class'  => 'control-label col-sm-4 col-md-5']) !!}
                                <div class="col-sm-8 col-md-7">
                                    {!! Form::text('full_name', null, ['class' => 'form-control']) !!}
                                    @include('components.error', ['field' => 'full_name'])
                                </div>
                            </div>
                            <div class="form-group {!! !$errors->has('phone') ? : 'has-error'!!}">
                                {!! Form::label('phone', Translator('phone_label', 'text', false, 'phone'), ['class'  => 'control-label col-sm-4 col-md-5']) !!}
                                <div class="col-sm-8 col-md-7">
                                    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                                    @include('components.error', ['field' => 'phone'])
                                </div>
                            </div>
                            <div class="form-group {!! !$errors->has('postal_code') ? : 'has-error'!!}">
                                {!! Form::label('postal_code', '* '.Translator('postal_code_label', 'text', false, 'postal code'), ['class'  => 'control-label col-sm-4 col-md-5']) !!}
                                <div class="col-sm-8 col-md-7">
                                    {!! Form::text('postal_code', null, ['class' => 'form-control']) !!}
                                    @include('components.error', ['field' => 'postal_code'])
                                </div>
                            </div>
                            <div class="form-group {!! !$errors->has('house_number') ? : 'has-error'!!}">
                                {!! Form::label('house_number', '* '.Translator('house_number_label', 'text', false, 'house number'), ['class'  => 'control-label col-sm-4 col-md-5']) !!}
                                <div class="col-sm-8 col-md-7">
                                    {!! Form::text('house_number', null, ['class' => 'form-control']) !!}
                                    @include('components.error', ['field' => 'house_number'])
                                </div>
                            </div>
                            <div class="form-group {!! !$errors->has('street') ? : 'has-error'!!}">
                                {!! Form::label('street', '* '.Translator('street_label', 'text', false, 'street'), ['class'  => 'control-label col-sm-4 col-md-5']) !!}
                                <div class="col-sm-8 col-md-7">
                                    {!! Form::text('street', null, ['class' => 'form-control']) !!}
                                    @include('components.error', ['field' => 'street'])
                                </div>
                            </div>

                            <div class="form-group {!! !$errors->has('residence') ? : 'has-error'!!}">
                                {!! Form::label('residence', '* '.Translator('residence_label', 'text', false, 'residence'), ['class'  => 'control-label col-sm-4 col-md-5']) !!}
                                <div class="col-sm-8 col-md-7">
                                    {!! Form::text('residence', null, ['class' => 'form-control']) !!}
                                    @include('components.error', ['field' => 'residence'])
                                </div>
                            </div>
                            <div class="form-group {!! !$errors->has('country') ? : 'has-error'!!}">
                                {!! Form::label('country', '* '.Translator('country_label', 'text', false, 'country'), ['class'  => 'control-label col-sm-4 col-md-5']) !!}
                                <div class="col-sm-8 col-md-7">
                                    {!! Form::text('country', null, ['class' => 'form-control']) !!}
                                    @include('components.error', ['field' => 'country'])
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 col-md-5">
                                </div>
                                <div class="col-sm-8 col-md-7">
                                    <div class="checkbox {!! !$errors->has('terms_end_conditions') || !$errors->has('privacy_policy') ? : 'has-error'!!}">
                                        <label>
                                            {!! Form::checkbox('terms_end_conditions', 'value', false) !!}
                                            {!! Translator('terms-and-conditions_label', 'text', false, 'terms &  conditions') !!}
                                            @include('components.error', ['field' => 'terms_end_conditions'])
                                        </label>
                                        <br>
                                        <label>
                                            {!! Form::checkbox('privacy_policy', 'value', false) !!}
                                            {!! Translator('privacy_policy_label', 'text', false, 'privacy policy') !!}
                                            @include('components.error', ['field' => 'privacy_policy'])
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4 col-md-5">
                                </div>
                                <div class="col-sm-8 col-md-7">
                                    {!! Form::submit(Translator('cart_btn_complete_order', 'text', false, 'complete order'), ['class' => 'btn btn-default']) !!}
                                </div>
                            </div>

                        </div>

                    {!! Form::close() !!}
                </div>

            </div>

        </div>
    </div>

@endsection

@push('css')
    <style>
        .form-group{
            margin-bottom: 15px;
        }
        .form-group input,
        .form-group checkbox{
            border-radius: 0px;
        }
    </style>
@endpush

@push('js')
    <script>
//        submitForms = function(){
//            document.getElementById("form1").submit();
//            document.getElementById("form2").submit();
//        }
    </script>
@endpush