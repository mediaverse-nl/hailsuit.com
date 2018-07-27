@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Login</div>
            <div class="card-body">

                <form class="form-horizontal" method="POST" action="{{ route('login', app()->getLocale()) }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="form-label-group">
                            <input id="inputEmail" type="email" class="form-control" placeholder="Email address" name="email" value="{{ old('email') }}" required autofocus>
                            <label for="inputEmail">Email address</label>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="form-label-group">
                            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
                            <label for="inputPassword">Password</label>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                Remember Password
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Login
                    </button>
                </form>
                <div class="text-center">
                    <a class="btn btn-link" href="{{ route('password.request', app()->getLocale()) }}">Forgot Password?</a>
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