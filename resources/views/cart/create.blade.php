@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default col-md-8 col-md-offset-1" style="border-radius: 0px; border: none; box-shadow: none;">

                <div class="panel-body">
                    {!! Form::open(['route' => 'order.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('email', '* '.Translator('email_label', 'text', false, 'e-mail address'), ['class'  => 'control-label col-sm-4 col-md-5']) !!}
                                <div class="col-sm-8 col-md-7">
                                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('repeatEmail', '* '.Translator('repeat_email_label', 'text', false, 'repeat e-mail address'), ['class'  => 'control-label col-sm-4 col-md-5']) !!}
                                <div class="col-sm-8 col-md-7">
                                    {!! Form::text('repeatEmail', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('name', '* '.Translator('name_label', 'text', false, 'name'), ['class'  => 'control-label col-sm-4 col-md-5']) !!}
                                <div class="col-sm-8 col-md-7">
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('phone', Translator('phone_label', 'text', false, 'phone'), ['class'  => 'control-label col-sm-4 col-md-5']) !!}
                                <div class="col-sm-8 col-md-7">
                                    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('postalCode', '* '.Translator('postal_code_label', 'text', false, 'postal code'), ['class'  => 'control-label col-sm-4 col-md-5']) !!}
                                <div class="col-sm-8 col-md-7">
                                    {!! Form::text('postalCode', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('houseNumber', '* '.Translator('house_number_label', 'text', false, 'house number'), ['class'  => 'control-label col-sm-4 col-md-5']) !!}
                                <div class="col-sm-8 col-md-7">
                                    {!! Form::text('houseNumber', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('street', '* '.Translator('street_label', 'text', false, 'street'), ['class'  => 'control-label col-sm-4 col-md-5']) !!}
                                <div class="col-sm-8 col-md-7">
                                    {!! Form::text('street', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('residence', '* '.Translator('residence_label', 'text', false, 'residence'), ['class'  => 'control-label col-sm-4 col-md-5']) !!}
                                <div class="col-sm-8 col-md-7">
                                    {!! Form::text('residence', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('country', '* '.Translator('country_label', 'text', false, 'country'), ['class'  => 'control-label col-sm-4 col-md-5']) !!}
                                <div class="col-sm-8 col-md-7">
                                    {!! Form::text('country', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 col-md-5">
                                </div>
                                <div class="col-sm-8 col-md-7">
                                    <div class="checkbox">
                                        <label>
                                            {!! Form::checkbox('termsAndConditions', 'value', false) !!}
                                            {!! Translator('terms-and-conditions_label', 'text', false, 'terms &  conditions') !!}
                                        </label>
                                        <br>
                                        <label>
                                            {!! Form::checkbox('privacyPolicy', 'value', false) !!}
                                            {!! Translator('privacy_policy_label', 'text', false, 'privacy policy') !!}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4 col-md-5">
                                </div>
                                <div class="col-sm-8 col-md-7">
                                    {!! Form::submit(Translator('cart_btn_complete_order', 'text', false, 'complete order
'), ['class' => 'btn btn-default']) !!}
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
            margin-bottom: 25px;
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