@extends('layouts.guest', ['title' => 'Masuk'])

@section('content')
    <div class="row flex-column justify-content-center align-items-center mb-4">
        <img src="{{ asset('storage/' . $WEBSITE_LOGO) }}" alt="Web Logo" class="img-fluid" style="width: 120px">
        <h3 class="mt-2 font-weight-bold">{{ $WEBSITE_TITLE }}</h3>
    </div>
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Masuk</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email"
                           class="form-control @error('email') is-invalid @enderror" name="email"
                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>

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
                            <label class="form-check-label" for="remember">Ingat Saya</label>
                        </div>
                    </div>
                    @if (Route::has('password.request'))
                        <div class="col-sm-6">
                            <a class="float-sm-right"
                               href="{{ route('password.request') }}">
                                Lupa kata sandi?
                            </a>
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-lg btn-primary btn-block">Masuk</button>
                @if(Route::has('register'))
                    <div class="mt-4 text-center">
                        Tidak punya akun? <a href="{{ route('register') }}">Buat sekarang</a>
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection
