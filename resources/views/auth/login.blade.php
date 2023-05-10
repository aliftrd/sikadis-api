@extends('layouts.guest', ['title' => 'Login'])

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">{{ __('Login') }}</h1>
            <form method="POST" action="{{ route('login') }}">
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

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>

                    <input id="password" type="password"
                           class="form-control @error('password') is-invalid @enderror" name="password"
                           required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="row align-content-center justify-content-between mb-2">
                    <div class="col-sm-6">
                        <div class="form-group ml-4">
                            <input class="form-check-input" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                        </div>
                    </div>
                    @if (Route::has('password.request'))
                        <div class="col-sm-6">
                            <a class="float-sm-right"
                               href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-lg btn-primary btn-block">{{ __('Login') }}</button>
                @if(Route::has('register'))
                    <div class="mt-4 text-center">
                        Don't have an account? <a href="{{ route('register') }}">Create Now</a>
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection
