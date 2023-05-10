@extends('layouts.guest', ['title' => 'Confirm Password'])

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">{{ __('Confirm Password') }}</h1>
            {{ __('Please confirm your password before continuing.') }}

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>

                    <input id="password" type="password"
                           class="form-control @error('password') is-invalid @enderror" name="password"
                           required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-lg btn-primary btn-block">
                    {{ __('Confirm Password') }}
                </button>

                @if (Route::has('password.request'))
                    <div class="mt-4 text-center">
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection
