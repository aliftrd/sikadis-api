@extends('layouts.guest', ['title' => 'Reset Password'])

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">{{ __('Reset Password') }}</h1>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">
                    <label for="email">{{ __('Email Address') }}</label>
                    <input id="email" type="email"
                           class="form-control @error('email') is-invalid @enderror" name="email"
                           value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <button type="submit"
                        class="btn btn-lg btn-primary btn-block">{{ __('Send Password Reset Link') }}</button>
            </form>
        </div>
    </div>
@endsection
