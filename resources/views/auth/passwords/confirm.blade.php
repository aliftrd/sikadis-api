@extends('layouts.guest', ['title' => 'Konfirmasi Password'])

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Konfirmasi Password</h1>
            Harap konfirmasikan kata sandi Anda sebelum melanjutkan.

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="form-group">
                    <label for="password">Password</label>

                    <input id="password" type="password"
                           class="form-control @error('password') is-invalid @enderror" name="password"
                           required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-lg btn-primary btn-block">
                    Konfirmasi Password
                </button>

                @if (Route::has('password.request'))
                    <div class="mt-4 text-center">
                        <a href="{{ route('password.request') }}">
                            Lupa kata sandi?
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection
