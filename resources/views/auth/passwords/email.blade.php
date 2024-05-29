<!-- File: resources/views/auth/passwords/email.blade.php -->
@extends('layouts.app')

@section('content')
<div class="auth-container">
    <h1>{{ __('Reset Password') }}</h1>
    <form method="POST" action="{{ route('password.email') }}" class="reset-password-form">
        @csrf
        <div class="form-group">
            <label for="email">{{ __('Email Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">
            {{ __('Send Password Reset Link') }}
        </button>
    </form>
</div>
@endsection
